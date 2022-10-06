@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card breed-main pb-5">

            <div class="row m-2 mb-3">
                <div class="col-6 mt-3" style="height: 100%">
                    <div class="col-12 blue-breed-gradient">
                        <div class="blue-progress-breed blue-breed-bar">
                            <span style="width: 25%" id="blue-span"></span>
                        </div>
                    </div>
                    <div class="col-6 mr-auto m-5">
                        <h2 style="color: #0060ce; text-align: center">{{ $primary->name }}</h2>
                        <div class="store-img-container breed-blue mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $primary->species . "/" . $primary->dev_stage . "/" . $primary->element . ".png" )}}"
                                     alt="{{ $primary->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 mt-3" style="height: 100%">

                    <div class="col-12 pink-breed-gradient pink-breed-bar">
                        <div class="pink-progress-breed">
                            <span style="width: 25%; margin-left: auto !important;" id="pink-span"></span>
                        </div>
                    </div>
                    <div class="col-6 ml-auto m-5">
                        <h2 style="color: #ad084d; text-align: center">{{ $secondary->name }}</h2>
                        <div class="store-img-container breed-pink mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $secondary->species . "/" . $secondary->dev_stage . "/" . $secondary->element . ".png" )}}"
                                     alt="{{ $secondary->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-3 mt-5 m-auto" style="height: 100%">
                    <div class="col-12 m-auto">
                        <div class=" blue-breed-stat p-3">
                            <h2 style="color: white; text-align: center">STATS</h2>
                            <p>Health: {{$primary->max_health}}</p>
                            <p>Endurance: {{$primary->max_stamina}}</p>
                            <p>Defense: {{$primary->defense}}</p>
                            <p>Attack: {{$primary->strength}}</p>
                            <p>Magic: {{$primary->magic}}</p>
                            <p>Mojo: {{$primary->mojo}}</p>
                            <p></p>
                            <p>Gene dominance: {{$primary->potential}}%</p>
                        </div>
                    </div>
                </div>

                <div class="col-3 mt-5 m-auto" style="height: 100%">

                    <div class="col-12 purple-breed-gradient purple-breed-bar">
                        <div class="purple-progress-breed">
                            <span style="width: 0%; margin-left: auto !important;" id="purple-span"></span>
                        </div>
                    </div>
                    <div class="col-12 m-auto m-5">
                        <div class="store-img-container breed-purple mb-3">
                            <div class="breed-parent col-12" style="display: flex; justify-content: center; align-items: center;">
                                  <h1 class="m-auto breed-question">?</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mt-5 m-auto" style="height: 100%">
                    <div class="col-12 m-auto">
                        <div class=" pink-breed-stat p-3">
                            <h2 style="color: white; text-align: center">STATS</h2>
                            <p>Health: {{$secondary->max_health}}</p>
                            <p>Endurance: {{$secondary->max_stamina}}</p>
                            <p>Defense: {{$secondary->defense}}</p>
                            <p>Attack: {{$secondary->strength}}</p>
                            <p>Magic: {{$secondary->magic}}</p>
                            <p>Mojo: {{$secondary->mojo}}</p>
                            <p></p>
                            <p>Gene dominance: {{$secondary->potential}}%</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    </div>

    <button class="btn btn-danger w-100 mt-4 large-breed-btn">BREED</button>
    </div>

@endsection

{{-- row for creature select? --}}
{{--<div class="row">--}}

{{--    <div class="col-lg-2 col-sm-4 pb-5">--}}
{{--        <h2 class="card-title">{{ $primary->name }}</h2>--}}
{{--        <div class="card store-card" style="width: 100%;">--}}
{{--            <div class="store-img-container">--}}
{{--                <div class="store-img-container">--}}
{{--                    <img class="card-img-top"--}}
{{--                         src="{{ Storage::disk('s3')->url("images/creatures/" . $primary->species . "/" . $primary->dev_stage . "/" . $primary->element . ".png" )}}"--}}
{{--                         alt="{{ $primary->name }} Image">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-lg-2 col-sm-4 pb-5">--}}
{{--        <h2 class="card-title">{{ $secondary->name }}</h2>--}}
{{--        <div class="card store-card" style="width: 100%;">--}}
{{--            <div class="store-img-container">--}}
{{--                <div class="store-img-container">--}}
{{--                    <img class="card-img-top"--}}
{{--                         src="{{ Storage::disk('s3')->url("images/creatures/" . $secondary->species . "/" . $secondary->dev_stage . "/" . $secondary->element . ".png" )}}"--}}
{{--                         alt="{{ $secondary->name }} Image">--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
