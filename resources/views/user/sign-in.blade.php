@extends('layout.master')
@section('title')
    Sign In
@endsection
@section('content')

    <div class="home">
        <h1>Sign In</h1>
    </div>

<div class="col-md-4 col-sm-10 m-auto">
    <form method="POST" action="{{route('sign-in')}}">
        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
          </div>
        {{ csrf_field() }}
          <button class="rev-ombre-btn m-auto text-center" type="submit" class="btn btn-primary">submit</button>
        <button class="ombre-btn m-auto text-center" class="btn btn-primary">forgot password?</button>
    </form></div>
@endsection
