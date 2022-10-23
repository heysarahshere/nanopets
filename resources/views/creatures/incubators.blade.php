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
    <div class="container-monsters" id="incubating stats">
        <H2 class="text-center">Galaxy Egg</H2>
        <div class="row justify-content-center">
            <div class="col-12 mx-3">
                <div class="row">
                    <H2>health:</H2>
                    <H2 id="baby_health" style="margin-left: auto">0</H2>
                </div>
                <div class="row">
                    <H2>strength:</H2>
                    <H2 id="baby_strength" style="margin-left: auto">0</H2>
                </div>
                <div class="row">
                    <H2>stamina:</H2>
                    <H2 id="baby_stamina" style="margin-left: auto">0</H2>
                </div>
            </div>
        </div>
    </div>
@endsection
