@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card pb-5">


            <div class="row m-2 my-3" style="height: 100%">
                @foreach($breed_instances as $breed_instance)
                    <div class="col-5">
                        <div class="row m-5" style="background-color: white; border-radius: 10px">

                            <div class="col-5">
                                <h2 style="color: #ad084d; text-align: center">{{ $creature->name }}</h2>
                                <div class="pair-pink mb-3">
                                    <div class="pair-parent">
                                        <img class="pair-child"
                                             src="{{ Storage::disk('s3')->url("images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png" )}}"
                                             alt="{{ $creature->name }} Image">
                                    </div>
                                </div>
                            </div>
                            <i class="fa-solid fa-plus my-auto mx-2" style="font-size: 50px; color: #840e8d"></i>
                            <div class="col-5">
                                <h2 style="color: #ad084d; text-align: center">{{ $creature->partner->name }}</h2>
                                <div class="pair-pink mb-3">
                                    <div class="pair-parent">
                                        <img class="pair-child"
                                             src="{{ Storage::disk('s3')->url("images/creatures/" . $creature->partner->species . "/" . $creature->partner->dev_stage . "/" . $creature->partner->element . ".png" )}}"
                                             alt="{{ $creature->partner->name }} Image">
                                    </div>
                                </div>
                            </div>

                            <div class="animated-progress progress-green mt-3 mb-4 mx-5" id="progess-meter-bar-{{$creature->id}}">
                                <span style="width: 15%"></span>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{route('my-creatures')}}" class="btn ombre-btn w-100 m-4">Breed another pair</a>
                </div>
                <div class="col-6">
                    <button href="{{route('my-incubators')}}" class="btn rev-ombre-btn w-100 m-4 ">View Incubators
                    </button>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>

@endsection

