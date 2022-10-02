<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;"
     id="feed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">What do you want to feed <span
            style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mb-3 mt-0 " style="overflow-x: scroll; max-width: 95%; margin-left: 28%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    <?php $user = Auth::user(); ?>
                    @if (count($purchases) > 0)
                        @foreach ($purchases as $purchase)
                            <div class="card card-body p-0">
                                <div class="w-100 m-auto">
                                    <img class="card-img-top mx-auto my-0"
                                         style="width: auto; max-height: 300px; max-width: 280px"
                                         src="{{ Storage::disk('s3')->url($purchase->item->image) }}">
                                    <div style="position: absolute; top: 10%; left: 50%">
                                        <p style="font-family: Funhouse;">{{$purchase->qty}}</p>
                                    </div>
                                </div>
                                <h2 style="color: black; text-align: center">{{$purchase->item->name}}</h2>
                            </div>
                        @endforeach
                    @else
                                <img class="card-img-top m-auto my-0"
                                     style="width: auto; max-height: 300px; max-width: 280px"
                                     src="{{ Storage::disk('s3')->url('images/foods/plate.png') }}">
                                <div style="position: absolute; bottom: 14%; left: 40%">
                                    <button class="w-100 btn purchase-btn"><a href="{{route('foods')}}"> Buy Food </a></button>
                                </div>

                    @endif
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceFeed('{{$pet->id}}')">
            CANCEL
        </button>
    </div>

</div>

