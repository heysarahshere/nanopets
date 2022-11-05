@extends('layout.master')
@section('title')
    {{ Str::title($current) }}
@endsection
@section('content')
    @include('partials.info.banner-message')

    <div class="soft-ombre-banner">
        <div class="container-monsters">
            <div class="col-6">
                <h1 style="color: white; text-align: center"> Make a hybrid! </h1>
            </div>
            <div class="col-6 banner-img-container">
                <img class="banner-img" src="{{ asset('images/monster_4b.png') }}" alt="Monster Image">
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
                            @foreach ($alternatives as $alternative)
                                <div class="card card-body {{ $alternative->gender == 'male' ? 'blue' : 'pink' }}-border"
                                    id="breed_{{ $alternative->id }}_{{ $alternative->gender }}"
                                    onclick="swapCreature(event, '{{ $alternative->id }}', '{{ Str::title($alternative->gender) }}')">

                                    <div>
                                        <i class="fa-regular fa-heart cupid-heart"></i>
                                        <img class="card-img-top"
                                            id="littleCardImage_{{ $alternative->id }}_{{ Str::title($alternative->gender) }}"
                                            style="width: auto; height: 100%; max-width: 250px;display:block"
                                            src="{{ Storage::disk('s3')->url('/images/creatures/' . $alternative->species . '/adult/' . $alternative->element . '.png') }}">
                                    </div>
                                    <h2 id="littleCardName_{{ $alternative->id }}_{{ Str::title($alternative->gender) }}"
                                        style="color: black; text-align: center;">{{ $alternative->name }}</h2>
                                </div>
                                <input type="hidden" value="{{ $alternative->max_health }}"
                                    id="alt_health_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->max_stamina }}"
                                    id="alt_stamina_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->defense }}"
                                    id="alt_defense_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->strength }}"
                                    id="alt_strength_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->magic }}"
                                    id="alt_magic_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->mojo }}"
                                    id="alt_mojo_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->potential }}"
                                    id="alt_potential_{{ $alternative->id }}">
                                <input type="hidden" value="{{ $alternative->id }}"
                                    id="creature_id_{{ $alternative->id }}">
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
                            <span style="width: {{ $breed_instance->progress }}%" id="blue-span"></span>
                        </div>
                    </div>
                    <div class="col-6 mr-auto m-5">
                        <h2 id="bigCardName_Male" style="color: #0060ce; text-align: center">
                            {{ $breed_instance->daddy->name }}</h2>
                        <div class="store-img-container breed-blue mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child" id="bigCardImage_Male"
                                    src="{{ Storage::disk('s3')->url('images/creatures/' . $breed_instance->daddy->species . '/' . $breed_instance->daddy->dev_stage . '/' . $breed_instance->daddy->element . '.png') }}"
                                    alt="{{ $breed_instance->daddy->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 mt-3" style="height: 100%">

                    <div class="col-12 pink-breed-gradient pink-breed-bar">
                        <div class="pink-progress-breed">
                            <span style="width: {{ $breed_instance->progress }}%; margin-left: auto !important;"
                                id="pink-span"></span>
                        </div>
                    </div>
                    <div class="col-6 ml-auto m-5">
                        <h2 id="bigCardName_Female" style="color: #ad084d; text-align: center">
                            {{ $breed_instance->mommy->name }}</h2>
                        <div class="store-img-container breed-pink mb-3">
                            <div class="breed-parent col-12">
                                <img class="breed-child" id="bigCardImage_Female"
                                    src="{{ Storage::disk('s3')->url('images/creatures/' . $breed_instance->mommy->species . '/' . $breed_instance->mommy->dev_stage . '/' . $breed_instance->mommy->element . '.png') }}"
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
                                <p>Health: </p>&nbsp;<p id="health_p_Male">{{ $breed_instance->daddy->max_health }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Endurance: </p>&nbsp;<p id="stamina_p_Male">{{ $breed_instance->daddy->max_stamina }}
                                </p>
                            </div>
                            <div class="row m-auto">
                                <p>Defense: </p>&nbsp;<p id="defense_p_Male">{{ $breed_instance->daddy->defense }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Attack: </p>&nbsp;<p id="strength_p_Male">{{ $breed_instance->daddy->strength }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Magic: </p>&nbsp;<p id="magic_p_Male">{{ $breed_instance->daddy->magic }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Mojo: </p>&nbsp;<p id="mojo_p_Male">{{ $breed_instance->daddy->mojo }}</p>
                            </div>
                            <p></p>
                            <div class="row m-auto">
                                <p>Gene dominance: </p>&nbsp;<p id="potential_p_Male">
                                    {{ $breed_instance->daddy->potential }}</p>
                                <p>%</p>
                            </div>

                            <input type="hidden" value="{{ $breed_instance->daddy->id }}" id="creature_id_Male">
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
                                <h1 class="m-auto breed-question" id="babyMysteryPicture">?</h1>
                                <img class="breed-child hiddenFace" id="babyCardImage"
                                    src="{{ Storage::disk('s3')->url('images/eggs/fire.png') }}"
                                    alt="{{ $breed_instance->mommy->name }} Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mt-5 m-auto" style="height: 100%">
                    <div class="col-12 m-auto">
                        <div class="pink-breed-stat p-3">
                            <h2 style="color: white; text-align: center">STATS</h2>
                            <div class="row m-auto">
                                <p>Health: </p>&nbsp;<p id="health_p_Female">{{ $breed_instance->mommy->max_health }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Endurance: </p>&nbsp;<p id="stamina_p_Female">{{ $breed_instance->mommy->max_stamina }}
                                </p>
                            </div>
                            <div class="row m-auto">
                                <p>Defense: </p>&nbsp;<p id="defense_p_Female">{{ $breed_instance->mommy->defense }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Attack: </p>&nbsp;<p id="strength_p_Female">{{ $breed_instance->mommy->strength }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Magic: </p>&nbsp;<p id="magic_p_Female">{{ $breed_instance->mommy->magic }}</p>
                            </div>
                            <div class="row m-auto">
                                <p>Mojo: </p>&nbsp;<p id="mojo_p_Female">{{ $breed_instance->mommy->mojo }}</p>
                            </div>
                            <p></p>
                            <div class="row m-auto">
                                <p>Gene dominance: </p>&nbsp;<p id="potential_p_Female">
                                    {{ $breed_instance->mommy->potential }}</p>
                                <p>%</p>
                            </div>
                            <input type="hidden" value="{{ $breed_instance->mommy->id }}" id="creature_id_Female">
                        </div>
                    </div>
                </div>


            </div>

            <div class="container egg-stats hiddenFace" id="egg-stats">
                <H2 class="text-center">Galaxy Egg</H2>
                <div class="row justify-content-center">
                    <div class="col-5 mx-3">
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
                    <div class="col-5 mx-3">
                        <div class="row">
                            <H2>defense:</H2>
                            <H2 id="baby_defense" style="margin-left: auto">0</H2>
                        </div>
                        <div class="row">
                            <H2>magic:</H2>
                            <H2 id="baby_magic" style="margin-left: auto">0</H2>
                        </div>
                        <div class="row">
                            <H2>tier:</H2>
                            <H2 id="baby_tier" style="margin-left: auto">0</H2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button onclick="startBreed(event)" class="btn btn-danger w-100 mt-4 large-breed-start-btn" {{ $breed_instance->started ? 'disabled' : '' }}>
            START <span class="text-right ml-auto">></span>
        </button>
    </div>
    </div>
    </div>
@endsection

<script>
    function swapCreature(event, id, gender) {
        event.preventDefault();

        // get ids from hidden input fields
        let littleID = document.getElementById("creature_id_" + id);
        let littleIDValue = document.getElementById("creature_id_" + id).value;
        let bigID = document.getElementById("creature_id_" + gender);
        let bigIDValue = document.getElementById("creature_id_" + gender).value;

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

    async function startBreed(event) {
        event.preventDefault();

        // get ids from the hidden inputs in mom and dad slots
        let mom_id = document.getElementById("creature_id_Female").value;
        let dad_id = document.getElementById("creature_id_Male").value;

        let babyMysteryPicture = document.getElementById("babyMysteryPicture");
        let babyCardImage = document.getElementById("babyCardImage");
        let egg_stats = document.getElementById("egg-stats");
        let baby_health = document.getElementById("baby_health");
        let baby_strength = document.getElementById("baby_strength");
        let baby_stamina = document.getElementById("baby_stamina");
        let baby_defense = document.getElementById("baby_defense");
        let baby_magic = document.getElementById("baby_magic");
        let baby_tier = document.getElementById("baby_tier");


        // shouldn't need form validation here, i think..

        $("#blue-span").css("width", 0).animate({width: "100%"}, 4500);
        $("#pink-span").css("width", 0).animate({width: "100%"}, 4500);
        await new Promise(resolve => setTimeout(resolve, 4500));
        $("#purple-span").css("width", 0).animate({width: "100%"}, 4500);
        await new Promise(resolve => setTimeout(resolve, 4000));

        jQuery.ajax({
            type: 'POST',
            url: "{{ route('breed-ajax') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "creature_id_Male": dad_id,
                "creature_id_Female": mom_id,
            },
            beforeSend: function (xhr, type) {
            },
            success: function (response) {
                if (response) {

                    //hide the question mark thing
                    babyMysteryPicture.classList.add('hiddenFace');
                    // set the egg image
                    babyCardImage.src = "https://nanopets.s3.us-west-2.amazonaws.com/images/eggs/" + response.egg_element + ".png"
                    //show the egg image
                    babyCardImage.classList.remove('hiddenFace');
                    //show the stat div for the child
                    //hid the start button/show the two new buttons
                } else {
                    $("#val-error" + pet_id + item_id).text('Oops, something went wrong.');
                }
            },
            complete: function (data) {
                // $(".ajax-loader").hide();
            },
            error: function (response) {
                if (response.error) {
                    $("#val-error" + pet_id + item_id).text('Fail.');
                    // location.reload();
                } else {
                    $("#val-error" + pet_id + item_id).text('Uh oh, something went wrong.');
                }
            }
        });
    }

</script>
