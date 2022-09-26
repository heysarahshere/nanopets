@extends('layout.master')
@section('title')
    @unless(Auth::check())
        {{Auth::user()->username}}
    @endunless
@endsection
@section('content')

    <div class="home">
    </div>
    <div class="container" style="padding-bottom: 20%;">
        <div class="row">
{{--            @foreach($pets as $pet)--}}

{{--            @endforeach--}}
        </div>
    </div>

@endsection
