<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;" id="feed-{{$pet->id}}">
        <h2 class="font-weight-light m-3" style="color: #0a3c60">What do you want to feed {{$pet->name}}?</h2>
    <div class="row">
        <div class="row mb-3 mt-0" style="overflow-x: scroll; max-width: 95%; margin-left: 3%">
            <div class="container-fluid pb-2">
                <div class="d-flex flex-row flex-nowrap">
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url('/images/foods/burger.png') }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url('/images/foods/burger.png') }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url('/images/foods/burger.png') }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url('/images/foods/burger.png') }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url('/images/foods/burger.png') }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-primary actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceFeed('{{$pet->id}}')">
            CANCEL
        </button>
    </div>

</div>

