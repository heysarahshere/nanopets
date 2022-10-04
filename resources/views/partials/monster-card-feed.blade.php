<div class="card monster-card py-0 hiddenFace feed-card" style="border-radius: 15px; width: 98%;"
     id="feed-{{$pet->id}}">
    <h2 class="font-weight-light mx-3 mt-3 mb-1 text-center" style="color: #0a3c60">What do you want to feed <span
            style="color: #840e8d">{{$pet->name}}</span>?</h2>
    <div class="row">
        <div class="row mb-3 mt-0 " style="
             @if (count($purchases) > 0)
                overflow-x: scroll;
             @endif
             max-width: 95%; margin-left: 5%; margin-right: 5%">
            <div class="container-fluid pb-3">
                <div class="d-flex flex-row flex-nowrap">
                    <?php $user = Auth::user(); ?>
                    @if (count($purchases) > 0)
                        @foreach ($purchases as $purchase)
                            <div class="card card-body p-0 monster-card-feed-option"
                                 id="food_{{$pet->id}}_{{$purchase->item->id}}"
                                 onclick="foodQtyWindowSwitch({{$pet->id}}, {{$purchase->item->id}})">
                                <div class="col-12">
                                    <img class="m-auto pt-5"
                                         style="width: auto; height: 200px; max-width: 280px;display:block"
                                         src="{{ Storage::disk('s3')->url($purchase->item->image) }}">
                                    <div class="circle"
                                         style="position: absolute; top: 5%; left: 10%; background-color: #840e8d">
                                        <p class="ml-3"
                                           style="font-family: Funhouse; color: white;">{{$purchase->qty}}</p>
                                    </div>
                                    <p style="color: black; text-align: center;">{{$purchase->item->name}}</p>
                                    <div class="row justify-content-center food-effect-amount">
                                        <p style="color: black;">
                                            +{{$purchase->item->effectAmount}} {{$purchase->item->mainStat}}</p> &nbsp;
                                        @if (!empty($purchase->item->bonusStat))
                                            <p style="color: black;">
                                                +{{$purchase->item->bonusEffectAmount}} {{$purchase->item->bonusStat}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- detail card --}}
                            <div class="card card-body p-0 monster-card-feed-option hiddenFace"
                                 id="foodConfirm_{{$pet->id}}_{{$purchase->item->id}}">
                                <div class="col-12">
                                    <img class="m-auto pt-5"
                                         style="width: auto; height: 200px; max-width: 280px;display:block"
                                         src="{{ Storage::disk('s3')->url($purchase->item->image) }}">
                                    <div class="circle"
                                         style="position: absolute; top: 5%; left: 10%; background-color: #840e8d">
                                        <p class="ml-3"
                                           style="font-family: Funhouse; color: white;">{{$purchase->qty}}</p>
                                    </div>
                                    <p style="color: black; text-align: center; font-size: large">How many {{$purchase->item->name}}s?</p>

                                    <form id="feedCreatureForm">
                                    <div>
                                        <div class="row justify-content-center">
                                            <i class="fa-solid fa-circle-minus left-span-food" onclick="incInput('-', {{$pet->id}}, {{$purchase->item->id}})"></i>
                                            <div style="width: 50px"><h2 class="text-center mt-auto mb-3" style="font-size: large; color: black"  id="qtyLabel{{$pet->id}}{{$purchase->item->id}}">1</h2></div>
                                            <i class="fa-solid fa-circle-plus right-span-food" onclick="incInput('+', {{$pet->id}}, {{$purchase->item->id}})"></i>
                                        </div>
                                        <p class="success" id="success-message{{$pet->id}}{{$purchase->item->id}}" style="font-weight: bold; color:#00add4;"></p>
                                        <p class="val-error" id="val-error{{$pet->id}}{{$purchase->item->id}}" style="font-weight: bold; color:#ff1818;"></p>
                                        <input type="hidden" value="1" id="qty{{$pet->id}}{{$purchase->item->id}}" name="qty{{$pet->id}}{{$purchase->item->id}}">
{{--                                        <input type="hidden" value="{{$purchase->item->id}}" id="item_id" name="item_id">--}}
                                    </div>
                                    <div class="row justify-content-center food-effect-amount">
                                        {{ csrf_field() }}
                                        <button class="btn btn-sm purchase-btn" type="button" onclick="foodConfirmAjax(event, {{$pet->id}}, {{$purchase->item->id}})">FEED</button>
                                        <button class="btn btn-sm cancel-actions-btn" onclick="foodQtyWindowSwitch({{$pet->id}}, {{$purchase->item->id}})">BACK</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <img class="card-img-top my-0"
                             style="width: auto; max-height: 300px; margin-left: 65%"
                             src="{{ Storage::disk('s3')->url('images/foods/plate.png') }}">
                        <div style="position: absolute; bottom: 40%; left: 41%">
                            <button class="w-100 btn purchase-btn"><a href="{{route('foods')}}"> Buy Food </a></button>
                        </div>

                    @endif
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-danger cancel-actions-btn w-100 mb-3"
                onclick="toggleMonsterCardFaceFeed('{{$pet->id}}')">
            CANCEL
        </button>
    </div>

</div>

<script>
    function foodQtyWindowSwitch(pet_id, item_id) {
        let front = document.getElementById("food_" + pet_id + "_" + item_id);
        let back = document.getElementById("foodConfirm_" + pet_id + "_" + item_id);
        if (back.classList.contains('hiddenFace')) {
            front.classList.add('hiddenFace');
            back.classList.remove('hiddenFace');
        } else {
            back.classList.add('hiddenFace');
            front.classList.remove('hiddenFace');
        }
    }

    function incInput(operator, pet_id, item_id) {
        let qtyLabel = document.getElementById("qtyLabel" + pet_id + item_id);
        let qtyInput = document.getElementById("qty" + pet_id + item_id);
        let qty = qtyLabel.innerHTML;
        if (operator === '-') {
            if (qty > 1) {
                qty--;
            }
        } else if (operator === '+') {
            if (qty < 99) {
                qty++;
            }
        }
        qtyLabel.innerHTML = qty;
        qtyInput.value = qty;
    }

    function foodConfirmAjax(event, pet_id, item_id) {
        event.preventDefault();
        let qty = document.getElementById("qty" + pet_id + item_id).value;
        if (qty === '') {
            $("#val-error" + pet_id + item_id).text('Please enter a quantity.');
        } else {
            jQuery.ajax({
                type: 'POST',
                url: "{{ route('feed-ajax') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    pet_id: pet_id,
                    item_id: item_id,
                    qty: qty
                },
                beforeSend: function (xhr, type) {
                    $('#val-error' + pet_id + item_id).hide();
                    $("#success-message" + pet_id + item_id).hide();
                },
                success: function (response) {
                    if (response) {
                        // alert(data.success);
                        $("#success-message" + pet_id + item_id).text('Fed!');
                        foodQtyWindowSwitch(pet_id, item_id);
                        toggleMonsterCardFaceFeed(pet_id);
                        switchMonsterCardFace(pet_id);

                        $("#hunger-meter-" + pet_id).text(response.hunger + '/100').fadeIn();
                        // $("#hunger-meter-bar-" + pet_id).removeClass (function (index, className) {
                        //     return (className.match (/(^|\s)progress-\S+/g) || []).join(' ');
                        // }).addClass('progress-green');
                        $("#hunger-meter-bar-" + pet_id).animate({
                            color: "#2fc217"
                        }, 3500);


                        // $("#hunger-meter-bar-" + pet_id)
                        $("#hunger-meter-span-" + pet_id).css("width", response.hunger + '%');
                    } else {
                        $("#val-error" + pet_id + item_id).text('Oops, something went wrong.');
                    }
                },
                complete: function (data) {
                    // $(".ajax-loader").hide();
                },
                error: function (response) {
                    if (response.error) {
                        $("#val-error" + pet_id + item_id).text('Fail.');
                        // location.reload();
                    } else {
                        $("#val-error" + pet_id + item_id).text('Uh oh, something went wrong.');
                    }
                }
            });
        }
    }

</script>
