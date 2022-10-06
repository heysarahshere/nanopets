@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters mt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="monster-card breed-main pb-5">
            <div class="row m-2 mb-3">
                @foreach($creatures as $creature)
                    <h2>{{$creature->name}}</h2>
                    <h2>{{$creature->partner->name}}</h2>
                @endforeach
            </div>

        </div>

    </div>

    </div>

    <a href="{{route('my-creatures')}}" class="btn btn-danger w-100 mt-4 large-breed-btn">Breed another pair</a>
    </div>

@endsection

