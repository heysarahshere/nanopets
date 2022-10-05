<div class="card monster-card py-0 hiddenFace" style="border-radius: 15px; width: 98%" id="back-{{$pet->id}}">
    <div class="row">

        <div class="col-6 {{ $pet->element }}-ombre-btn my-3 mr-0">
            <div class="">
                <div class="row justify-content-center align-items-center mt-auto pt-2">
                    <i class="fa-solid fa-khanda pr-2 pb-2" style="font-size: 30px; color: rgba(0,0,0,0.51)"></i>
                    <h2 class="text-center" style="color: black">
                        {{Str::limit($pet->name, 12)}}
                    </h2>
                </div>
                <h2 class="text-center" style="font-size: x-large">STATS</h2>
            </div>
            <div class="monster-stats col-12 pb-1">
                <p>Vitality: &nbsp; {{$pet->max_health}}</p>
                <p>Endurance: &nbsp; {{$pet->max_stamina}}</p>
                <p>Magic: &nbsp; {{$pet->magic}}</p>
                <p>Defense: &nbsp; {{$pet->defense}}</p>
                <p>Strength: &nbsp; {{$pet->strength}}</p>
                <p>Mojo: &nbsp; {{$pet->mojo}}</p>
                <p>Level: &nbsp; {{$pet->level}}</p>
            </div>
        </div>
        <div class="col-5 my-3">

            <form method="POST" action="{{route('incubate-single')}}" id="hatchEgg{{$pet->id}}">
                <input type="hidden" value="{{$pet->id}}" id="pet_id" name="pet_id">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary monster-card-btn card-feed-btn w-100 mb-3 hatch-btn">
                    <i class="fa-solid fa-egg"></i>&nbsp;HATCH
                </button>
                <button type="button"
                        class="btn btn-primary monster-card-btn card-breed-btn w-100 mb-3">
                    <i class="fa-solid fa-hammer"></i>
                    DESTROY
                </button>
                <button type="button" class="btn btn-primary monster-card-btn card-sell-btn w-100 mb-3"
                        onclick="toggleMonsterCardFaceSell('{{$pet->id}}')">
                    <i class="fa-solid fa-sack-dollar"></i>
                    SELL
                </button>
            </form>
        </div>
        <button type="button" class="btn btn-primary actions-btn w-100 mb-3"
                onclick="switchMonsterCardFace('{{$pet->id}}')">
            < STATUS
        </button>

    </div>
</div>

<script>
    function goToIncubator() {
        window.location.href = $(this).data('href');
    }
</script>

