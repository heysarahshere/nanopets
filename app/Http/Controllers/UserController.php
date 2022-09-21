<?php

namespace App\Http\Controllers;

use App\Models\Pet;
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
            ->route('home')
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
                ->route('home')
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

        $pets = Pet::where('owner_id', $id)->get();
        return view('user/profile', [
            'pets' => $pets
        ]);
    }

}
