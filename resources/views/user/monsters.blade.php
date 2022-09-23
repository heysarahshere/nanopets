@extends('layout.master')
@section('title')
        {{$owner->username}}'s Creatures
@endsection
@section('content')
    @include('partials.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
            @foreach($pets as $pet)
                <div class="col-lg-6 col-sm-10 monster-card-front">
                @include('partials.monster-card-front')
                @include('partials.monster-card-back')
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

</script>
