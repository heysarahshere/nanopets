<div class="modal fade statModal" id="adoptModal{{$creature->id}}" tabindex="-1" role="dialog" aria-labelledby="adoptModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h2 class="modal-title text-center" id="adoptModalLabel">{{ $creature->name }} Stats</h2>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           {{--  modal body--}}
           <div class="modal-body">
               <div class="row">
                   <div class="col-6 store-img-container">
                       <img class="card-img-top pt-4 pb-0" src="{{ Storage::disk('s3')->url("/images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png") }}"
                             Image>
                   </div>
                   <div class="col-6 m-0 text-left">
                       <div class="row"><h2 style="color: black">Type:&nbsp; </h2>
                           <h2 style="color: #da3a09">{{ $creature->element }}</h2></div>
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
                           <h2 style="color: #cb8e0a">{{ $creature->potential }}</h2></div>
                   </div>
               </div>

           </div>
           <div class="modal-footer">
                {{-- should first open 'are you sure' and double check that there is enough money in account, then submit form --}}
                {{-- form only needs to send creature id in hidden input, the rest can be handled in controller --}}
               <a href="#" class="btn btn-primary purchase-btn w-100">Adopt {{ $creature->name }}</a>
{{--               <form name="adopt" method="POST" action="{{route('adopt-creature')}}">--}}
{{--               {{ csrf_token() }}--}}
{{--               </form>--}}
           </div>
       </div>
   </div>
</div>
