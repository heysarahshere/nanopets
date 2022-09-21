@extends('layout.master')
@section('title')
    About
@endsection
@section('content')

    <div class="about-heading">
        <div class="container">
            <div class="row justify-content-center align-items-center m-auto">
                <div class="col-7">
                    <h1>What the heck is nanopets?</h1>
                    <p>Learn all about the weird land of nanopets and all its inhabitants here.</p>
                </div>
                <div class="col-5 ml-auto">
                    <img class="about-featured-img" src="{{asset(('images/featured/monster_2c.png'))}}"/>
                </div>
            </div>
        </div>
    </div>
    <div class="about-body">
        <div class="container">
            <div class="row justify-content-center align-items-center m-auto">
                <div class="col-5 mr-auto">
                    <img class="about-featured-img" src="{{asset(('images/featured/monster_2c.png'))}}"/>
                </div>
                <div class="col-7">
                    <h1>Breed new creatures!</h1>
                    <p>Use potions to increase chances of
                        success and breed stronger creatures.
                        <br>
                        Bid with other players or collect
                        new species and create hybrids</p>
                </div>
            </div>
        </div>
    </div>

@endsection
