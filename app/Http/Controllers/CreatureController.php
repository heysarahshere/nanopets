<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatureController extends Controller
{
    // breeding
    public function postFeedCreature(Request $request)
    {
        $request->validate([
            'creature_id' => 'required',
            'item_id' => 'required'
        ]);

        // find item

        // find creature

        // increment creature values & save

        // send updated creature
        $user = Auth::user();
        $creatures = Creature::where('owner_id', $user->id)->where('dev_stage', 2)->orderby('id', 'asc');

        $response['data'] = $creatures;

        return response()->json($response);
    }

}
