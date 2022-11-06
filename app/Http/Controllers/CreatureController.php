<?php

namespace App\Http\Controllers;

use App\Models\BreedTicket;
use App\Models\Creature;
use App\Models\Food;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreatureController extends Controller
{

    public function getAdoptable()
    {
        $creatures = Creature::where('for_sale', true)->where('dev_stage', '!=', 'egg')->orderBy('updated_at', 'desc')->paginate(12);
        return view('adopt/all', ['creatures' => $creatures, 'category' => 'all', 'current' => 'adopt']);
    }

    public function getMyCreatures()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;

            $pets = Creature::where('owner_id', $id)->get();
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('creatures/monsters', [
                'pets' => $pets,
                'purchases' => $purchases,
                'category' => "All",
                'current' => 'all'
            ]);
        } else {
            return redirect()
                ->route('home')
                ->with('message', "You must sign in to see this page.");
        }
    }

    public function postAdoptCreature(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'creature_id' => 'required',
            ]);

            $user = Auth::user();
            $user_id = $user->id;

            $creature = Creature::find($request['creature_id']);

            // take amount from buyer
            if ($user->balance >= $creature->cost) {
                $user->balance -= $creature->cost;
                $user->save();

                // give cash to seller (if not sold by bot)
                if (!is_null($creature->seller_id)) {
                    $seller = Auth::user()->find($creature->seller_id);
                    $seller->balance += $creature->cost;
                    $seller->save();
                }

            } else {
                return redirect()->back()->with('error', 'Uh oh, you do not have enough funds for that.');
            }

            $creature->update([
                'owner_id' => $user_id,
                'for_sale' => false,
                'cost' => null,
            ]);

            $creature->save();


            return redirect()->back()->with('banner-message', 'Congrats on the adoption!');
        } else {
            return redirect()->back()->with('error', 'Uh oh, you must sign in to do that.');
        }
    }

    public function postSellCreature(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'creature_id' => 'required',
                'cost' => 'required|numeric|min:1',
            ]);

            $user = Auth::user();
            $user_id = $user->id;

            $creature = Creature::find($request['creature_id']);

            // make sure creature belongs to potential seller
            if ($creature->owner_id == $user_id) {
                $creature->update([
                    'for_sale' => true,
                    'cost' => $request['cost'],
                    'owner_id' => null,
                    'seller_id' => $user_id
                ]);

                // see if creature was breeding
                $gender = $creature->gender == 'male' ? 'male_id' : 'female_id';
                $breed_ticket = BreedTicket::where($gender, $creature->id)->first();
                if (!is_null($breed_ticket) && $breed_ticket->open) {
                    $this->cancelBreeding($breed_ticket);
                }


                $creature->save();

                $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
                return redirect()->route('adoptable', ['creatures' => $creatures, 'current' => 'all'])->with('banner-message', 'You successfully listed a creature for adoption.');
            } else {
                return redirect()->back()->with('error', 'Hmm, that creature is not registered to you.');
            }

        } else {
            return redirect()->back()->with('error', 'Uh oh, you must sign in to do that.');
        }
    }

    public function postCancelSellCreature(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'creature_id' => 'required'
            ]);

            $user = Auth::user();
            $user_id = $user->id;

            $creature = Creature::find($request['creature_id']);

            // make sure creature belongs to seller
            if ($creature->seller_id == $user_id) {
                $creature->update([
                    'for_sale' => false,
                    'cost' => null,
                    'owner_id' => $user_id,
                    'seller_id' => null,
                ]);

                $creature->save();

                $banner_message = $creature->dev_stage == 'egg' ? 'You have successfully listed an egg for sale.' : 'An adoption has been successfully cancelled.';

                $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
                return redirect()->route('adoptable', ['creatures' => $creatures, 'current' => 'all'])->with('banner-message', $banner_message);
            } else {
                return redirect()->back()->with('error', 'Hmm, that creature is not registered to you.');
            }

        } else {
            return redirect()->back()->with('error', 'Uh oh, you must sign in to do that.');
        }
    }

    public function postNameChangeAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        $creature = Creature::find($request->input('id'));
        $name = $request->input('name');
        $creature->name = $name;
        $creature->save();

        return response()->json(['success' => 'Name changed!']);
    }

    public function postFeedAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pet_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        // find fed creature and consumed item
        $creature = Creature::find($request->input('pet_id'));
        $item = Food::find($request->input('item_id'));

        // get user
        $user = Auth::user();
        // take away items from inventory
        $qty = $request->input('qty');
        $purchase = Purchase::where('owner_id', $user->id)->where('item_id', $request->input('item_id'))->first();

        $newQty = 0;
        if ($purchase->qty <= $qty) {
            $purchase->delete();
        } else {
            $purchase->qty -= $qty;
            $purchase->save();
            $newQty = $purchase->qty;
        }

        // set effect amounts
        $mainStatEffect = $item->mainStat;
        $mainStatEffectAmount = $item->effectAmount * $qty;
        // hunger needs to be handled differently because it is a percentage with a max of 100%
        if ($mainStatEffect == 'hunger') {
            // make sure we don't go over 100%
            if ($creature->hunger + $mainStatEffectAmount >= 100) {
                $creature->hunger = 100;
            } else {
                $creature->hunger += $mainStatEffectAmount;
            }
            // this stat is one with a max_stat variation, we can set it back to its own max stat to avoid overflow
        } else $this->setStatEffect($mainStatEffect, $creature, $mainStatEffectAmount);

//         set bonus effect amounts
        if (!is_null($item->bonusStat)) {
            $secondaryStatEffect = $item->bonusStat;
            $secondaryStatEffectAmount = $item->bonusEffectAmount * $qty;
            $this->setStatEffect($secondaryStatEffect, $creature, $secondaryStatEffectAmount);
        } else {
            $secondaryStatEffect = 'none';
        }

        $hunger = $creature->hunger;                                           // max is 100 so no need to adjust for percentage
        $stamina = $creature->current_stamina;  // need percentage for bar
        $max_stamina = $creature->max_stamina;                                 // for display purposes only
        $health = $creature->current_health;     // need percentage for bar
        $max_health = $creature->max_health;                                   // for display purposes only


        $creature->save();

        return response()->json([
            'success' => 'Creature fed!',
            'hunger' => $hunger,
            'stamina' => $stamina,
            'max_stamina' => $max_stamina,
            'health' => $health,
            'max_health' => $max_health,
            'mainStat' => $mainStatEffect,
            'secondStat' => $secondaryStatEffect,
            'newQty' => $newQty
        ]);

    }

    public function getListBreedingPairs()
    {
        if (Auth::check()) {

            $user = Auth::user();
            $breed_instances = BreedTicket::where('owner_id', $user->id)->where('open', true)->orderBy('updated_at', 'desc')->paginate(8);
            return view('creatures/pairs', ['breed_instances' => $breed_instances, 'category' => 'all', 'current' => 'breed']);

        } else {
            return redirect()->back()->with('message', 'You must be logged in to do that.');
        }
    }

    public function postBreedingPage(Request $request)
    {
        $this->validate($request, [
            'id1' => 'required',
            'id2' => 'required'
        ]);

        if (Auth::check()) {

            $user = Auth::user();
            $primary = Creature::find($request->input('id1'));
            $secondary = Creature::find($request->input('id2'));
            $female_id = $primary->id;
            $male_id = $secondary->id;
            // make one-liners
            if ($primary->gender == 'male') {
                $female_id = $secondary->id;
                $male_id = $primary->id;
            }

            if ($primary->available && $secondary->available) {
                $breed_ticket = new BreedTicket([
                    'breed_start_time' => Carbon::now(),
                    'owner_id' => $user->id,
                    'male_id' => $male_id,
                    'female_id' => $female_id
                ]);

                $breed_ticket->save();

                // set up pairing
                $primary->available = false;
                $primary->save();

                $secondary->available = false;
                $secondary->save();

                $breed_instance = BreedTicket::find($breed_ticket->id);
                $alternatives = Creature::where('owner_id', $user->id)->where('available', true)->where('dev_stage', 'adult')->get();

                // we want to return a redirect to a route to handle showing this view eventually
//                return redirect()->route('get-breeding-pair', ['id' => $breed_ticket->id]);

                return view('creatures/breed', ['breed_instance' => $breed_instance, 'alternatives' => $alternatives, 'category' => 'none', 'current' => 'breed']);
            } else {
                return redirect()->route('list-breeding-pairs');
            }
        } else
            return redirect()->back()->with('error', 'Your session ahs expired. Please login again.');

    }

    public function getBreedingPair($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $breed_instance = BreedTicket::find($id);
            $alternatives = Creature::where('owner_id', $user->id)->where('available', true)->where('dev_stage', 'adult')->get();

            if ($breed_instance->owner_id == $user->id) {
                if (!is_null($breed_instance)) {
                    return view('/creatures/breed')->with(['breed_instance' => $breed_instance, 'alternatives' => $alternatives, 'category' => 'none', 'current' => 'breed progress']);
                } else {
                    return redirect()->back()->with('message', 'Sorry, that breeding ticket was closed or no longer exists.');
                }
            } else {
                return redirect()->back()->with('message', 'You can only see progress of your own creatures.');
            }

        } else {
            return redirect()->back()->with('message', 'Oops, please login before trying that again.');
        }

    }

    public function postBreedAjax(Request $request) {

        $validator = Validator::make($request->all(), [
            'creature_id_Male' => 'required',
            'creature_id_Female' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        // get user
        $user = Auth::user();

        // find parents
        $mom = Creature::find($request->input('creature_id_Male'));
        $dad = Creature::find($request->input('creature_id_Female'));

        // make new baby from parent's stats

        // for now, send default egg
        $egg = new Creature([
            'name'=>'new egg',
            'species'=>'bird',
            'element'=>'dark',
            'description'=>'new egg baby from parents',
            'potential'=>rand(10, 50),
            'max_health'=> 3000,
            'current_health'=>rand(250, 3000),
            'max_stamina'=> 1500,
            'current_stamina'=>rand(250, 1500),
            'hunger'=>rand(25, 100),
            'mojo'=>rand(10, 50),
            'magic'=>rand(250, 2000),
            'strength'=>rand(250, 2000),
            'defense'=>rand(250, 1000),
            'level'=>rand(1, 30),
            'dev_stage' => "egg",
            'owner_id'=> $user->id,
        ]);

        $egg->save();

        return response()->json([
            'success' => 'Creature bred!',
            'egg_element' => $egg->element,
        ]);
    }

    public function postIncubateSingle(Request $request)
    {
        $this->validate($request, [
            'pet_id' => 'required'
        ]);
        if (Auth::check()) {
            $pet_id = $request->input('pet_id');
            $user = Auth::user();
            $newEgg = Creature::find($pet_id);
            $eggs = Creature::where('owner_id', $user->id)->where('is_incubating', true)->get();

            return view('creatures/incubators', ['eggs' => $eggs, 'newEgg' => $newEgg, 'category' => 'incubator', 'current' => 'eggs']);
        } else {
            return redirect()->back()->with('error', 'Uh oh, you must signed in to do that.');
        }
    }


    /**
     * @param $statEffect
     * @param $creature
     * @param float|int $statEffectAmount
     * @return void
     */
    public function setStatEffect($statEffect, $creature, float|int $statEffectAmount): void
    {
        if ($creature->{$statEffect} == 'stamina' || $creature->{$statEffect} == 'health') {
            $creature->{$statEffect} = 'current_' . $creature->{$statEffect};
        }

        if (Str::contains($creature->{$statEffect}, 'current_')) {
            // take second part of stat name,
            // for example: if stat effect is current_health
            // take 'health' and prefix with 'max_'
            $stat = explode("_", $creature->{$statEffect});
            // if current health plus health from food is greater than max, set to max instead
            if ($creature->{$statEffect} + $statEffectAmount >= $creature->{"max_" . $stat[1]}) {
                $creature->{$statEffect} = $creature->{"max_" . $stat[1]};
            } else {
                $creature->{$statEffect} += $statEffectAmount;
            }
            // otherwise, assume this is a stat like magic where there is no ceiling
        } else {
            $creature->{$statEffect} += $statEffectAmount;
        }
    }

    /**
     * @param $breed_ticket
     * @return void
     */
    public function cancelBreeding($breed_ticket): void
    {
        $male = Creature::find($breed_ticket->male_id);
        $female = Creature::find($breed_ticket->female_id);

        $male->available = true;
        $male->save();

        $female->available = true;
        $female->save();

        $breed_ticket->breed_end_time = Carbon::now();
        $breed_ticket->open = false;
        $breed_ticket->save();
    }
}
