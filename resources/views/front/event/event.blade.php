@extends('layouts.app')
@section('content')
    <?php
    $listAccommodation = json_decode($objEvent->accommodation);
    ?>
    <div class="container">
        <div>
            <div class="text-center ">
                <h3>Event Participation</h3>

            </div>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="shadow-lg p-5">
                        <form id="event_submit" method="POST" action="{{url('event/register')}}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                            <h2>{{$objEvent->name}}</h2>
                            <br>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        {{--                    <select class="form-control custom-select" required name="event_category" id="category">--}}
                                        <option>Select event</option>
                                        @foreach($objEvent->category as $index => $prate)
                                            {{$prate->getEventPrice()}}
                                            <option class="cate"
                                                    value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                                        @endforeach
                                        {{--                    </select>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Event Fee: </label>B $ <span id="price">--</span>
                                <input type="hidden" value="" id="exampleFormControlInput1" name="fee">

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Organizer
                                    :- </label> {{$objEvent->organisation->name}}
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contact Number: </label>B $ <span
                                    id="price">--</span>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Event Date : </label>{{$objEvent->event_date}}
                            </div>
                            <div>
                                <p>Team / Sponsor</p>
                                <div class="form-group">
                                    <label for="inputAddress">Team / Sponsor</label>Optional
                                    <input required type="text" name="local_name" value="" class="form-control"
                                           id="inputAddress" placeholder="">
                                </div>
                            </div>
                            <div>
                                <p>Tee Shirt</p>
                                <div class="form-group">
                                    <label for="tshirt">T-shirt size</label>
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
                                <p>Accommodation</p>
                                <select id="accommodation" class="form-control custom-select" name="accommodation">
                                    <option value="">Select</option>
                                    @foreach($listAccommodation as $objOption)
                                        <option value="{{$objOption->name}}">{{$objOption->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <p>Bus Reservation</p>
                                Optional transportation. TD plaza hotel kota kinabalu - starting / finishing - TD plaza
                                hotel kota kinabalu. Rm80 both ways.
                                <select id="bus_reservation" class="form-control custom-select" name="bus_reservation">
                                    <option selected value="no">NO need</option>
                                    <option value="yes">Yes, both ways(Rm80)</option>
                                </select>

                            </div>
                            <div class="chat-body">
                                <h5>Total Payment chat </h5>
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
                            <div class="radio">
                                <label for="offline"><input type="radio" required id="offline" value="offline"
                                                            name="payment_type">Offline</label>
                            </div>

                            <div class="radio">
                                <label for="online"><input type="radio" required id="online" value="online"
                                                           name="payment_type">Online</label>
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

