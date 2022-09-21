@extends('layout.master')
@section('title')
    Food Stuffs
@endsection
@section('content')
    @include('partials.store-nav')

    <div>
        <div class="container store-body text-center pt-4">
            <div class="row justify-content-center align-items-center m-auto">
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
                                <img class="card-img-top" src="{{ Storage::disk('public')->url($food->image) }}"
                                     alt="{{ $food->name }} Image">
                            </div>
                            <div class="card-body pb-2 {{ $food->mainStat }}">
                                <h2 class="card-title" style="font-size: larger">{{ $food->name }}</h2>
                                <p class="card-text">{{ $food->description }}</p>
                            </div>
                            @if(Auth::check())
                            <?PHP $user = Auth::user(); ?>
                                @if($user->isAdmin())
                                    <div class="row m-auto pb-2">
                                        <a href="{{route('update-food', ['id' => $food->id])}}"
                                           class="btn ombre-btn mb-1">Edit</a>
                                        <form action="{{ route('delete-food', ['id' => $food->id]) }}" method="POST">
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
                            @else
                                <a href="#" class="btn btn-primary purchase-btn">Purchase</a>
                            @endif
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row m-auto">
                {{ $foods->links() }}
            </div>
        </div>

    </div>
@endsection
