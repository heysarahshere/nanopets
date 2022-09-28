<div class="card monster-card py-0 hiddenFace" style="border-radius: 15px; width: 98%;" id="sell-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-2 mb-0 p-0 text-center" style="color: #0a3c60">Are you sure you want to place <span
            style="color: #840e8d">{{$pet->name}}</span> up for adoption?</h2>
    <div class="row">
        <div class="col-6 m-auto">
            <img style="width: 100%; height: auto"
                 src="{{ asset("/images/creatures/" . $pet->species . "/color/" . $pet->body_image) }}"
                 alt="{{ $pet->name }} Image">
        </div>
        <button type="button" class="btn btn-primary actions-btn w-100 mb-1">
            YES
        </button>
        <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceSell('{{$pet->id}}')">
            NO
        </button>
    </div>

</div>

