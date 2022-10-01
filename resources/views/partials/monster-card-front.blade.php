<div class="card monster-card py-0" style="border-radius: 15px; width: 98%;" id="front-{{$pet->id}}">
    <div class="row">
        <div class="col-6 {{ $pet->element }}-ombre-btn my-3 mr-0">
            <div class="">
                <div class="row justify-content-center align-items-center mt-auto pt-2">
                    <i class="fa-solid fa-khanda pr-2 pb-2" style="font-size: 30px; color: rgba(0,0,0,0.51)"></i>
                    <h2 class="text-center" style="color: black">
                        {{Str::limit($pet->name, 12)}}
                    </h2>
                </div>
            </div>
            <div class="store-img-container mb-3">
                <div class="monster-parent col-12">
                    <img class="monster-child"
                        src="{{ Storage::disk('s3')->url("/images/creatures/" . {{$creature->species}} . "/" . {{$creature->dev_stage}} . "/" . {{$creature->element}} . ".png") }}"
                         alt="{{ $pet->name }} Image">
                </div>
            </div>
            <div class="p-3 pt-5 text-center">
                {{--                                    <h1  style="font-size: larger">{{ $pet->name }}</h1>--}}
                <h1 style="font-size: xx-large; color: black">ADULT</h1>
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
                                    ">
                    <span style="width: {{$pet->current_health / $pet->max_health * 100}}%"></span>
                    <div class="reveal-stats">{{$pet->current_health}}/{{ $pet->max_health}}</div>
                </div>
            </div>
            <div class="col-12 monster-slider">
                <h2 class="pt-4">HUNGER</h2>
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
                                    ">
                                        <span
                                            style="width: {{$pet->current_stamina / $pet->max_stamina * 100}}%"></span>
                    <div class="reveal-stats">{{$pet->current_stamina}}/{{ $pet->max_stamina}}</div>
                </div>
            </div>
            <div class="col-12 monster-slider">
                <h2 class="pt-4">EXHAUSTION</h2>
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
                                    ">
                    <span style="width: {{$pet->hunger}}%"></span>
                    <div class="reveal-stats">{{$pet->hunger}}/100</div>
                </div>
            </div>

        </div>

        <button type="button" class="btn btn-primary actions-btn w-100 mb-3"
                onclick="switchMonsterCardFace('{{$pet->id}}')">
            ACTIONS >
        </button>


    </div>
</div>

