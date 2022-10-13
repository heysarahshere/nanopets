@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.info.banner-message')

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
                                <div class="card card-body {{$alternative->gender == 'male' ? 'blue' : 'pink'}}-border"
                                     id="breed_{{$alternative->id}}_{{$alternative->gender}}"
                                     onclick="swapCreature(event, '{{$alternative->id}}', '{{Str::title($alternative->gender)}}')">

                                    <div>
                                        <i class="fa-regular fa-heart cupid-heart"></i>
                                        <img class="card-img-top"
                                             id="littleCardImage_{{$alternative->id}}_{{Str::title($alternative->gender)}}"
                                             style="width: auto; height: 100%; max-width: 250px;display:block"
                                             src="{{ Storage::disk('s3')->url("/images/creatures/" . $alternative->species . "/adult/" . $alternative->element . ".png") }}">
                                    </div>
                                    <h2 id="littleCardName_{{$alternative->id}}_{{Str::title($alternative->gender)}}"
                                        style="color: black; text-align: center;">{{$alternative->name}}</h2>
                                </div>
                                <input type="hidden" value="{{$alternative->max_health}}"
                                       id="alt_health_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->max_stamina}}"
                                       id="alt_stamina_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->defense}}"
                                       id="alt_defense_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->strength}}"
                                       id="alt_strength_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->magic}}"
                                       id="alt_magic_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->mojo}}" id="alt_mojo_{{$alternative->id}}">
                                <input type="hidden" value="{{$alternative->potential}}"
                                       id="alt_potential_{{$alternative->id}}">
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--  end scrollable row of creatures  --}}

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card breed-main pb-5 mb-3">

            <div class="row m-2 mb-3">
                <div class="col-6 mt-3" style="height: 100%">
                    <div class="col-12 blue-breed-gradient">
                        <div class="blue-progress-breed blue-breed-bar">
                            <span style="width: {{$breed_instance->progress}}%" id="blue-span"></span>
                        </div>
                    </div>
                    <div class="col-6 mr-auto m-5">
                        <h2 id="bigCardName_Male"
                            style="color: #0060ce; text-align: center">{{ $breed_instance->daddy->name }}</h2>
                        <div class="store-img-container breed-blue mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child" id="bigCardImage_Male"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $breed_instance->daddy->species . "/" . $breed_instance->daddy->dev_stage . "/" . $breed_instance->daddy->element . ".png" )}}"
                                     alt="{{ $breed_instance->daddy->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 mt-3" style="height: 100%">

                    <div class="col-12 pink-breed-gradient pink-breed-bar">
                        <div class="pink-progress-breed">
                            <span style="width: {{$breed_instance->progress}}%; margin-left: auto !important;"
                                  id="pink-span"></span>
                        </div>
                    </div>
                    <div class="col-6 ml-auto m-5">
                        <h2 id="bigCardName_Female"
                            style="color: #ad084d; text-align: center">{{ $breed_instance->mommy->name }}</h2>
                        <div class="store-img-container breed-pink mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child" id="bigCardImage_Female"
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
                            <div class="row m-auto">
                                <p>Health: </p>&nbsp;<p id="health_p_Male">{{$breed_instance->daddy->max_health}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Endurance: </p>&nbsp;<p
                                    id="stamina_p_Male">{{$breed_instance->daddy->max_stamina}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Defense: </p>&nbsp;<p id="defense_p_Male">{{$breed_instance->daddy->defense}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Attack: </p>&nbsp;<p id="strength_p_Male">{{$breed_instance->daddy->strength}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Magic: </p>&nbsp;<p id="magic_p_Male">{{$breed_instance->daddy->magic}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Mojo: </p>&nbsp;<p id="mojo_p_Male">{{$breed_instance->daddy->mojo}}</p></div>
                            <p></p>
                            <div class="row m-auto">
                                <p>Gene dominance: </p>&nbsp;<p
                                    id="potential_p_Male">{{$breed_instance->daddy->potential}}%</p>
                            </div>
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
                        <div class="pink-breed-stat p-3">
                            <h2 style="color: white; text-align: center">STATS</h2>
                            <div class="row m-auto">
                                <p>Health: </p>&nbsp;<p id="health_p_Female">{{$breed_instance->mommy->max_health}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Endurance: </p>&nbsp;<p
                                    id="stamina_p_Female">{{$breed_instance->mommy->max_stamina}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Defense: </p>&nbsp;<p id="defense_p_Female">{{$breed_instance->mommy->defense}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Attack: </p>&nbsp;<p id="strength_p_Female">{{$breed_instance->mommy->strength}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Magic: </p>&nbsp;<p id="magic_p_Female">{{$breed_instance->mommy->magic}}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Mojo: </p>&nbsp;<p id="mojo_p_Female">{{$breed_instance->mommy->mojo}}</p></div>
                            <p></p>
                            <div class="row m-auto">
                                <p>Gene dominance: </p>&nbsp;<p
                                    id="potential_p_Female">{{$breed_instance->mommy->potential}}%</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <button class="btn btn-danger w-100 mt-4 large-breed-start-btn">START <span class="text-right ml-auto">></span></button>
    </div>
    </div>
    </div>

@endsection

<script>
    function swapCreature(event, id, gender) {
        event.preventDefault();

        // get name info from little card
        let littleCardName = document.getElementById("littleCardName_" + id + "_" + gender);
        let littleCardNameText = document.getElementById("littleCardName_" + id + "_" + gender).innerHTML;

        // get name info from big card
        let bigCardName = document.getElementById("bigCardName_" + gender);
        let bigCardNameText = document.getElementById("bigCardName_" + gender).innerHTML;

        // ---------------------------------------------- get stats
        // stat fields from big
        let bigHealth = document.getElementById("health_p_" + gender);
        let bigStamina = document.getElementById("stamina_p_" + gender);
        let bigDefense = document.getElementById("defense_p_" + gender);
        let bigStrength = document.getElementById("strength_p_" + gender);
        let bigMagic = document.getElementById("magic_p_" + gender);
        let bigMojo = document.getElementById("mojo_p_" + gender);
        let bigPotential = document.getElementById("potential_p_" + gender);

        // stat field values from big
        let bigHealthValue = document.getElementById("health_p_" + gender).innerHTML;
        let bigStaminaValue = document.getElementById("stamina_p_" + gender).innerHTML;
        let bigDefenseValue = document.getElementById("defense_p_" + gender).innerHTML;
        let bigStrengthValue = document.getElementById("strength_p_" + gender).innerHTML;
        let bigMagicValue = document.getElementById("magic_p_" + gender).innerHTML;
        let bigMojoValue = document.getElementById("mojo_p_" + gender).innerHTML;
        let bigPotentialValue = document.getElementById("potential_p_" + gender).innerHTML;

        // stat fields from little
        let littleHealth = document.getElementById("alt_health_" + id);
        let littleStamina = document.getElementById("alt_stamina_" + id);
        let littleDefense = document.getElementById("alt_defense_" + id);
        let littleStrength = document.getElementById("alt_strength_" + id);
        let littleMagic = document.getElementById("alt_magic_" + id);
        let littleMojo = document.getElementById("alt_mojo_" + id);
        let littlePotential = document.getElementById("alt_potential_" + id);

        // stat field values from little
        let littleHealthValue = document.getElementById("alt_health_" + id).value;
        let littleStaminaValue = document.getElementById("alt_stamina_" + id).value;
        let littleDefenseValue = document.getElementById("alt_defense_" + id).value;
        let littleStrengthValue = document.getElementById("alt_strength_" + id).value;
        let littleMagicValue = document.getElementById("alt_magic_" + id).value;
        let littleMojoValue = document.getElementById("alt_mojo_" + id).value;
        let littlePotentialValue = document.getElementById("alt_potential_" + id).value;
        // ---------------------------------------------- end stats

        // get image info from little img
        let littleCardImage = document.getElementById("littleCardImage_" + id + "_" + gender);
        let littleCardImageSrc = document.getElementById("littleCardImage_" + id + "_" + gender).src;

        // get image info from big img
        let bigCardImage = document.getElementById("bigCardImage_" + gender);
        let bigCardImageSrc = document.getElementById("bigCardImage_" + gender).src;

        // ----------------  start swap

        // swap big and little names
        littleCardName.innerHTML = bigCardNameText;
        bigCardName.innerHTML = littleCardNameText;

        // swap big and little images
        littleCardImage.src = bigCardImageSrc;
        bigCardImage.src = littleCardImageSrc;

        // set big stats to little stat values
        bigHealth.innerHTML = littleHealthValue;
        bigStamina.innerHTML = littleStaminaValue;
        bigDefense.innerHTML = littleDefenseValue;
        bigStrength.innerHTML = littleStrengthValue;
        bigMagic.innerHTML = littleMagicValue;
        bigMojo.innerHTML = littleMojoValue;
        bigPotential.innerHTML = littlePotentialValue;

        // set little stats to big stat values
        littleHealth.value = bigHealthValue;
        littleStamina.value = bigStaminaValue;
        littleDefense.value = bigDefenseValue;
        littleStrength.value = bigStrengthValue;
        littleMagic.value = bigMagicValue;
        littleMojo.value = bigMojoValue;
        littlePotential.value = bigPotentialValue;
    }

</script>

