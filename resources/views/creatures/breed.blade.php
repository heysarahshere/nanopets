@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.profile-nav')

    <div class="soft-ombre-banner">
        <div class="container-monsters">
            <div class="col-6">
                <h1 style="color: white; text-align: center"> Make a hybrid! </h1>
            </div>
            <div class="col-6 banner-img-container">
                <img class="banner-img" src="{{ asset("images/monster_4b.png" )}}" alt="Monster Image">
            </div>

        </div>
    </div>

    {{--  scrollable row of creatures  --}}
    <div class="container-monsters">
        <h1 class="text-center">Select creatures</h1>
        <div class="card py-0 feed-card" style="border-radius: 15px; width: 98%;">
            <div class="row">
                <div class="row mt-0 " style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
                    <div class="container-fluid py-2">
                        <div class="d-flex flex-row flex-nowrap">
                            @foreach($alternatives as $alternative)
                                    <div class="card card-body {{$alternative->gender == 'male' ? 'blue' : 'pink'}}-border" id="breed_{{$alternative->id}}_{{$alternative->gender}}">
                                        <div>
                                            <i class="fa-regular fa-heart cupid-heart"></i>
                                            <img class="card-img-top"
                                                 style="width: auto; height: 100%; max-width: 250px;display:block"
                                                 src="{{ Storage::disk('s3')->url("/images/creatures/" . $alternative->species . "/adult/" . $alternative->element . ".png") }}">
                                        </div>
                                        <h2 style="color: black; text-align: center;">{{$alternative->name}}</h2>
                                    </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--  end scrollable row of creatures  --}}

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card breed-main pb-5">

            <div class="row m-2 mb-3">
                <div class="col-6 mt-3" style="height: 100%">
                    <div class="col-12 blue-breed-gradient">
                        <div class="blue-progress-breed blue-breed-bar">
                            <span style="width: {{$breed_instance->progress}}%" id="blue-span"></span>
                        </div>
                    </div>
                    <div class="col-6 mr-auto m-5">
                        <h2 style="color: #0060ce; text-align: center">{{ $breed_instance->daddy->name }}</h2>
                        <div class="store-img-container breed-blue mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $breed_instance->daddy->species . "/" . $breed_instance->daddy->dev_stage . "/" . $breed_instance->daddy->element . ".png" )}}"
                                     alt="{{ $breed_instance->daddy->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 mt-3" style="height: 100%">

                    <div class="col-12 pink-breed-gradient pink-breed-bar">
                        <div class="pink-progress-breed">
                            <span style="width: {{$breed_instance->progress}}%; margin-left: auto !important;" id="pink-span"></span>
                        </div>
                    </div>
                    <div class="col-6 ml-auto m-5">
                        <h2 style="color: #ad084d; text-align: center">{{ $breed_instance->mommy->name }}</h2>
                        <div class="store-img-container breed-pink mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $breed_instance->mommy->species . "/" . $breed_instance->mommy->dev_stage . "/" . $breed_instance->mommy->element . ".png" )}}"
                                     alt="{{ $breed_instance->mommy->name }} Image">
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
                            <p>Health: {{$breed_instance->daddy->max_health}}</p>
                            <p>Endurance: {{$breed_instance->daddy->max_stamina}}</p>
                            <p>Defense: {{$breed_instance->daddy->defense}}</p>
                            <p>Attack: {{$breed_instance->daddy->strength}}</p>
                            <p>Magic: {{$breed_instance->daddy->magic}}</p>
                            <p>Mojo: {{$breed_instance->daddy->mojo}}</p>
                            <p></p>
                            <p>Gene dominance: {{$breed_instance->daddy->potential}}%</p>
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
                            <div class="breed-parent col-12"
                                 style="display: flex; justify-content: center; align-items: center;">
                                <h1 class="m-auto breed-question">?</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mt-5 m-auto" style="height: 100%">
                    <div class="col-12 m-auto">
                        <div class=" pink-breed-stat p-3">
                            <h2 style="color: white; text-align: center">STATS</h2>
                            <p>Health: {{$breed_instance->mommy->max_health}}</p>
                            <p>Endurance: {{$breed_instance->mommy->max_stamina}}</p>
                            <p>Defense: {{$breed_instance->mommy->defense}}</p>
                            <p>Attack: {{$breed_instance->mommy->strength}}</p>
                            <p>Magic: {{$breed_instance->mommy->magic}}</p>
                            <p>Mojo: {{$breed_instance->mommy->mojo}}</p>
                            <p></p>
                            <p>Gene dominance: {{$breed_instance->mommy->potential}}%</p>
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

<script>
    function swapFemale(ev) {
        ev.preventDefault();
    }
    function swapMale(ev) {
        ev.preventDefault();
    }

</script>

{{-- row for creature select? --}}
{{--<div class="row">--}}

{{--    <div class="col-lg-2 col-sm-4 pb-5">--}}
{{--        <h2 class="card-title">{{ $breed_instance->daddy->name }}</h2>--}}
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
