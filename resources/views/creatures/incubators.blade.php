@extends('layout.master')
@section('title')
    Egg Incubators
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">

        <div class="container-monsters">

            {{-- scrollable row for eggs that have not been incubated --}}
            <div class="card py-0 feed-card" style="border-radius: 15px; width: 98%;">
                <div class="row">
                    <div class="row mt-0"
                         style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
                        <div class="container-fluid py-2">
                            <div class="d-flex flex-row flex-nowrap">
                                @foreach ($eggs as $egg)
                                    <div class="card card-body" id="unincubated_egg{{$egg->id}}">
                                        <div>
                                            <img class="card-img-top"
                                                 id="uninc_{{ $egg->id }}"
                                                 style="width: auto; height: 100%; max-width: 250px;display:block"
                                                 src="{{ Storage::disk('s3')->url("/images/eggs/" . $egg->dev_stage . "/" . $egg->element . ".png") }}">
                                        </div>
                                        <h2>{{ $egg->element }}</h2>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- end un-incubated eggs --}}


            <h1 class="mt-5 text-white">COLD INCUBATOR</h1>
            <div class="card py-0 feed-card mb-5" style="border-radius: 15px; width: 98%; background-color: #009BC4">
                <div class="row">
                    <div class="row mt-0 "
                         style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
                        <div class="container-fluid py-2">
                            <div class="d-flex flex-row flex-nowrap">
                                @foreach ($eggs as $egg)
                                    <div class="card card-body" id="unincubated_egg{{$egg->id}}" style="background-color: rgba(255,255,255,0); border-color: #ffffff00; background-color: #ffffff00;}">
                                        <div>
                                            <img class="card-img-top" id="uninc_{{ $egg->id }}"
                                                 style="width: auto; height: 100%; max-width: 250px;display:block; margin: 0 auto"
                                                 src="{{ Storage::disk('s3')->url("/images/eggs/" . $egg->dev_stage . "/" . $egg->element . ".png") }}">
                                        </div>
                                        <div class="animated-progress mb-3 progress-green" id="stamina-meter-bar-{{$egg->id}}">
                                        <span style="width: {{$egg->progress}}%" id="stamina-meter-span-{{$egg->id}}"></span>
                                            <div class="reveal-stats" id="stamina-meter-{{$egg->id}}">
                                                <h2>{{$egg->progress}}%</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
