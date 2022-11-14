@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.profile-nav')

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card pb-5">


            <div class="row m-2 my-3" style="height: 100%; justify-content: space-evenly">
                @foreach($breed_instances as $breed_instance)
                    <div class="col-md-5 col-sm-10 store-card">

                        <a href="{{route('get-breeding-pair', ['id' => $breed_instance->id])}}">
                            <div class="row m-5" style="background-color: white; border-radius: 10px">

                                <div class="col-5 m-auto">
                                    <h2 style="color: #ad084d; text-align: center">{{ $breed_instance->daddy->name }}</h2>
                                    <div class="pair-pink mb-3">
                                        <div class="pair-parent">
                                            <img class="pair-child"
                                                 src="{{ Storage::disk('s3')->url("images/creatures/" . $breed_instance->daddy->species . "/" . $breed_instance->daddy->dev_stage . "/" . $breed_instance->daddy->element . ".png" )}}"
                                                 alt="{{ $breed_instance->daddy->name }} Image">
                                        </div>
                                    </div>
                                </div>
                                <i class="fa-solid fa-plus my-auto mx-2"
                                   style="font-size: 50px; color: #840e8d; text-decoration: none"></i>
                                <div class="col-5 m-auto">
                                    <h2 style="color: #ad084d; text-align: center">{{ $breed_instance->mommy->name }}</h2>
                                    <div class="pair-pink mb-3">
                                        <div class="pair-parent">
                                            <img class="pair-child"
                                                 src="{{ Storage::disk('s3')->url("images/creatures/" . $breed_instance->mommy->species . "/" . $breed_instance->mommy->dev_stage . "/" . $breed_instance->mommy->element . ".png" )}}"
                                                 alt="{{ $breed_instance->mommy->name }} Image">
                                        </div>
                                    </div>
                                </div>

                                <div class="animated-progress progress-green mt-3 mb-4 mx-5"
                                     id="progess-meter-bar-{{$breed_instance->daddy->id}}">
                                    <span style="width: {{$breed_instance->progress}}%"></span>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
            <div class="row">
                    <a style="display: inline-flex; align-items: center; justify-content: center;" href="{{route('my-creatures')}}"
                       type="button" class="btn btn-primary w-100 large-sell-btn my-2">Breed another pair</a>
                <a style="display: inline-flex; align-items: center; justify-content: center;" href="{{route('my-incubators')}}"
                   type="button" class="btn btn-primary w-100 large-incubate-btn my-2">View Incubators</a>
            </div>
        </div>

    </div>

    </div>

    </div>

@endsection

