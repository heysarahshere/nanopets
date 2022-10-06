<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use App\Models\Purchase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getHome()
    {
        if (Auth::check()) {
            $id = Auth::id();

            $pets = Creature::where('owner_id', $id)->get();
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('creatures/monsters', [
                'pets' => $pets,
                'purchases' => $purchases,
                'category' => "All",
                'current' => 'all'
            ]);
        } else {
            return view('home');
        }

    }

    public function getAbout()
    {
        return view('about');
    }
}
