<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;"
     id="feed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">What do you want to feed <span
            style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mb-3 mt-0 " style="
             @if (count($purchases) > 0)
                overflow-x: scroll;
             @endif
             max-width: 95%; margin-left: 5%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    <?php $user = Auth::user(); ?>
                    @if (count($purchases) > 0)
                        @foreach ($purchases as $purchase)
                            <div class="card card-body p-0">
                                <div class="col-12">
                                    <img class="m-auto pt-5"
                                         style="width: auto; height: 200px; max-width: 280px;display:block"
                                         src="{{ Storage::disk('s3')->url($purchase->item->image) }}">
                                    <div class="circle" style="position: absolute; top: 5%; left: 10%; background-color: #840e8d">
                                        <p class="ml-3" style="font-family: Funhouse; color: white;">{{$purchase->qty}}</p>
                                    </div>
                                    <p style="color: black; text-align: center; vertical-align: bottom">{{$purchase->item->name}}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <img class="card-img-top my-0"
                             style="width: auto; max-height: 300px; margin-left: 65%"
                             src="{{ Storage::disk('s3')->url('images/foods/plate.png') }}">
                        <div style="position: absolute; bottom: 40%; left: 41%">
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

