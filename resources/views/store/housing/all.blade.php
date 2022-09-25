@extends('layout.master')
@section('title')
    Housing Items
@endsection
@section('content')
    @include('partials.store-nav')

    <div>
        <div class="container store-body text-center pt-4">
            <div class="row justify-content-center align-items-center m-auto">
                @foreach($items as $item)
                    <div class="col-lg-3 col-sm-4 pb-5">
                        <div class="card store-card" style="width: 100%;">
                            <div class="fire-ombre-btn">
                                <div class="row justify-content-center align-items-center mt-auto pt-2">
                                    <i class="fa-solid fa-coins pr-2 pb-2" style="font-size: 30px"></i>
                                    <h2 class="text-center">
                                        {{ $item->cost }}
                                    </h2>
                                </div>
                            </div>
                            <div class="store-img-container">
                                <img class="card-img-top" src="{{ Storage::disk('s3')->url($item->image) }}"
                                     alt="{{ $item->name }} Image">
                            </div>
                            <div class="card-body pb-2 fire">
                                <h2 class="card-title" style="font-size: larger">{{ $item->name }}</h2>
                                <p class="card-text">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row m-auto">
                {{ $items->links() }}
            </div>
        </div>

    </div>
@endsection
