@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters  pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row monster-card breed-main">
            <div class="col-6 mt-5" style="height: 100%">
                <div class="col-12 blue-breed-gradient">
                    <div class="blue-progress-breed">
                        <span style="width: 2%" id="blue-span"></span>
                    </div>
                </div>
                <div class="col-6 mr-auto m-5">
                    <div class="store-img-container breed-blue mb-3">
                        <div class="breed-parent col-12">
                            <img class="breed-child"
                                 src="{{ Storage::disk('s3')->url("images/creatures/" . $primary->species . "/" . $primary->dev_stage . "/" . $primary->element . ".png" )}}"
                                 alt="{{ $primary->name }} Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5" style="height: 100%">
                <div class="col-12 pink-breed-gradient">
                    <div class="pink-progress-breed">
                        <span style="width: 2%; margin-left: auto !important;" id="pink-span"></span>
                    </div>
                </div>
                <div class="col-6 ml-auto m-5">
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
