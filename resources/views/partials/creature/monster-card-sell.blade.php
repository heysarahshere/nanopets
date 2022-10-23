<div class="card monster-card py-0 hiddenFace" style="border-radius: 15px; width: 98%;" id="sell-{{$pet->id}}">
    <h2 class="font-weight-light mt-2 mb-0 p-0 text-center" style="color: #0a3c60">Are you sure you want to place
        <span
            style="color: #840e8d">{{$pet->name}}</span> up for adoption?</h2>
    <div class="row">

        <div class="col-5 m-auto p-0">
            <img style="width: 100%; height: auto"
                 src="{{ Storage::disk('s3')->url("/images/creatures/" . $pet->species . "/" . $pet->dev_stage . "/" . $pet->element . ".png") }}"
                 alt="{{ $pet->name }} Image">
        </div>
        <form id="sellCreature" name="adopt" method="POST" action="{{route('sell-creature')}}" style="width: 90%">
            <div class="input-group mb-3" style="margin-left: 5%">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-coins"></i></span>
                </div>

                <input class="form-control" type="number" id="cost" name="cost" step="1.00"
                       placeholder="Please enter a sell price."
                       aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            </div>

            <button type="sumit" class="btn btn-primary actions-btn w-100 mb-1">
                YES
            </button>
            <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                    onclick="toggleMonsterCardFaceSell('{{$pet->id}}', 'egg')">
                NO
            </button>
            <input type="hidden" value="{{$pet->id}}" id="creature_id" name="creature_id">
            {{ csrf_field() }}
        </form>
    </div>

</div>

