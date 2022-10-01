<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;" id="breed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">Who do you want to pair with <span style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mb-3 mt-0 " style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url("/images/creatures/cat/adult/dark.png") }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url("/images/creatures/lizard/adult/gem.png") }}">
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('s3')->url("/images/creatures/horse/adult/water.png") }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceBreed('{{$pet->id}}')">
            CANCEL
        </button>
    </div>
</div>

