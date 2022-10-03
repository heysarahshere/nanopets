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

</script>
<script>
    function submitNameChangeAjax(event, id) {
        event.preventDefault();
        let name = document.getElementById("nameInput" + id).value;
        // name = $('#nameInput' + id).val();
        // id = $(this)
        // var id = $(this).attr('id');
        // $("#success-message").text(id + " " + name);
        // var formData = $('#ajaxNameChangeForm' + id).serialize();
        jQuery.ajax({
            type: 'POST',
            url: "{{ route('name-change-ajax') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                id: id
            },
            beforeSend: function(xhr, type) {
                // $('#val-error').hide();
                $("#success-message").text('');
            },
            success: function (response) {
                if (response) {
                    // alert(data.success);
                    $("#success-message").text('Succeed.');
                    location.reload();
                } else {
                    $("#success-message").text('Oops, something went wrong. Please try again later.');
                }
            },
            complete:function(data){
                // $(".ajax-loader").hide();
            },
            error: function (response) {
                if (response.error) {
                    // alert(data.success);
                    $("#success-message").text('Fail.');
                    location.reload();
                } else {
                    $("#success-message").text('Oops, something went wrong. Error bracket.');
                }
            }
        });

        // if (name === '') {
        //     $('#val-error').text('Please enter a valid name.');
        // } else {
        {{--    $.ajax({--}}
        {{--        url: "/name-change-ajax",--}}
        {{--        type: "post",--}}
        {{--        data: {--}}
        {{--            "_token": "{{ csrf_token() }}",--}}
        {{--            name: name,--}}
        {{--            id: id--}}
        {{--        },--}}
        {{--        beforeSend: function (xhr, type) {--}}
        {{--            $('#val-error').hide();--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            if (response) {--}}
        {{--                $('#name-change-form' + id)[0].reset();--}}
        {{--                $("#success-message").text(response.success);--}}
        {{--                // $("#success-message").text('success');--}}
        {{--                $("#nameLabel" + id).text(response.name);--}}
        {{--            }--}}
        {{--        },--}}
        {{--        complete: function (data) {--}}
        {{--            $("#nameInputDiv" + id).addClass('hiddenFace');--}}
        {{--            $("#nameLabel" + id).removeClass('hiddenFace');--}}
        {{--            $("#nameLabel" + id).text(data[0]);--}}
        {{--        },--}}
        {{--        error: function (data, textStatus, errorThrown) {--}}
        {{--            console.log(data);--}}
        {{--            $('#val-error').hide();--}}
        {{--            $("#success-message").text('Oops, something went wrong. Please try again later.');--}}
        {{--            // $(".ajax-loader").hide();--}}
        {{--        }--}}
        {{--    });--}}
        // }
    }

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function (key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }

</script>

