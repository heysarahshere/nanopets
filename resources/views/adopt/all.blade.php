@extends('layout.master')
@section('title')
    Adopt a Creature
@endsection
@section('content')
    @include('partials.info.banner-message')
    @include('partials.navigation.store-nav')
    <div>
        <div class="container store-body text-center pt-4">
            <div class="row justify-content-center align-items-center m-auto">
                @foreach($creatures as $creature)
                    <div class="col-4 pb-5">
                        <div class="card store-card" style="width: 100%;">
                            <div class="{{ $creature->element }}-ombre-btn">
                                <div class="row justify-content-center align-items-center mt-auto pt-2">
                                    <i class="fa-solid fa-coins pr-2 pb-2" style="color: #daa806;font-size: 30px"></i>
                                    <h2 class="text-center"> {{$creature->cost}}</h2>
                                </div>
                            </div>
                            <div class="store-img-container col-9 m-auto p-0">
                                <div class="reveal-stats">
                                    <div class="row">
                                        <div class="col-4">
                                            {{--                                            <span class="tooltiptext">Age: {{$creature->dev_stage}}</span>--}}
                                            <i class="fa-solid fa-{{$creature->dev_stage == 'baby' ? 'baby' : 'person'}}"></i>
                                        </div>
                                        <div class="col-4">
                                            {{--                                            <span class="tooltiptext">Gender: {{$creature->gender}}</span>--}}
                                            <i class="fa-solid fa-{{$creature->gender == 'male' ? 'mars' : 'venus'}}"></i>
                                        </div>
                                        <div class="col-4">
                                            {{--                                            <span class="tooltiptext">Type: {{$creature->element}}</span>--}}
                                            <i class="fa-solid fa-fire"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top mr-1" style="width: auto; height: 245px;"
                                     src="{{ Storage::disk('s3')->url("images/creatures/" . $creature->species . "/" . $creature->dev_stage . "/" . $creature->element . ".png" )}}"
                                     alt="{{ $creature->name }} Image">
                            </div>
                            <div class="card-body pb-2 {{$creature->element}}">
                                <h2 class="card-title">{{ $creature->name }}</h2>

                                <p class="card-text">
                                    This {{$creature->gender}} {{$creature->species}} is a level <span
                                        style="font-family: Funhouse;">{{$creature->level}}</span> {{$creature->element}}
                                    type with a <span style="font-family: Funhouse;">{{$creature->potential}}%</span>
                                    chance at breeding a high tier creature.
                                </p>
                            </div>

                            <button type="button" class="btn btn-primary purchase-btn" style="width: 90%"
                                    data-toggle="modal"
                                    data-target="#adoptModal{{$creature->id}}">DETAILS
                            </button>
                        </div>
                    </div>
                    @include('partials.modals.adopt-stat-modal')
                @endforeach
                <div class="container">
                    <div class="row m-auto">
                        {{ $creatures->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAdoptCard(id) {
            let back = document.getElementById("creature-detail-" + id);
            let feed = document.getElementById("creature-confirm-" + id);
            if (back.classList.contains('hiddenFace')) {
                feed.classList.add('hiddenFace');
                back.classList.remove('hiddenFace');
            } else {
                back.classList.add('hiddenFace');
                feed.classList.remove('hiddenFace');
            }
        }
    </script>

@endsection

