<div class="card monster-card py-0 hiddenFace" style="border-radius: 15px; width: 98%;" id="destroy-{{$pet->id}}">
    <h2 class="font-weight-light mt-2 mb-0 p-0 text-center" style="color: #0a3c60">Are you sure you want to turn
        <span
            style="color: #840e8d">{{$pet->name}}</span> into kibble?</h2>
    <div class="row">

        <div class="col-5 m-auto p-0">
            <img style="width: 100%; height: auto"
                 src="{{ Storage::disk('s3')->url("/images/eggs/" . $pet->dev_stage . "/" . $pet->element . ".png") }}"
                 alt="{{ $pet->name }} Image">
        </div>
        <form id="destroyCreature" name="adopt" method="POST" action="{{route('destroy-creature')}}" style="width: 90%">
            <button type="submit" class="btn btn-primary actions-btn w-100 mb-1">
                YES
            </button>
            <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                    onclick="toggleMonsterCardFaceSell('{{$pet->id}}', 'egg')">
                NO
            </button>
            <input type="hidden" value="{{$pet->id}}" id="pet_id" name="pet_id">
            {{ csrf_field() }}
        </form>
    </div>

</div>

