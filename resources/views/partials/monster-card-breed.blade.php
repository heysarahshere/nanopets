<div class="card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;"
     id="breed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">Who do you want to pair with <span
            style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mt-0 " style="overflow-x: scroll; max-width: 95%; margin-left: 5%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    @foreach($pets as $partner)
{{--                        @if ($partner->dev_stage === 'adult' && $partner->id != $pet->id && $partner->gender != $pet->gender && $partner->available == 1)--}}
                        @if ($partner->compatible($pet))
                            {{-- breed confirmation front --}}
                            <div class="card card-body cupid-border" id="breed_{{$pet->id}}_{{$partner->id}}"
                                 onclick="toggleBreedConfirm('{{$pet->id}}','{{$partner->id}}')">
                                <div>
                                    <i class="fa-regular fa-heart cupid-heart"></i>
                                    <img class="card-img-top"
                                         style="width: auto; height: 100%; max-width: 250px;display:block"
                                         src="{{ Storage::disk('s3')->url("/images/creatures/" . $partner->species . "/adult/" . $partner->element . ".png") }}">
                                </div>
                                <h2 style="color: black; text-align: center;">{{$partner->name}}</h2>
                            </div>
                            {{-- breed confirmation back --}}
                            <div class="card card-body cupid-border hiddenFace" id="breedConfirm_{{$pet->id}}_{{$partner->id}}"
                                >
                                <div>
                                    <img class="card-img-top m-auto"
                                         style="width: auto; height: 100%; max-width: 220px;display:block;"
                                         src="{{ Storage::disk('s3')->url("/images/creatures/" . $partner->species . "/adult/" . $partner->element . ".png") }}">
                                </div>
                                <h2 style="color: black; text-align: center;">
                                    Choose {{$partner->name}}?</h2>
                                <div class="row">
                                    <div class="col-6"> <a style="z-index: 99" href="{{route('breed', ['id1' => $pet->id, 'id2' => $partner->id])}}" type="button" class="btn btn-md btn-primary actions-btn w-100 m-0"><i class="fa-regular fa-heart" style="color: #ff4668"></i></a>
                                    </div>
                                    <div class="col-6"> <button style="z-index: 99" class="btn btn-md btn-danger cancel-actions-btn w-100 m-0" onclick="toggleBreedConfirm('{{$pet->id}}','{{$partner->id}}')"><i class="fa-regular fa-thumbs-down" style="color: #61a9ff"></i></button>
                                    </div>

                                </div>
                           </div>
                        @endif
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

<script>

    function toggleBreedConfirm(pet_id, partner_id) {
        let front = document.getElementById("breed_" + pet_id + "_" + partner_id);
        let back = document.getElementById("breedConfirm_" + pet_id + "_" + partner_id);
        if (back.classList.contains('hiddenFace')) {
            front.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            front.classList.remove('hiddenFace');
        }

    }
</script>
