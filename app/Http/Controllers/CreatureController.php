<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use App\Models\Food;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreatureController extends Controller
{
    // breeding
//    public function postFeedCreature(Request $request)
//    {
//        $request->validate([
//            'creature_id' => 'required',
//            'item_id' => 'required',
//            'qty' => 'required'
//        ]);
//
//        // find item
//        $creature = Creature::find($request->creature_id);
//
//        // find creature
//        $creature = Creature::find($request->creature_id);
//
//        // increment creature values
//        // factor in qty
//
//        $creature->level += 2;
//
//        // save
//        $creature->save();
//
//        // send updated creature back to view
//        $user = Auth::user();
//        $creatures = Creature::where('owner_id', $user->id)->where('dev_stage', 2)->orderby('id', 'asc');
//
//        $response['data'] = $creatures;
//
//        return response()->json($response);
//    }

    public function getAdoptable()
    {
        $creatures = Creature::where('for_sale', true)->where('dev_stage', '!=', 'egg')->orderBy('updated_at', 'desc')->paginate(12);
        return view('adopt/all', ['creatures' => $creatures, 'category' => 'all', 'current' => 'adopt']);
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


            $pets = Creature::where('owner_id', $user_id)->get();
            return redirect()->route('my-creatures', ['pets' => $pets])->with('banner-message', 'Congrats on the adoption!');
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
                    'seller_id' => null
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

    public function getBreeding($id1, $id2)
    {

        $primary = Creature::find($id1);
        $secondary = Creature::find($id2);
        return view('user/breed', ['primary' => $primary, 'secondary' => $secondary, 'category' => 'all', 'current' => 'breed']);

    }

    public function postIncubateSingle(Request $request){
        $this->validate($request, [
            'pet_id' => 'required'
        ]);
        if (Auth::check()) {
            $pet_id = $request->input('pet_id');
            $user = Auth::user();
            $newEgg = Creature::find($pet_id);
            $eggs = Creature::where('owner_id', $user->id)->where('is_incubating', true)->get();

            return view('user/incubators', ['eggs' => $eggs, 'newEgg' => $newEgg, 'category' => 'incubator', 'current' => 'eggs']);
        } else {
            return redirect()->back()->with('error', 'Uh oh, you must sign in to do that.');
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
}
