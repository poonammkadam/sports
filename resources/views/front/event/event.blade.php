@extends('layouts.app')
@section('content')
    <?php
    $listAccommodation = collect(json_decode($objEvent->accommodation));
    $listPickupTransportation = collect(json_decode($objEvent->transstart));
    $listDropTransportation = collect(json_decode($objEvent->transend));
    ?>
    <div class="container">
        <div>
            <div class="row event-form-main">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 event-form">
                    <div class="shadow-lg p-5" style="background: white;">
                        <form id="event_submit" method="POST" action="{{url('event/register')}}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                            <h2 class="text-center ">{{$objEvent->name}}</h2>
                            <br>
                            <div class="form-group evet-form-list">
                                <div>
                                    <label for="event-form-input" class="event-form-input">Event Categories </label>
                                    <select class="form-control custom-select" required name="event_category"
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
                                <input required type="text" name="local_name" value="" class="form-control"
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
                                    <select id="accommodation" class="form-control custom-select" name="accommodation">
                                        <option value="">Select</option>
                                        @foreach($listAccommodation as $objOption)
                                            <option data-price="{{$objOption->fee}}"
                                                    value="{{$objOption->id}}">{{$objOption->name}}
                                                ({{$objOption->fee}}
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($listPickupTransportation->count() > 0)
                                <div class="form-group evet-form-list">
                                    <label for="pickup_transportation" class="event-form-input">Pickup Location(Before
                                        Race)
                                        (optional)</label>
                                    <select id="pickup_transportation" class="form-control custom-select"
                                            name="pickup_transportation">
                                        <option value="">Select</option>
                                        @foreach($listPickupTransportation as $objOption)
                                            <option data-price="{{$objOption->fee}}"
                                                    value="{{$objOption->id}}">{{$objOption->location}}
                                                ({{$objOption->fee}})
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
                                    <select id="drop_transportation" class="form-control custom-select"
                                            name="drop_transportation">
                                        <option value="">Select</option>
                                        @foreach($listDropTransportation as $objOption)
                                            <option data-price="{{$objOption->fee}}"
                                                    value="{{$objOption->id}}">{{$objOption->location}}
                                                ({{$objOption->fee}}
                                                )
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($objEvent->racekit)
                                <div class="form-group evet-form-list">
                                    <label for="racekit" class="event-form-input">Want RaceKit</label>
                                    <select id="racekit" class="form-control custom-select" name="racekit">
                                        <option selected value="no">No need</option>
                                        <option data-price="{{$objEvent->racekit}}" value="yes">Yes,
                                            amount({{$objEvent->racekit}})
                                        </option>
                                    </select>
                                </div>
                            @endif
                            {{--                            <div class="form-group evet-form-list">--}}
                            {{--                                <label for="bus_reservation" class="event-form-input">Bus Reservation</label>--}}
                            {{--                                Optional transportation. TD plaza hotel kota kinabalu - starting / finishing - TD plaza--}}
                            {{--                                hotel kota kinabalu. Rm80 both ways.--}}
                            {{--                                <select id="bus_reservation" class="form-control custom-select" name="bus_reservation">--}}
                            {{--                                    <option selected value="no">NO need</option>--}}
                            {{--                                    <option value="yes" data-price="{{$objEvent->bus_reservation_amount}}">Yes,--}}
                            {{--                                        amount({{$objEvent->bus_reservation_amount}})--}}
                            {{--                                    </option>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="chat-body">--}}
                            {{--                                <label class="event-form-input">Total Payment Chat </label>--}}
                            {{--                                <div>--}}
                            {{--                                    <div class="row"><p class="col-6 chat-event">Event amount: </p>--}}
                            {{--                                        <p class="col-6" id="eventamount">--</p></div>--}}
                            {{--                                    <div class="row"><p class="col-6 chat-accommodation">Accommodation amount: </p>--}}
                            {{--                                        <p class="col-6" id="accommodationamount">----</p></div>--}}
                            {{--                                    <div class="row"><p class="col-6 chat-reservation">Reservation amount:</p>--}}
                            {{--                                        <p class="col-6">----</p></div>--}}
                            {{--                                    <div class="row"><p class="col-6 chat-total">Total Amount:</p>--}}
                            {{--                                        <p class="col-6" id="totalamount">----</p></div>--}}
                            {{--                                    <input type="hidden" name="total" id="total">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
    </script>
@endsection

