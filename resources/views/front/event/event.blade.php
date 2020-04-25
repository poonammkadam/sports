@extends('layouts.app')
@section('content')
    <?php
    $listAccommodation = json_decode($objEvent->accommodation);
    ?>
    <div class="container" style="background-color: #d3d8d8;">
        <div>
            <div class="row event-form-main">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 event-form">
                    <div class="text-center ">
                        <h3>Event Participation</h3>
                    </div>
                    <div class="shadow-lg p-5" style="background: white;">
                        <form id="event_submit" method="POST" action="{{url('event/register')}}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                            <h2 class="text-center ">{{$objEvent->name}}</h2>
                            <br>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="event-form-input" class="event-form-input">Event Categorys </label>
                                        <select class="form-control custom-select" required name="event_category"
                                                id="category">
                                            <option>Select event</option>
                                            @foreach($objEvent->category as $index => $prate)
                                                {{$prate->getEventPrice()}}
                                                <option class="cate"
                                                        value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="event-form-input" class="event-form-input">Event Fee: </label>B $ <span
                                    id="price">--</span>
                                <input type="hidden" value="" id="event-form-input" name="fee">

                            </div>

                            <div class="form-group">
                                <label for="event-form-input"
                                       class="event-form-input">Organizer:- </label> {{$objEvent->organisation->name}}
                            </div>

                            <div class="form-group">
                                <label for="event-form-input" class="event-form-input">Contact Number: </label>B $ <span
                                    id="price">.....</span>
                            </div>

                            <div class="form-group">
                                <label for="event-form-input" class="event-form-input">Event Date
                                    : </label>{{$objEvent->event_date}}
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="inputAddress" class="event-form-input">Team / Sponsor</label>Optional
                                    <input required type="text" name="local_name" value="" class="form-control"
                                           id="inputAddress" placeholder="">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
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
                            </div>
                            <div>
                                <label for="accommodation" class="event-form-input">Accommodation</label>
                                <select id="accommodation" class="form-control custom-select" name="accommodation">
                                    <option value="">Select</option>
                                    @foreach($listAccommodation as $objOption)
                                        <option value="{{$objOption->name}}">{{$objOption->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label for="bus_reservation" class="event-form-input">Bus Reservation</label>
                                Optional transportation. TD plaza hotel kota kinabalu - starting / finishing - TD plaza
                                hotel kota kinabalu. Rm80 both ways.
                                <select id="bus_reservation" class="form-control custom-select" name="bus_reservation">
                                    <option selected value="no">NO need</option>
                                    <option value="yes">Yes, both ways(Rm80)</option>
                                </select>

                            </div>
                            <div class="chat-body">
                                <label class="event-form-input">Total Payment Chat </label>
                                <div>
                                    <div class="row"><p class="col-6 chat-event">Event amount: </p>
                                        <p class="col-6">----</p></div>
                                    <div class="row"><p class="col-6 chat-accommodation">Accommodation amount: </p>
                                        <p class="col-6">----</p></div>
                                    <div class="row"><p class="col-6 chat-reservation">Reservation amount:</p>
                                        <p class="col-6">----</p></div>
                                    <div class="row"><p class="col-6 chat-total">Total Amount:</p>
                                        <p class="col-6">----</p></div>
                                </div>
                            </div>
                            <div>
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
                                        <div class="form-group col-md-6">
                                            <input class="form-control" placeholder="Card number" type="tel"
                                                   name="number">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="form-control" placeholder="Full name" type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input class="form-control" placeholder="MM/YY" type="tel" name="expiry">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
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
    <script>
        $("#category").on('change', function () {
            let str = "";
            $("select option:selected").each(function () {
                str += $(this).data('price') + " ";
            });
            $('#price').html(str)
            $('input[name="fee"]').val(str)
        });

        $('#online').on('click', function () {
                $('.payment-online').css('display', 'block')
            }
        )

        $('#offline').on('click', function () {
                $('.payment-online').css('display', 'none')
            }
        )
    </script>

    <script src="{{asset('js/card.js')}}"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
@endsection

