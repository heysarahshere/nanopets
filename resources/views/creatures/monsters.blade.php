@extends('layout.master')
@section('title')
    {{Str::title($current)}}
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.profile-nav')

    <div class="container-monsters pt-5" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row justify-content-center">
            @if (count($pets) > 0)
                @foreach($pets as $pet)
                    <div class="col-lg-6 col-sm-10 monster-card-front mb-5">

                        @if ($pet->dev_stage != 'egg' && $pet->dev_stage != 'hatchling')
                            @include('partials.creature.monster-card-front')
                            @include('partials.creature.monster-card-back')
                            @include('partials.creature.monster-card-feed')
                            @include('partials.creature.monster-card-breed')
                            @include('partials.creature.monster-card-sell')
                        @else
                            @include('partials.creature.egg-card-front')
                            @include('partials.creature.monster-card-sell')
                        @endif
                    </div>
                @endforeach
                <button class="btn btn-danger w-100 mt-4 large-breed-btn">BREED ></button>
            @else
                <div class="text-center col-12">
                    <h2 style="font-family: Readzone; color: #ad084d">Looking a little empty over here...</h2>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('adoptable')}}" class="btn btn-lg btn-primary ombre-btn m-auto"
                               style="width: 90%">ADOPT A CREATURE</a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('eggs')}}" class="btn btn-lg btn-primary ombre-btn m-auto"
                               style="width: 90%">PURCHASE AN EGG</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
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

    function toggleMonsterCardFaceSell(id, origin) {
        // origin is optional
        var back = document.getElementById("back-" + id);
        if (origin === 'egg') {
            back = document.getElementById("front-" + id);
        }

        let sell = document.getElementById("sell-" + id);
        if (back.classList.contains('hiddenFace')) {
            sell.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            sell.classList.remove('hiddenFace');
        }
    }

    function changeName(id) {
        let label = document.getElementById("nameLabel" + id);
        let input = document.getElementById("nameInputDiv" + id);
        if (label.classList.contains('hiddenFace')) {
            input.classList.add('hiddenFace');
            label.classList.remove('hiddenFace');
        } else {
            label.classList.add('hiddenFace');
            input.classList.remove('hiddenFace');
        }
    }

    function submitNameChangeAjax(event, id) {
        event.preventDefault();
        let name = document.getElementById("nameInput" + id).value;
        if (name === '') {
            $("#val-error" + id).text('Please enter a name!');
        } else {
            jQuery.ajax({
                type: 'POST',
                url: "{{ route('name-change-ajax') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    id: id
                },
                beforeSend: function (xhr, type) {
                    $('#val-error' + id).hide();
                    $("#success-message" + id).hide();
                },
                success: function (response) {
                    if (response) {
                        // alert(data.success);
                        changeName(id);
                        $("#success-message" + id).text('Name changed!');
                        $("#nameLabel" + id).text(name);
                        // location.reload();
                    } else {
                        $("#val-error" + id).text('Oops, something went wrong.');
                    }
                },
                complete: function (data) {
                    // $(".ajax-loader").hide();
                },
                error: function (response) {
                    if (response.error) {
                        $("#val-error" + id).text('Fail.');
                        // location.reload();
                    } else {
                        $("#val-error" + id).text('Uh oh, something went wrong.');
                    }
                }
            });
        }
    }

</script>

