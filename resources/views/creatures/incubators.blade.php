@extends('layout.master')
@section('title')
    Egg Incubators
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
            @foreach($eggs as $egg)
                <div class="col-lg-6 col-sm-10 monster-card-front mb-5">
                    {{$egg->name}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
