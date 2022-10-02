<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
        return view('adopt/all', ['creatures' => $creatures, 'current' => 'all']);
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

                $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
                return redirect()->route('adoptable', ['creatures' => $creatures, 'current' => 'all'])->with('banner-message', 'An adoption has been successfully cancelled.');
            } else {
                return redirect()->back()->with('error', 'Hmm, that creature is not registered to you.');
            }

        } else {
            return redirect()->back()->with('error', 'Uh oh, you must sign in to do that.');
        }
    }

}
