@extends('layout.master')
@section('title')
    Featured
@endsection
@section('content')
    @include('partials.navigation.store-nav')

    <div class="container-monsters my-5 store-featured">
        <div class="container-monsters featured-jumbo p-5 mb-5">
            <div class="row justify-content-around">
                <div class="col-8 featured-burger p-4 store-card">
                    <div class="row">
                        <div class="col-7">
                            <h1 style="color: #DB0F00">Special Offer</h1>
                            <h2>Big, juicy burger!</h2>
                            <p>Meat type undisclosed, guaranteed to boost the stamina and hunger of any carnivore - buy
                                one, get one free!
                            </p>
                            <p>Please buy it. It's starting to smell.</p>
                            <div class="row align-items-baseline mt-5 ml-3">
                                <button class="btn rev-ombre-btn">PURCHASE</button>
                                <button class="btn ombre-btn">DETAILS</button>
                            </div>
                        </div>
                        <div class="col-5" style="height: 90%">
                            <img class="card-img-top" style="width: 100%"
                                 src="{{ asset('/images/foods/burger.png') }}"
                                 alt="Burger Image">
                        </div>
                    </div>
                </div>
                <div class="col-3 featured-egg store-card">
                    <div class="row justify-content-around m-auto">
                        <div class="col-12 p-2 pt-4 m-auto text-center">
                            <h1 style="position: absolute; left: 10%; top: 10%; color: #0099da">NEW!</h1>
                            <img class="card-img-top p-1"
                                 src="{{ asset('/images/eggs/mystic.png') }}"
                                 alt="Burger Image" style="width: 100%">
                            <p style="color: #0099da"><span style="font-weight: bold">Aerie Egg:</span> Contains any
                                species of Air elemental</p>
                            <button class="btn rev-ombre-btn" style="background-color: #00b7d2;">DETAILS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    potions button    --}}
        <div class="potion-container-button my-5" data-toggle="collapse" href="#multiCollapsePotions"
             role="button" aria-expanded="false" aria-controls="multiCollapsePotions">
            <h1 class="text-center" style="color: #3d0260;">POTIONS</h1>
            <h1 class="text-center" style="color: #3d0260;">& BREWS</h1>
        </div>
        {{--    end potions button    --}}
        {{--    potion card row    --}}
        <div class="row justify-content-center align-items-center m-auto collapse multi-collapse"
             id="multiCollapsePotions">
            @foreach($potions as $potion)
                <div class="col-lg-3 col-sm-4 pb-5">
                    <div class="card store-card" style="width: 100%;">
                        <div class="{{ $potion->mainStat }}-ombre-btn">
                            <div class="row justify-content-center align-items-center mt-auto pt-2">
                                <i class="fa-solid fa-coins pr-2 pb-2" style="font-size: 30px"></i>
                                <h2 class="text-center">
                                    {{ $potion->cost }}
                                </h2>
                            </div>
                        </div>
                        <div class="store-img-container">
                            <img class="card-img-top" style="display: block; margin: auto" src="{{ Storage::disk('s3')->url($potion->image) }}"
                                 alt="{{ $potion->name }} Image">
                        </div>
                        <form id="purchaseFood" name="purchaseFood" method="POST"
                              action="{{route('purchase-food')}}">
                            <div class="{{ $potion->mainStat }}">

                                <div class="card-body pb-0">
                                    <h2 class="card-title" style="font-size: larger">{{ $potion->name }}</h2>
                                    <p class="card-text">{{ $potion->description }}</p>
                                </div>
                                <div class="row justify-content-center">
                                    <i class="fa-solid fa-circle-minus left-span"
                                       onclick="incInput('-', {{$potion->id}})"></i>
                                    <div style="width: 65px"><h2 class="text-center mt-auto mb-3"
                                                                 style="font-size: xx-large"
                                                                 id="qtyLabel{{$potion->id}}">1</h2></div>
                                    <i class="fa-solid fa-circle-plus right-span"
                                       onclick="incInput('+', {{$potion->id}})"></i>
                                </div>
                                <input type="hidden" value="1" id="qty{{$potion->id}}" name="qty">
                                <input type="hidden" value="{{$potion->id}}" id="food_id" name="food_id">
                            </div>
                            <button type="submit" class="btn purchase-btn" style="width: 90%">Purchase</button>
                            {{ csrf_field() }}
                        </form>
                        @if(Auth::check())
                            <?PHP $user = Auth::user(); ?>
                            @if($user->isAdmin())
                                <div class="row m-auto pb-2">
                                    <a href="{{route('update-potion', ['id' => $potion->id])}}"
                                       class="btn ombre-btn mb-1">Edit</a>
                                    <form id="deleteFood" action="{{ route('delete-potion', ['id' => $potion->id]) }}"
                                          method="POST">
                                        <td class="right">
                                            <input type="hidden" value="{{$potion->id}}">
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this food?')"
                                                    class="mb-1 btn rev-ombre-btn">Delete
                                            </button>
                                        </td>
                                        @csrf
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

            @endforeach
            <div class="col-12">
                <a href="{{route('potions')}}" class="btn btn-lg btn-primary purchase-btn" style="display: block; margin: auto">View More Potions</a>
            </div>
        </div>
        {{-- end potion card row --}}
        {{--    eggs button    --}}
        <div class="egg-container-button my-5" data-toggle="collapse" href="#multiCollapseEggs"
             role="button" aria-expanded="false" aria-controls="multiCollapseEggs">
            <h1 class="text-center" style="color: #071f7e;">CREATURE</h1>
            <h1 class="text-center" style="color: #071f7e;">EGGS</h1>
        </div>
        {{--    end eggs button    --}}
        {{--    eggs card row    --}}
        <div class="row justify-content-center align-items-center m-auto collapse multi-collapse"
             id="multiCollapseEggs">
            @foreach($eggs as $egg)
                <div class="col-lg-3 col-sm-4 pb-5">
                    <div class="card store-card" style="width: 100%;">
                        <div class="{{ $egg->element }}-ombre-btn">
                            <div class="row justify-content-center align-items-center mt-auto pt-2">
                                <i class="fa-solid fa-coins pr-2 pb-2" style="color: #ffc619;font-size: 30px"></i>
                                <h2 class="text-center">
                                    {{ $egg->cost }}
                                </h2>
                            </div>
                        </div>
                        <div class="store-img-container">
                            <img class="card-img-top" style="display: block; margin: auto"
                                 src="{{ Storage::disk('s3')->url("images/eggs/" . $egg->element . ".png") }}"
                                 alt="{{ $egg->name }} Image">
                        </div>
                        <div class="card-body pb-2 {{ $egg->element }}">
                            <h2 class="card-title">{{ $egg->name }}</h2>
                            <p class="card-text">{{ $egg->description }}</p>
                        </div>
                        @if(Auth::check())
                            <?php $user = Auth::user()?>
                            <form id="adoptCreature" name="adopt" method="POST" action="{{route('adopt-creature')}}"
                                  style="width: 90%; margin-right: 10%">
                                <button type="submit"
                                        class="btn btn-primary purchase-btn w-100" {{$user->balance >= $egg->cost ? '' : 'disabled'}}>
                                    Purchase
                                </button>
                                <input type="hidden" value="{{$egg->id}}" id="creature_id" name="creature_id">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
                {{--                    @include('partials.modals.egg-stat-modal')--}}
            @endforeach
            <div class="col-12">
                <a href="{{route('eggs')}}" class="btn btn-lg btn-primary purchase-btn" style="display: block; margin: auto">View More Eggs</a>
            </div>
        </div>
        {{--    end eggs card row    --}}
        {{--    foods button    --}}
        <div class="food-container-button my-5" data-toggle="collapse" href="#multiCollapseFoods"
             role="button" aria-expanded="false" aria-controls="multiCollapseFoods">
            <h1 class="text-center" style="color: #702800;">FOOD-</h1>
            <h1 class="text-center" style="color: #702800;">STUFFS</h1>
        </div>
        {{--    end foods button    --}}
        {{--    food card row    --}}
        <div class="row justify-content-center align-items-center m-auto collapse multi-collapse"
             id="multiCollapseFoods">
            @foreach($foods as $food)
                <div class="col-lg-3 col-sm-4 pb-5">
                    <div class="card store-card" style="width: 100%;">
                        <div class="{{ $food->mainStat }}-ombre-btn">
                            <div class="row justify-content-center align-items-center mt-auto pt-2">
                                <i class="fa-solid fa-coins pr-2 pb-2" style="font-size: 30px"></i>
                                <h2 class="text-center">
                                    {{ $food->cost }}
                                </h2>
                            </div>
                        </div>
                        <div class="store-img-container">
                            <img class="card-img-top" style="display: block; margin: auto" src="{{ Storage::disk('s3')->url($food->image) }}"
                                 alt="{{ $food->name }} Image">
                        </div>
                        <form id="purchaseFood" name="purchaseFood" method="POST"
                              action="{{route('purchase-food')}}">
                            <div class="{{ $food->mainStat }}">

                                <div class="card-body pb-0">
                                    <h2 class="card-title" style="font-size: larger">{{ $food->name }}</h2>
                                    <p class="card-text">{{ $food->description }}</p>
                                </div>
                                <div class="row justify-content-center">
                                    <i class="fa-solid fa-circle-minus left-span"
                                       onclick="incInput('-', {{$food->id}})"></i>
                                    <div style="width: 65px"><h2 class="text-center mt-auto mb-3"
                                                                 style="font-size: xx-large"
                                                                 id="qtyLabel{{$food->id}}">1</h2></div>
                                    <i class="fa-solid fa-circle-plus right-span"
                                       onclick="incInput('+', {{$food->id}})"></i>
                                </div>
                                <input type="hidden" value="1" id="qty{{$food->id}}" name="qty">
                                <input type="hidden" value="{{$food->id}}" id="food_id" name="food_id">
                            </div>
                            <button type="submit" class="btn purchase-btn" style="width: 90%">Purchase</button>
                            {{ csrf_field() }}
                        </form>
                        @if(Auth::check())
                            <?PHP $user = Auth::user(); ?>
                            @if($user->isAdmin())
                                <div class="row m-auto pb-2">
                                    <a href="{{route('update-food', ['id' => $food->id])}}"
                                       class="btn ombre-btn mb-1">Edit</a>
                                    <form id="deleteFood" action="{{ route('delete-food', ['id' => $food->id]) }}"
                                          method="POST">
                                        <td class="right">
                                            <input type="hidden" value="{{$food->id}}">
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this food?')"
                                                    class="mb-1 btn rev-ombre-btn">Delete
                                            </button>
                                        </td>
                                        @csrf
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                <a href="{{route('foods')}}" class="btn btn-lg btn-primary purchase-btn" style="display: block; margin: auto">View More Food</a>
            </div>
        </div>
        {{--    end food card row    --}}
    </div>

@endsection
