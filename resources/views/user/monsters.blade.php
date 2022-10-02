@extends('layout.master')
@section('title')
    @unless(Auth::check())
        {{Auth::user()->username}}
    @endunless
@endsection
@section('content')
    @include('partials.banner-message')
    @include('partials.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
            @foreach($pets as $pet)
                <div class="col-lg-6 col-sm-10 monster-card-front mb-5">
                @include('partials.monster-card-front')
                @include('partials.monster-card-back')
                @include('partials.monster-card-feed')
                @include('partials.monster-card-breed')
                @include('partials.monster-card-sell')
                </div>
            @endforeach
        </div>
        <button class="btn btn-danger w-100 mt-4 large-breed-btn">BREED ></button>
    </div>


@endsection

<script>

    function switchMonsterCardFace(id) {
        let front = document.getElementById("front-" + id);
        let back = document.getElementById("back-" + id);
        front.classList.toggle('hiddenFace');
        back.classList.toggle('hiddenFace');
    }

    function toggleMonsterCardFaceFeed(id) {
        let back = document.getElementById("back-" + id);
        let feed = document.getElementById("feed-" + id);
        if (back.classList.contains('hiddenFace')) {
            feed.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            feed.classList.remove('hiddenFace');
        }
    }

    function toggleMonsterCardFaceBreed(id) {
        let back = document.getElementById("back-" + id);
        let breed = document.getElementById("breed-" + id);
        if (back.classList.contains('hiddenFace')) {
            breed.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            breed.classList.remove('hiddenFace');
        }
    }

    function toggleMonsterCardFaceSell(id) {
        let back = document.getElementById("back-" + id);
        let sell = document.getElementById("sell-" + id);
        if (back.classList.contains('hiddenFace')) {
            sell.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            sell.classList.remove('hiddenFace');
        }
    }

</script>
