<div class="card monster-card py-0" style="border-radius: 15px; width: 98%;" id="front-{{$pet->id}}">
    <div class="row">
        <div class="col-6 {{ $pet->element }}-ombre-btn my-3 mr-0">
            <div class="">
                <div class="row justify-content-center align-items-center mt-auto pt-2">
                    <i class="fa-solid fa-khanda pr-2 pb-2" style="font-size: 30px; color: rgba(0,0,0,0.51)"
                       onclick="changeName('{{$pet->id}}')"></i>
                    <h2 class="text-center hover-name" style="color: black" onclick="changeName('{{$pet->id}}')"
                        id="nameLabel{{$pet->id}}">
                        {{Str::limit($pet->name, 12)}}
                    </h2>
                    <div class="input-group mb-3 mx-3 hiddenFace" id="nameInputDiv{{$pet->id}}"
                         name="nameInputDiv{{$pet->id}}">
                        <form id="ajaxNameChangeForm{{$pet->id}}" class="name-change-form m-auto">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <p class="success" id="success-message{{$pet->id}}"
                               style="font-weight: bold; color:#00add4;"></p>
                            <p class="val-error" id="val-error{{$pet->id}}"
                               style="font-weight: bold; color:#ff1818;"></p>
                            <div class="input-group-append" id="name-change-div">
                                <input type="hidden" value="{{$pet->id}}" id="creature_id" name="creature_id">
                                <input type="text" class="form-control m-auto" placeholder="{{$pet->name}}"
                                       id="nameInput{{$pet->id}}" name="nameInput{{$pet->id}}">
                                {{ csrf_field() }}
                                <button type="button" class="btn btn-info name-change-button"
                                        id="name-change-confirm_{{$pet->id}}"
                                        onclick="submitNameChangeAjax(event, '{{$pet->id}}')">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="store-img-container mb-3">
                <div class="monster-parent col-12">
                    <img class="monster-child"
                         src="{{ Storage::disk('s3')->url("/images/creatures/" . $pet->species . "/" . $pet->dev_stage . "/" . $pet->element . ".png") }}"
                         alt="{{ $pet->name }} Image">
                </div>
            </div>
            <div class="p-3 pt-5 text-center">
                <h1 style="font-size: xx-large; color: black">{{$pet->dev_stage}} {{$pet->gender}}</h1>
                <h1 style="font-size:  xx-large; color: black">
                    {{Str::upper($pet->element)}} TYPE</h1>
            </div>
        </div>
        <div class="col-5">
            <div class="col-12 monster-slider">
                <h2 class="pt-4">HEALTH</h2>
                <div class="animated-progress
                                    @if ($pet->current_health / $pet->max_health * 100 > 80)
                                    progress-green
                                    @elseif ($pet->current_health / $pet->max_health * 100 > 55)
                                    progress-yellow
                                    @elseif($pet->current_health / $pet->max_health * 100 > 30)
                                    progress-orange
                                    @else
                                    progress-red
                                    @endif
                                    " id="health-meter-bar-{{$pet->id}}">
                    <span style="width: {{$pet->current_health / $pet->max_health * 100}}%" id="health-meter-span-{{$pet->id}}"></span>
                    <div class="reveal-stats" id="health-meter-{{$pet->id}}">{{$pet->current_health}}/{{ $pet->max_health}}</div>
                </div>
            </div>
            <div class="col-12 monster-slider">
                <h2 class="pt-4">HUNGER</h2>
                <div class="animated-progress
                                    @if ($pet->hunger > 80)
                                    progress-green
                                    @elseif ($pet->hunger > 55)
                                    progress-yellow
                                    @elseif($pet->hunger > 30)
                                    progress-orange
                                    @else
                                    progress-red
                                    @endif
                                    " id="hunger-meter-bar-{{$pet->id}}">
                    <span style="width: {{$pet->hunger}}%" id="hunger-meter-span-{{$pet->id}}"></span>
                    <div class="reveal-stats" id="hunger-meter-{{$pet->id}}">{{$pet->hunger}}/100</div>
                </div>
            </div>
            <div class="col-12 monster-slider">
                <h2 class="pt-4">EXHAUSTION</h2>
                <div class="animated-progress
                                    @if ($pet->current_stamina / $pet->max_stamina * 100 > 80)
                                    progress-green
                                    @elseif ($pet->current_stamina / $pet->max_stamina * 100 > 55)
                                    progress-yellow
                                    @elseif($pet->current_stamina / $pet->max_stamina * 100 > 30)
                                    progress-orange
                                    @else
                                    progress-red
                                    @endif
                                    " id="stamina-meter-bar-{{$pet->id}}">
                                        <span style="width: {{$pet->current_stamina / $pet->max_stamina * 100}}%" id="stamina-meter-span-{{$pet->id}}"></span>
                    <div class="reveal-stats" id="stamina-meter-{{$pet->id}}">{{$pet->current_stamina}}/{{ $pet->max_stamina}}</div>
                </div>
            </div>

        </div>

        <button type="button" class="btn btn-primary actions-btn w-100 mb-3"
                onclick="switchMonsterCardFace('{{$pet->id}}')">
            ACTIONS >
        </button>


    </div>
</div>

