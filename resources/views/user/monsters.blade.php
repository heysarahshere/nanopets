@extends('layout.master')
@section('title')
    @unless(Auth::check())
        {{Auth::user()->username}}'s Creatures
    @endunless
@endsection
@section('content')

    <div class="home">
        <h1>{{Auth::user()->username}}'s Creatures</h1>
    </div>
    <div class="container-monsters" style="padding-bottom: 20%; align-content: space-evenly;">
        <div class="row">
            @foreach($pets as $pet)
                <div class="col-lg-6 col-sm-10">
                    <div class="card store-card py-0" style="border-radius: 15px; width: 98%;">
                        <div class="row">
                            <div class="col-6 {{ $pet->element }}-ombre-btn my-3 mr-0">
                                <div class="">
                                    <div class="row justify-content-center align-items-center mt-auto pt-2">
                                        <i class="fa-solid fa-khanda pr-2 pb-2" style="font-size: 30px;"></i>
                                        <h2 class="text-center" style="color: black">
                                            {{Str::limit($pet->name, 12)}}
                                        </h2>
                                    </div>
                                </div>
                                <div class="store-img-container mb-3">
                                    <div class="monster-parent col-12">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/parts/tails/" . $pet->tail_image) }}"
                                             alt="{{ $pet->name }} Image">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/parts/wings/" . $pet->wing_image) }}"
                                             alt="{{ $pet->name }} Image">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/parts/head/" . $pet->head_image) }}"
                                             alt="{{ $pet->name }} Image">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/" . $pet->species . "/color/" . $pet->color_image) }}"
                                             alt="{{ $pet->name }} Image">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/" . $pet->species . "/eyes/" . $pet->eye_image) }}"
                                             alt="{{ $pet->name }} Image">
                                        <img class="monster-child"
                                             src="{{ asset("/images/creatures/" . $pet->species . "/lines.png") }}"
                                             alt="{{ $pet->name }} Image">
                                    </div>
                                </div>
                                <div class="p-3 pt-5 text-center" >
{{--                                    <h1  style="font-size: larger">{{ $pet->name }}</h1>--}}
                                    <h1 style="font-size: xx-large; color: black">ADULT</h1>
                                    <h1  style="font-size:  xx-large; color: black">CARNIVORE</h1>
                                </div>

                            </div>
                            <div class="col-5">
                                <div class="col-12 monster-slider">
                                    <h2 class="pt-4">HEALTH</h2>
                                    <div class="meter">
                                        <span style="width: 25%"></span>
                                    </div>
                                </div>
                                <div class="col-12 monster-slider">
                                    <h2 class="pt-4">HUNGER</h2>
                                    <div class="meter">
                                        <span style="width: 25%"></span>
                                    </div>
                                </div>
                                <div class="col-12 monster-slider">
                                    <h2 class="pt-4">EXHAUSTION</h2>
                                    <div class="meter">
                                        <span style="width: 25%"></span>
                                    </div>
                                </div>

                            </div>

                                {{--  send user id to this page to match it to the auth user  --}}
                                @if(Auth::check())
                                    <?PHP $user = Auth::user(); ?>
                                    @if($user->isAdmin())
                                        {{--                                <div class="row m-auto pb-2">--}}
                                        {{--                                    <a href="{{route('update-food', ['id' => $food->id])}}"--}}
                                        {{--                                       class="btn ombre-btn mb-1">Edit</a>--}}
                                        {{--                                    <form action="{{ route('delete-food', ['id' => $food->id]) }}" method="POST">--}}
                                        {{--                                        <td class="right">--}}
                                        {{--                                            <input type="hidden" value="{{$food->id}}">--}}
                                        {{--                                            <button type="submit"--}}
                                        {{--                                                    onclick="return confirm('Are you sure you want to delete this food?')"--}}
                                        {{--                                                    class="mb-1 btn rev-ombre-btn">Delete--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        @csrf--}}
                                        {{--                                    </form>--}}
                                        {{--                                </div>--}}
                                    @endif
                                @else
                                @endif
                                <a href="#" class="btn btn-primary actions-btn w-100 mb-3">Actions</a>

                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    </div>

@endsection
