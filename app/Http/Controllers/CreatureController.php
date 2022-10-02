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
        return view('adopt/all', ['creatures' => $creatures, 'current' => 'all', 'message', 'Congrats on the adoption!']);
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

            if ($user->balance >= $creature->cost) {
                $user->balance -= $creature->cost;
                $user->save();
            } else {
                return redirect()->back()->with('message', 'Uh oh, you do not have enough funds for that.');
            }

            $creature->update([
                'owner_id' => $user_id,
                'for_sale' => false,
                'cost' => null,
            ]);

            $creature->save();

            $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
            return view('adopt/all', ['creatures' => $creatures, 'current' => 'all', 'message', 'Congrats on the adoption!']);
        } else {
            return redirect()->back()->with('message', 'Uh oh, you must sign in to do that.');
        }
    }

    public function postSellCreature(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'creature_id' => 'required',
            ]);

            $user = Auth::user();
            $user_id = $user->id;

            $creature = Creature::find($request['creature_id']);

            if ($user->balance >= $creature->cost) {
                $user->balance -= $creature->cost;
                $user->save();
            } else {
                return redirect()->back()->with('message', 'Uh oh, you do not have enough funds for that.');
            }

            $creature->update([
                'owner_id' => $user_id,
                'for_sale' => false,
                'cost' => null,
            ]);

            $creature->save();

            $creatures = Creature::where('for_sale', true)->orderBy('updated_at', 'desc')->paginate(12);
            return view('adopt/all', ['creatures' => $creatures, 'current' => 'all', 'message', 'Congrats on the adoption!']);
        } else {
            return redirect()->back()->with('message', 'Uh oh, you must sign in to do that.');
        }
    }


}
