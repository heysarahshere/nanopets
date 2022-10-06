@extends('layout.master')
@section('title')
    Eggs
@endsection
@section('content')
    @include('partials.store-nav')
    <div>
        <div class="container store-body text-center pt-4">

            <div class="row justify-content-center align-items-center m-auto">
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
                                <img class="card-img-top"
                                     style="width: 100%; height: auto; position:absolute; left: 0%; top: 10%"
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
                                        <button type="submit" class="btn btn-primary purchase-btn w-100" {{$user->balance >= $egg->cost ? '' : 'disabled'}}>Purchase</button>
                                        <input type="hidden" value="{{$egg->id}}" id="creature_id" name="creature_id">
                                        {{ csrf_field() }}
                                    </form>
                            @endif
                        </div>
                    </div>
{{--                    @include('partials.modals.egg-stat-modal')--}}
                @endforeach
                <div class="container">
                    <div class="row m-auto">
                        {{ $eggs->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
