<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;" id="breed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">Who do you want to pair with <span style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mb-3 mt-0 " style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    @foreach ($todo as $data)
                        <tr id="breedable-{{$data->id}}">
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->description}}</td>
                    <div class="card card-body">
                        <div class="w-100">
                            <img class="card-img-top" style="width: 100%; height: auto" src="{{ Storage::disk('public')->url($data->body_image) }}">
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceBreed('{{$pet->id}}')">
            CANCEL
        </button>
    </div>

</div>

