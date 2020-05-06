@extends('layouts.app')
@section('content')
    <?php
    $listAccommodation = ($objEvent->accom);
    $listPickupTransportation = ($objEvent->start);
    $listDropTransportation = ($objEvent->end);

    ?>
    <div class="container">
        <div>
            <div class="row event-form-main">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 event-form">
                    <div class="shadow-lg p-5" style="background: white;">
                        <form id="event_submit" method="POST" action="{{url('event/register/store')}}"
                              autocomplete="off">
                            @csrf
                            <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                            <h2 class="text-center ">{{$objEvent->name}}</h2>
                            <br>
                            <div class="form-group evet-form-list">
                                <div>
                                    <label for="event-form-input" class="event-form-input">Event Categories </label>
                                    <select class="form-control custom-select" onchange="getPrice(this)"
                                            required name="event_category"
                                            id="category">
                                        <option>Select event</option>
                                        @foreach($objEvent->category as $index => $prate)
                                            <option data-price="{{$prate->getEventPrice()->fee}}" class="cate"
                                                    value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                            <div class="form-group evet-form-list">--}}
                            {{--                                <label for="event-form-input" class="event-form-input">Event Fee: </label>B $ <span--}}
                            {{--                                    id="price"></span>--}}
                            {{--                                <input type="hidden" value="" id="event-form-input" name="fee">--}}
                            {{--                            </div>--}}


                            {{--                            <div class="form-group evet-form-list">--}}
                            {{--                                <label for="event-form-input" class="event-form-input">Event Date--}}
                            {{--                                    : </label>{{$objEvent->event_date}}--}}
                            {{--                            </div>--}}

                            <div class="form-group evet-form-list">
                                <label for="inputAddress" class="event-form-input">Team / Sponsor</label>(Optional)
                                <input type="text" name="local_name" value="" class="form-control"
                                       id="inputAddress" placeholder="">
                            </div>

                            <div class="form-group evet-form-list">
                                <label for="tshirt" class="event-form-input">T-shirt size</label>
                                <select id="tshirt" class="form-control custom-select" name="t_shirt_size">
                                    <option selected>Open this select menu</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            @if($listAccommodation->count() > 0)
                                <div class="form-group evet-form-list">
                                    <label for="accommodation" class="event-form-input">Accommodation</label>
                                    <select id="accommodation" onchange="getPrice(this)"
                                            class="form-control custom-select"
                                            name="accommodation">
                                        <option value="">Select</option>
                                        @foreach($listAccommodation as $objOption)
                                            <option data-price="{{$objOption->price}}"
                                                    value="{{$objOption->id}}">{{$objOption->name}}
                                                ({{$objOption->price}}
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($listPickupTransportation->count() > 0)
                                <div class="form-group evet-form-list">
                                    <label for="pickup_transportation"
                                           class="event-form-input">Pickup Location(Before
                                        Race)
                                        (optional)</label>
                                    <select id="pickup_transportation" onchange="getPrice(this)"
                                            class="form-control custom-select"
                                            name="pickup_transportation">
                                        <option value="">Select</option>
                                        @foreach($listPickupTransportation as $objOption)
                                            <option data-price="{{$objOption->price}}"
                                                    value="{{$objOption->id}}">{{$objOption->location}}
                                                ({{$objOption->price}})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            @endif
                            @if($listDropTransportation->count() > 0)
                                <div class="form-group evet-form-list">
                                    <label for="drop_transportation" class="event-form-input">Pickup Location(After
                                        Race)
                                        (optional)</label>
                                    <select id="drop_transportation" onchange="getPrice(this)"
                                            class="form-control custom-select"
                                            name="drop_transportation">
                                        <option value="">Select</option>
                                        @foreach($listDropTransportation as $objOption)
                                            <option data-price="{{$objOption->price}}"
                                                    value="{{$objOption->id}}">{{$objOption->location}}
                                                ({{$objOption->price}}
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($objEvent->racekit)
                                <div class="form-group evet-form-list">
                                    <label for="racekit" class="event-form-input">Want RaceKit</label>
                                    <select id="racekit" onchange="getPrice(this)" class="form-control custom-select"
                                            name="racekit">
                                        <option selected value="no">No need</option>
                                        <option data-price="{{$objEvent->racekit}}" value="yes">Yes,
                                            amount({{$objEvent->racekit}})
                                        </option>
                                    </select>
                                </div>
                            @endif
                            <div class="form-group evet-form-list">
                                <label for="bus_reservation" class="event-form-input">Bus Reservation</label>
                                Optional transportation. TD plaza hotel kota kinabalu - starting / finishing - TD plaza
                                hotel kota kinabalu. Rm80 both ways.
                                <select id="bus_reservation" class="form-control custom-select" name="bus_reservation">
                                    <option selected value="no">NO need</option>
                                    <option value="yes" data-price="{{$objEvent->bus_reservation_amount}}">Yes,
                                        amount({{$objEvent->bus_reservation_amount}})
                                    </option>
                                </select>
                            </div>
                            <div class="chat-body">
                                <label class="event-form-input">Total Payment Chart </label>
                                <div>
                                    <div class="row"><p class="col-6 chat-event">Event
                                            amount: </p>
                                        <p class="col-6" id="eventamount">----</p></div>
                                    <div class="row"><p class="col-6 chat-accommodation">
                                            Accommodation amount: </p>
                                        <p class="col-6" id="accommodationamount">----</p></div>
                                    <div class="row"><p class="col-6 chat-reservation">Pickup
                                            amount:</p>
                                        <p class="col-6" id="pickupbeforeamount">----</p></div>
                                    <div class="row"><p class="col-6 chat-reservation">Pickup
                                            amount:</p>
                                        <p class="col-6" id="pickupafteramount">----</p></div>
                                    <div class="row"><p class="col-6 chat-reservation">Pickup
                                            amount:</p>
                                        <p class="col-6" id="racekitamount">----</p></div>
                                    <div class="row"><p class="col-6 chat-total">Total Amount:</p>
                                        <p class="col-6" id="totalamount">----</p></div>
                                    <input type="hidden" name="total" id="total">
                                </div>
                            </div>
                            <div class="form-group evet-form-list">
                                <label class="event-form-input">Select Payment Mode</label>
                                <div class="radio">
                                    <label for="offline"><input type="radio" required id="offline" value="offline"
                                                                name="payment_type">Offline</label>
                                </div>

                                <div class="radio">
                                    <label for="online"><input type="radio" required id="online" value="online"
                                                               name="payment_type">Online</label>
                                </div>
                            </div>
                            <div class="payment-online" style="display: none">
                                <div class="demo-container">
                                    <div class="card-wrapper"></div>
                                    <div class="form-row mt-5">
                                        <div class="form-group evet-form-list col-md-6">
                                            <input class="form-control" placeholder="Card number" type="tel"
                                                   name="number">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group evet-form-list col-md-6">
                                            <input class="form-control" placeholder="Full name" type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group evet-form-list col-md-6">
                                            <input class="form-control" placeholder="MM/YY" type="tel" name="expiry">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group evet-form-list col-md-6">
                                            <input class="form-control" placeholder="CVC" type="number" name="cvc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/card.js')}}"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
        $('#online').on('click', function () {
                $('.payment-online').css('display', 'block')
            }
        )

        $('#offline').on('click', function () {
                $('.payment-online').css('display', 'none')
            }
        )

        function getPrice(selectedObject) {
            var total = 0;
            if ($('#category :selected')) {
                let tktPrice = 0;
                if ($('#category :selected').data('price')) {
                    $('#eventamount').html($('#category :selected').data('price'))
                    tktPrice = $('#category :selected').data('price');
                    console.log(tktPrice)
                } else {
                    $('#eventamount').html('----')
                }
                total = total + parseInt(tktPrice)
            }
            if ($('#accommodation :selected')) {
                let accomprice = 0
                if ($('#accommodation :selected').data('price')) {
                    $('#accommodationamount').html($('#accommodation :selected').data('price'))
                    accomprice = $('#accommodation :selected').data('price');
                } else {
                    $('#accommodationamount').html('----')
                }
                total = total + parseInt(accomprice)
            }
            if ($('#pickup_transportation :selected')) {
                let pickbeforeprice = 0
                if ($('#pickup_transportation :selected').data('price')) {
                    $('#pickupbeforeamount').html($('#pickup_transportation :selected').data('price'))
                    pickbeforeprice = $('#pickup_transportation :selected').data('price');
                } else {
                    $('#pickupbeforeamount').html('----')
                }
                total = total + parseInt(pickbeforeprice)
            }
            if ($('#drop_transportation :selected')) {
                let pickafterprice = 0
                if ($('#drop_transportation :selected').data('price')) {
                    $('#pickupafteramount').html($('#drop_transportation :selected').data('price'))
                    pickafterprice = $('#drop_transportation :selected').data('price')
                } else {
                    $('#pickupafteramount').html('----')
                }
                total = total + parseInt(pickafterprice)
            }
            if ($('#racekit :selected')) {
                let racekitprice = 0
                if ($('#racekit :selected').data('price')) {
                    $('#racekitamount').html($('#racekit :selected').data('price'))
                    racekitprice = $('#racekit :selected').data('price')
                } else {
                    $('#racekitamount').html('----')

                }
                total = total + parseInt(racekitprice)
            }
            console.log(total)
            if (total > 0) {
                console.log('in here');
                $('#totalamount').html(total)
            } else {
                $('#totalamount').html('----')
            }

        }
    </script>
@endsection

