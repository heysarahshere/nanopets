<div class="modal fade statModal" id="adoptModal{{$creature->id}}" tabindex="-1" role="dialog"
     aria-labelledby="adoptModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="adoptModalLabel">{{ $creature->name }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--  modal body--}}
            {{--     bosy one (buying info)        --}}
            <div class="modal-body" id="creature-detail-{{$creature->id}}">
                <div class="row">
                    <div class="col-6 store-img-container">
                        <img class="card-img-top pt-4 pb-0"
                             src="{{ Storage::disk('s3')->url("/images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png") }}"
                             Image>
                    </div>
                    <div class="col-6 m-0 text-left">
                        <div class="row"><h2 style="color: black">Type:&nbsp; </h2>
                            <h2 style="color: #da3a09">{{ $creature->element }}</h2></div>
                        <div class="row"><h2 style="color: black">Tier:&nbsp; </h2>
                            <h2 style="color: {{ $creature->tier == 'Bronze' ? 'saddlebrown' :  $creature->tier}}">{{ $creature->tier }}</h2>
                        </div>
                        <div class="row"><h2 style="color: black">Health:&nbsp; </h2>
                            <h2 style="color: #b90404">{{ $creature->max_health }}</h2></div>
                        <div class="row"><h2 style="color: black">Stamina:&nbsp; </h2>
                            <h2 style="color: #776700">{{ $creature->max_stamina }}</h2></div>
                        <div class="row"><h2 style="color: black">Magic:&nbsp; </h2>
                            <h2 style="color: #00b096">{{ $creature->magic }}</h2></div>
                        <div class="row"><h2 style="color: black">Strength:&nbsp; </h2>
                            <h2 style="color: #094486">{{ $creature->strength }}</h2></div>
                        <div class="row"><h2 style="color: black">Defense:&nbsp; </h2>
                            <h2 style="color: #33a404">{{ $creature->defense }}</h2></div>
                        <div class="row"><h2 style="color: black">Mojo:&nbsp; </h2>
                            <h2 style="color: #ff24a6">{{ $creature->mojo }}</h2></div>
                        <div class="row"><h2 style="color: black">High Tier Potential:&nbsp; </h2>
                            <h2 style="color: #cb8e0a">{{ $creature->potential }}%</h2></div>
                        <h2 style="color: black">Sold by {{$creature->seller->username}}</h2>
                    </div>

                </div>

                <div class="modal-footer">
                    {{-- should first open 'are you sure' and double check that there is enough money in account, then submit form --}}
                    {{-- form only needs to send creature id in hidden input, the rest can be handled in controller --}}

                    @if(Auth::check())
                        <?php $user = Auth::user()?>
                        @if ( $user->id == $creature->seller_id )
                            <h2 class="text-center mr-5">You listed this creature for adoption.</h2>
                            <form id="cancelSale" name="cancelAdopt" method="POST"
                                  action="{{route('cancel-sell-creature')}}" style="width: 90%; margin-right: 10%">
                                <button type="submit" class="btn btn-danger cancel-actions-btn w-100">Cancel Sale
                                </button>
                                <input type="hidden" value="{{$creature->id}}" id="creature_id" name="creature_id">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <button onclick="toggleAdoptCard('{{ $creature->id }}')"
                                    class="btn btn-primary purchase-btn w-100">
                                Adopt {{ $creature->name }}</button>
                        @endif
                    @else
                        <a href="{{route('get-sign-in')}}" style="width: 100%">
                            <button class="btn btn-sm rev-ombre-btn" style="width: 100%">sign in to
                                adopt {{$creature->name}}</button>
                        </a>
                    @endif
                </div>
            </div>
            {{--end one--}}
            {{--       body two (buying confirmation or insufficient fund error        --}}
            <div class="modal-body hiddenFace" id="creature-confirm-{{$creature->id}}">
                <div class="row">
                    <div class="col-6 store-img-container m-auto">
                        <img class="card-img-top pb-0"
                             src="{{ Storage::disk('s3')->url("/images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png") }}"
                             Image>
                    </div>

                </div>
                <div class="modal-footer">
                    @if(Auth::check())
                        <?php $user = Auth::user()?>
                        @if( $user->balance >= $creature->cost )
                            <form id="adoptCreature" name="adopt" method="POST" action="{{route('adopt-creature')}}"
                                  style="width: 90%; margin-right: 10%">
                                <button type="submit" class="btn btn-primary purchase-btn w-100">Adopt</button>
                                <input type="hidden" value="{{$creature->id}}" id="creature_id" name="creature_id">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <h2>Sorry, you don't have enough gold to adopt {{$creature->name}}. </h2>
                        @endif
                    @else
                        <h2 class="m-auto text-center">You must sign in to adopt a creature.</h2>
                    @endif
                    <button onclick="toggleAdoptCard('{{ $creature->id }}')"
                            class="btn btn-danger cancel-actions-btn w-100">
                        Cancel
                    </button>

                </div>

            </div>
            {{--end two--}}
        </div>
    </div>
</div>
