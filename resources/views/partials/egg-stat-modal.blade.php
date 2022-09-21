<div class="modal fade statModal" id="eggModal{{$egg->id}}" tabindex="-1" role="dialog" aria-labelledby="eggModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="eggModalLabel">{{ $egg->name }} Stats</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--  modal body--}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 store-img-container">
                        <img class="card-img-top pt-4 pb-0" src="{{ Storage::disk('s3')->url($egg->image) }}"
                             alt="{{ $egg->name }} Image">
                    </div>
                    <div class="col-6 m-0 text-left">
                        <div class="row"><h2 style="color: black">Type:&nbsp; </h2>
                            <h2 style="color: #da3a09">{{ $egg->element }}</h2></div>
                        <div class="row"><h2 style="color: black">Health:&nbsp; </h2>
                            <h2 style="color: #b90404">{{ $egg->health }}</h2></div>
                        <div class="row"><h2 style="color: black">Stamina:&nbsp; </h2>
                            <h2 style="color: #776700">{{ $egg->stamina }}</h2></div>
                        <div class="row"><h2 style="color: black">Magic:&nbsp; </h2>
                            <h2 style="color: #00b096">{{ $egg->magic }}</h2></div>
                        <div class="row"><h2 style="color: black">Strength:&nbsp; </h2>
                            <h2 style="color: #094486">{{ $egg->strength }}</h2></div>
                        <div class="row"><h2 style="color: black">Defense:&nbsp; </h2>
                            <h2 style="color: #33a404">{{ $egg->defense }}</h2></div>
                        <div class="row"><h2 style="color: black">Mojo:&nbsp; </h2>
                            <h2 style="color: #ff24a6">{{ $egg->mojo }}</h2></div>
                        <div class="row"><h2 style="color: black">Hatch Speed:&nbsp; </h2>
                            <h2 style="color: #f68605">{{ $egg->hatchSpeed }}</h2></div>
                        <div class="row"><h2 style="color: black">High Tier Potential:&nbsp; </h2>
                            <h2 style="color: #cb8e0a">{{ $egg->potential }}</h2></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
            </div>
        </div>
    </div>
</div>
