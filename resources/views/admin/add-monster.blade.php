@extends('layout.master')
@section('title')
    Add Food
@endsection
@section('content')

    <div class="container py-4">
        <form method="POST" action="{{route('add-food-post')}}" enctype="multipart/form-data">
            <h1 class="text-center pb-5">Add Food</h1>

            <div class="row">

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
                            <label class="custom-file-label" for="image1">Choose image...</label>
                        </div>
                    </div>
                </div>
                {{-- end image uploader --}}
                {{-- details --}}

                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name"
                               aria-describedby="name"
                               placeholder="food name">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-control form-control" id="type" name="type">
                                <option selected disabled value="">food type</option>
                                <option value="food">solid</option>
                                <option value="potion">liquid</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control form-control" id="mainStat" name="mainStat">
                                <option selected disabled value="">main stat</option>
                                <option>health</option>
                                <option>hunger</option>
                                <option>magic</option>
                                <option>stamina</option>
                                <option>strength</option>
                                <option>defense</option>
                                <option>mojo</option>
                            </select>
                        </div>
                    </div>


                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="levelInput" name="levelInput" min="0" max="50"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="levelInputLevel" name="levelInputLevel" for="levelInput"></output>
                    </div>

                    <h2>Health:</h2>
                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="healthInput" name="healthInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="healthInputLevel" name="healthInputLevel" for="healthInput"></output>
                    </div>

                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="magicInput" name="magicInput" min="0" max="5" value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="magicInputLevel" name="magicInputLevel" for="magicInput"></output>
                    </div>

                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="strengthInput" name="strengthInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="strengthInputLevel" name="strengthInputLevel" for="strengthInput"></output>
                    </div>
                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="staminaInput" name="staminaInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="staminaInputLevel" name="staminaInputLevel" for="staminaInput"></output>
                    </div>
                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="defenseInput" name="defenseInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="defenseInputLevel" name="defenseInputLevel" for="defenseInput"></output>
                    </div>
                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="hungerInput" name="hungerInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="hungerInputLevel" name="hungerInputLevel" for="hungerInput"></output>
                    </div>
                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="mojoInput" name="mojoInput" min="0" max="5"
                               value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="mojoInputLevel" name="mojoInputLevel" for="mojoInput"></output>
                    </div>


                    <div class="col-md-6">
                        <select class="form-control form-control" id="breedableStat" name="breedableStat">
                            <option selected disabled value="">Dominant trait (to be passed down)</option>
                            <option>health</option>
                            <option>hunger</option>
                            <option>magic</option>
                            <option>stamina</option>
                            <option>strength</option>
                            <option>defense</option>
                            <option>mojo</option>
                        </select>
                    </div>

                    <div class="slidecontainer mt-1">
                        <input class="slider" type="range" id="statChanceInput" name="statChanceInput" min="0" max="5" value="0"
                               oninput="setStatLevel(this.value, this.id)">
                        <output id="statChanceInputLevel" name="statChanceInputLevel" for="statChanceInput"></output>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-9">
                            <input class="form-control form-control-lg"
                                   id="cost"
                                   type="text"
                                   name="cost"
                                   placeholder="price"
                                   value="{{ old('cost') }}">
                        </div>
                    </div>
                    <p class="ml-1">Description:</p>
                    <div class="row m-1 mb-3">
                        <textarea class="form-control" id="description" name="description"
                                  placeholder="Tastes like chicken!"
                                  value="{{ old('description') }}"></textarea>
                    </div>
                    <h2>Effects</h2>
                    <hr>
                </div>
                {{-- end details --}}

            </div>

            <div class="form-group pt-3 m-auto text-center">
                <button type="submit" class="btn btn-light btn-lg ombre-btn">Post Pet</button>
                <button type="reset" class="btn btn-light rev-ombre-btn">
                    <a href="{{route('add-food')}}" style="font-family: Funhouse">Clear</a>
                </button>
            </div>
            {{ csrf_field() }}
        </form>

    </div>
    <script type="text/javascript">
        function setLevelLimit(level) {
            var health = document.getElementById("healthInput");
            var magic = document.getElementById("magicInput");
            var strength = document.getElementById("strengthInput");

            var healthLevel = document.getElementById("healthInputLevel");
            var magicLevel = document.getElementById("magicInputLevel");
            var strengthLevel = document.getElementById("strengthInputLevel");

            if (level < 10) {
                health.max = 500;
                magic.max = 500;
                strength.max = 500;
            } else if (level < 20) {
                health.max = 1200;
                magic.max = 1200;
                strength.max = 1200;
            } else if (level < 30) {
                health.max = 1800;
                magic.max = 1800;
                strength.max = 1800;
            } else if (level < 40) {
                health.max = 2400;
                magic.max = 2400;
                strength.max = 2400;
            } else if (level <= 50) {
                health.max = 3000;
                magic.max = 3000;
                strength.max = 3000;
            }

            // set text/slider values back to 0
            health.value = 0;
            magic.value = 0;
            strength.value = 0;
            healthLevel.value = 0;
            magicLevel.value = 0;
            strengthLevel.value = 0;

        }
        function setStatLevel(value, id) {
            document.getElementById(id + "Level").value = value;
            if (id === "levelInput") {
                setLevelLimit(value);
            }
        }

        // image preview script
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("image1").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });

        // uploader visibility script
        function showUploader(checkBoxId) {
            if (checkBoxId === 1) {
                var checkBox = document.getElementById("add_image");
                var upload = document.getElementById("upload");
                if (checkBox.checked === true) {
                    upload.style.display = "block";
                } else {
                    upload.style.display = "none";
                }
            }
        }
    </script>

@endsection
