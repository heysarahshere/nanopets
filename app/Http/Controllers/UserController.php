<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use App\Models\Food;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignIn()
    {
        return view('user/sign-in');
    }

    public function getSignUp()
    {
        return view('user/sign-up');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|unique:users',
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required '
        ]);

        $user = new User([
            'username' => $request->input('username'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

//        if ($request->has('sign-in-page')) {
//            return redirect()->route('home')->with('message', "You're signed in.");
//        }
        return redirect()
            ->route('my-creatures')
            ->with('message', "You're signed in.");
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) {

            $user = Auth::user();
            Auth::login($user);

//            $request->session()->forget('sign-in-error');

            return redirect()
                ->route('my-creatures')
                ->with('message', "You're signed in.");
        }

        return redirect('user/sign-in')
            ->with('message', 'Incorrect username or password.');
    }

    public function postSignOut(Request $request)
    {
        Auth::logout();
        return redirect()
            ->route('home')
            ->with('message', "You've been signed out.");
    }


    public function getProfile()
    {
        $id = Auth::id();

        $pets = Creature::where('owner_id', $id)->get();
        return view('user/profile', [
            'pets' => $pets
        ]);
    }

    public function getMyCreatures()
    {
        if (Auth::check()) {
            $id = Auth::id();

            $pets = Creature::where('owner_id', $id)->get();
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('user/monsters', [
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

    public function getMyAdultCreatures()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            $pets = Creature::where('owner_id', $id)->where('dev_stage', 'adult')->orderBy('updated_at', 'desc')->paginate(8);
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('user/monsters', [
                'pets' => $pets,
                'purchases' => $purchases,
                'category' => "All",
                'current' => 'adults'
            ]);
        } else {
            return redirect()->back()->with('error', 'Oops, you need to be logged in to do that.');
        }
    }

    public function getMyBabyCreatures()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            $pets = Creature::where('owner_id', $id)->where('dev_stage', 'baby')->orderBy('updated_at', 'desc')->paginate(8);
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('user/monsters', [
                'pets' => $pets,
                'purchases' => $purchases,
                'category' => "All",
                'current' => 'babies'
            ]);
        } else {
            return redirect()->back()->with('error', 'Oops, you need to be logged in to do that.');
        }
    }

    public function getMyIncubator()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            $pets = Creature::where('owner_id', $id)->where('dev_stage', 'egg')->orWhere('dev_stage', 'hatchling')->orderBy('updated_at', 'desc')->paginate(8);
            $purchases = Purchase::where('owner_id', $id)->get();
            return view('user/incubators', [
                'pets' => $pets,
                'purchases' => $purchases,
                'category' => "All",
                'current' => 'eggs']);
        } else {
            return redirect()->back()->with('error', 'Oops, you need to be logged in to do that.');
        }
    }
    // for future public profile use
    public function getCreatures($user)
    {
        $owner = User::where('username', $user)->first();

        $pets = Creature::where('owner_id', $owner->id)->get();
        return view('user/monsters', [
            'pets' => $pets,
            'owner' => $owner
        ]);
    }

}
