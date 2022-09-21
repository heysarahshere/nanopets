@extends('layout.master')
@section('title')
    Update Food
@endsection
@section('content')

    <div class="store-banner mt-5"><h2>Update Food</h2></div>
    <div class="container py-4">
        <form method="POST" action="{{route('post-update-food', ['id' => $food->id])}}" enctype="multipart/form-data">

            <div class="row">

                {{-- details --}}
                <div class="col-6">

                    <h2 class="ml-3">Food Name:</h2>
                    <div class="form-group">
                        <input class="form-control form-control-lg"
                               id="name"
                               type="text"
                               name="name"
                               placeholder="food name"
                               value="{{ $food->name }}">
                    </div>

                    <h2 class="ml-3">Price:</h2>
                    <div class="form-row">
                        <input class="form-control form-control-lg"
                               id="cost"
                               type="number"
                               name="cost"
                               placeholder="price"
                               min="0.01" step="0.01" max="999999"
                               value="{{ $food->cost }}">
                    </div>
                    <h2 class="ml-3 my-3">Description:</h2>
                    <div class="form-row mb-4">
                        <textarea class="form-control form-control-lg" id="description" name="description"
                                  placeholder="Tastes like chicken!"
                                  value="{{ $food->description }}">{{ $food->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control form-control" id="type" name="type">
                                <option selected disabled value="">{{ $food->type }}</option>
                                <option value="food">solid</option>
                                <option value="potion">liquid</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-control" id="mainStat" name="mainStat"
                                    onchange="enableSlider(this.value)">
                                <option selected disabled value="{{ $food->mainStat }}">{{ $food->mainStat }}</option>
                                <option>health</option>
                                <option>hunger</option>
                                <option>magic</option>
                                <option>stamina</option>
                                <option>strength</option>
                                <option>defense</option>
                                <option>mojo</option>
                                <option value="statChance">stat chance increase</option>
                            </select>
                        </div>
                    </div>
                    {{-- sliders --}}
                    <p class="my-5 text-center">
                        <a class="btn btn-lg ombre-btn" data-toggle="collapse" href="#collapseSliders" role="button"
                           aria-expanded="false" aria-controls="collapseSliders">Toggle Effect Amounts</a>
                    </p>
                    <div class="collapse multi-collapse" id="collapseSliders">
                        <div class="row ml-3">
                            <h2>Health:</h2>
                            <output id="healthInputLevel" name="healthInputLevel" for="healthInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="healthInput" name="healthInput" min="0" max="5000"
                                   value="{{ $food->health }}"
                                   oninput="setStatLevel(this.value, this.id)">
                        </div>
                        <div class="row ml-3">
                            <h2>Magic:</h2>
                            <output id="magicInputLevel" name="magicInputLevel" for="magicInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="magicInput" name="magicInput" min="-500" max="1000"
                                   value="{{ $food->magic }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="magicInputLevel" name="magicInputLevel" for="magicInput"></output>
                        </div>

                        <div class="row ml-3">
                            <h2>Strength:</h2>
                            <output id="strengthInputLevel" name="strengthInputLevel" for="strengthInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="strengthInput" name="strengthInput" min="-500" max="1000"
                                   value="{{ $food->strength }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="strengthInputLevel" name="strengthInputLevel" for="strengthInput"></output>
                        </div>

                        <div class="row ml-3">
                            <h2>Stamina:</h2>
                            <output id="staminaInputLevel" name="staminaInputLevel" for="staminaInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="staminaInput" name="staminaInput" min="-500" max="1000"
                                   value="{{ $food->stamina }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="staminaInputLevel" name="staminaInputLevel" for="staminaInput"></output>
                        </div>
                        <div class="row ml-3">
                            <h2>Defense:</h2>
                            <output id="defenseInputLevel" name="defenseInputLevel" for="defenseInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="defenseInput" name="defenseInput" min="-500" max="1000"
                                   value="{{ $food->defense }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="defenseInputLevel" name="defenseInputLevel" for="defenseInput"></output>
                        </div>
                        <div class="row ml-3">
                            <h2>Hunger:</h2>
                            <output id="hungerInputLevel" name="hungerInputLevel" for="hungerInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="hungerInput" name="hungerInput" min="-500" max="1000"
                                   value="{{ $food->hunger }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="hungerInputLevel" name="hungerInputLevel" for="hungerInput"></output>
                        </div>
                        <div class="row ml-3">
                            <h2>Mojo:</h2>
                            <output id="mojoInputLevel" name="mojoInputLevel" for="mojoInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="mojoInput" name="mojoInput" min="-500" max="1000"
                                   value="{{ $food->mojo }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="mojoInputLevel" name="mojoInputLevel" for="mojoInput"></output>
                        </div>

                        <div class="row ml-3">
                            <h2>Stat Chance Increase:</h2>
                            <output id="statChanceInputLevel" name="statChanceInputLevel" for="statChanceInput"></output>
                        </div>
                        <div class="slidecontainer mt-1">
                            <input class="slider" type="range" id="statChanceInput" name="statChanceInput" min="-500" max="1000"
                                   value="{{ $food->breedingStatChance }}"
                                   oninput="setStatLevel(this.value, this.id)">
                            <output id="statChanceInputLevel" name="statChanceInputLevel" for="statChanceInput"></output>
                        </div>

                    </div>

                    {{-- end sliders --}}
                    {{-- if stat chance increase, which stat? --}}

                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-light btn-lg ombre-btn">Create Food</button>
                        <button type="reset" class="btn btn-light rev-ombre-btn">
                            <a href="{{route('add-food')}}" style="font-family: Funhouse">Clear</a>
                        </button>
                    </div>

                </div>
                {{-- end details --}}
                {{-- image uploader --}}
                <div class="col-6">

                    <div class="" style="justify-content: center; margin: 0 auto;">
                        <img style="width: 100%" id="output"
                             src="{{ Storage::disk('s3')->url('images/foods/food-default.png') }}">
                    </div>
                    <div class="card-body">
                        <div style="display: block" id="upload" class="custom-file col-md-12 col-lg-12 pb-2">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*"
                                   onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <label class="custom-file-label" for="image">Choose image...</label>
                        </div>
                    </div>
                </div>
                {{-- end image uploader --}}

            </div>

            {{ csrf_field() }}
        </form>

    </div>
    <script type="text/javascript">


        document.addEventListener("load", function(){

            // //Get select object
            // var objSelect = document.getElementById("mainStat");
            // setSelectedValue(objSelect, );
            //
            // function setSelectedValue(selectObj, valueToSet) {
            //     for (var i = 0; i < selectObj.options.length; i++) {
            //         if (selectObj.options[i].text== valueToSet) {
            //             selectObj.options[i].selected = true;
            //             return;
            //         }
            //     }
            // }

            document.getElementById("healthInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("magicInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("strengthInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("staminaInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("defenseInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("hungerInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("mojoInputLevel").value = document.getElementById("healthInput").value;
            document.getElementById("statChanceInputLevel").value = document.getElementById("healthInput").value;
        });
        function enableSlider(name) {
            [
                'health',
                'magic',
                'strength',
                'stamina',
                'defense',
                'hunger',
                'mojo',
                'statChance'
            ].forEach(slider => {
                document.getElementById(slider + "Input").value = "0";
                document.getElementById(slider + "InputLevel").value = "";

                if (slider = name) {
                    document.getElementById(slider + "Input").value = 500; // default value
                    setStatLevel(500, document.getElementById(slider + "Input").id);
                }
            });
        }

        function setStatLevel(value, id) {
            document.getElementById(id + "Level").value = value;
        }

        // image preview script
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("image").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

    </script>

@endsection

