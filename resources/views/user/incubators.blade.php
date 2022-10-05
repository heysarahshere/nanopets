@extends('layout.master')
@section('title')
Egg Incubators
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
            @foreach($pets as $pet)
                <div class="col-lg-6 col-sm-10 monster-card-front mb-5">
                </div>
            @endforeach
        </div>
    </div>

@endsection
