@extends('layout.master')
@section('title')
    Featured
@endsection
@section('content')
    @include('partials.store-nav')

    <div class="my-5">
        <div class="container featured-jumbo p-5 mb-5">
            <div class="row justify-content-around">
                <div class="col-8 featured-burger p-4 store-card">
                    <div class="row">
                        <div class="col-7">
                            <h1 style="color: #DB0F00">SPECIAL OFFER</h1>
                            <h2>Burger for sale! Just one.</h2>
                            <p>All about the burger here. All we know is that it has meat, the meat type was not
                                disclosed.
                                Please buy it. It's starting to smell. Boosts defense and strength.</p>
                            <div class="row align-items-baseline mt-5 ml-3">
                                <button class="btn rev-ombre-btn">PURCHASE</button>
                                <button class="btn ombre-btn">DETAILS</button>
                            </div>
                        </div>
                        <div class="col-5">
                            <img class="card-img-top" style="width: 100%"
                                 src="{{ asset('/images/foods/burger.png') }}"
                                 alt="Burger Image">
                        </div>
                    </div>
                </div>
                <div class="col-3 featured-egg store-card">
                    <div class="row justify-content-around m-auto">
                        <div class="col-12 p-2 pt-4 m-auto text-center">
                            <h1 style="position: absolute; left: 10%; top: 10%; color: #00b7d2">NEW!</h1>
                            <img class="card-img-top p-1"
                                 src="{{ asset('/images/eggs/mystic.png') }}"
                                 alt="Burger Image" style="width: 100%">
                            <p style="color: #00b7d2">Aerie Egg contains Platinum or better</p>
                            <button class="btn rev-ombre-btn" style="background-color: #00b7d2;">DETAILS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container potion-container-button mt-5 ">
            <h1 class="text-center" style="color: #3d0260;">POTIONS</h1>
            <h1 class="text-center" style="color: #3d0260;">& BREWS</h1>
        </div>

        <div class="container egg-container-button mt-5 ">
            <h1 class="text-center" style="color: #071f7e;">CREATURE</h1>
            <h1 class="text-center" style="color: #071f7e;">EGGS</h1>
        </div>

        <div class="container food-container-button mt-5 ">
            <h1 class="text-center" style="color: #702800;">FOOD-</h1>
            <h1 class="text-center" style="color: #702800;">STUFFS</h1>
        </div>

    </div>

@endsection
