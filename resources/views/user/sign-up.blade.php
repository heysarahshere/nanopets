@extends('layout.master')
@section('title')
    Sign Up
@endsection
@section('content')

    <div class="home pb-5">
        <h1>create an account</h1>
    </div>
    <div class="col-md-4 col-sm-10 m-auto">
        <form method="POST" action="{{route('sign-up')}}">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                       placeholder="username">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp"
                           placeholder="first name">
                </div>
                <div class="form-group col-6">
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp"
                           placeholder="last name">
                </div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                       placeholder="confirm password">
            </div>
            {{ csrf_field() }}
            <div class="row text-center m-auto row align-items-center py-2 justify-content-center">
                <button class="rev-ombre-btn btn-lg" type="submit" class="btn btn-primary">sign up</button>
            </div>
        </form>
    </div>
@endsection
