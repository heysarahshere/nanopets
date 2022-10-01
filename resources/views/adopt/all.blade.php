@extends('layout.master')
@section('title')
    Eggs
@endsection
@section('content')
    @include('partials.store-nav')
    <div>
        <div class="container store-body text-center pt-4">
            <div class="row justify-content-center align-items-center m-auto">
                @foreach($creatures as $creature)
                    <div class="col-4 pb-5">
                        <div class="card store-card" style="width: 100%;">
                            <div class="{{ $creature->element }}-ombre-btn">
                                <div class="row justify-content-center align-items-center mt-auto pt-2">
                                    <i class="fa-solid fa-coins pr-2 pb-2" style="color: #4d3c06;font-size: 30px"></i>
                                    <h2 class="text-center">
                                    </h2>
                                </div>
                            </div>
                            <div class="store-img-container">
                                <div class="reveal-stats">
                                    <button class="ombre-btn" data-toggle="modal" data-target="#adoptModal{{$creature->id}}">
                                        DETAILS
                                    </button>
                                </div>
                                <img class="card-img-top" style="width: 100%; height: auto;"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png" )}}"
                                     alt="{{ $creature->name }} Image">
                            </div>
                            <div class="card-body pb-2">
                                <h2 class="card-title">{{ $creature->name }}</h2>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                    @include('partials.adopt-stat-modal')
                @endforeach
            </div>
        </div>
    </div>

@endsection
