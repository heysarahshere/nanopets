@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
                <div class="col-lg-6 col-sm-10 monster-card-front mb-5">
                    <h2>{{$primary->name}}</h2>
                </div>
                <div class="col-lg-6 col-sm-10 monster-card-front mb-5">
                    <h2>{{$secondary->name}}</h2>
                </div>
        </div>
        <button class="btn btn-danger w-100 mt-4 large-breed-btn">BREED</button>
    </div>

@endsection
