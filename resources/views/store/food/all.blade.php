@extends('layout.master')
@section('title')
    Food Stuffs
@endsection
@section('content')
    @include('partials.banner-message')
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
                                <img class="card-img-top" src="{{ Storage::disk('s3')->url($food->image) }}"
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
                                        <i class="fa-solid fa-circle-minus left-span" onclick="incInput('-', {{$food->id}})"></i>
                                        <div style="width: 65px"><h2 class="text-center mt-auto mb-3" style="font-size: xx-large"  id="qtyLabel{{$food->id}}">1</h2></div>
                                        <i class="fa-solid fa-circle-plus right-span" onclick="incInput('+', {{$food->id}})"></i>
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
            </div>
        </div>
        <div class="container">
            <div class="row m-auto">
                {{ $foods->links() }}
            </div>
        </div>

    </div>
@endsection

<script>
    function incInput(operator, id) {
        let qtyLabel = document.getElementById("qtyLabel" + id);
        let qtyInput = document.getElementById("qty" + id);
        let qty = qtyLabel.innerHTML;
        if (operator === '-') {
            if (qty > 1) {
                qty--;
            }
        } else if (operator === '+') {
            if (qty < 99) {
                qty++;
            }
        }
        qtyLabel.innerHTML = qty;
        qtyInput.value = qty;
    }
</script>
