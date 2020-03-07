@extends('layouts.app')
@section('content')

    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Participation</h3>
            </div>
            <form method="POST" id="credit-card" action="{{url('event/register')}}" autocomplete="off" >
                @csrf
                <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                <h2>{{$objEvent->name}}</h2>
                <br>
                <select class="form-control custom-select" name="event_category" id="category">
                    <option>Select event</option>
                @foreach($objEvent->category as $index => $prate)
                        <option class="cate" data-price={{$prate->amount}} value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                 @endforeach
                </select>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Fee</label>
                    <input type="hidden" value="" id="exampleFormControlInput1" name="fee">
                    <h6>B$ <span id="price">--</span> </h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Organizer</label>
                    <h6>{{$objEvent->organiser_name}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Number</label>
                    <h6>{{$objEvent->organiser_contact_number}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Date</label>
                    <h6>{{$objEvent->event_date}}</h6>
                </div>


                <div class="radio">
                    <label for="offline"><input type="radio" required id="offline" value="offline" name="payment_type">Offline</label>
                </div>

                <div class="radio">
                    <label for="online"><input type="radio" required id="online" value="online" name="payment_type">Online</label>
                </div>

                <div class="payment-online" style="display: none">
                    <div class="form-container">
                        <div class="personal-information">
                            <h1>Payment Information</h1>
                        </div>
                        <label for="column-left1"></label><input id="column-left1" type="text" name="cardholder_name" placeholder="Cardholder Name"/>
                        <label for="input-field"></label><input id="input-field"  type="text" name="cardholder_number" placeholder="Card Number"/>
                        <label for="column-left"></label><input id="column-left"  type="text" name="cardholder_expiry" placeholder="MM / YY"/>
                        <label for="column-right"></label><input id="column-right"  type="text" name="cardholder_cvc" placeholder="CCV"/>
                        <div class="card-wrapper"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
    <script>
        $("#category").on('change', function(){
            let str = "";
            $( "select option:selected" ).each(function() {
                str += $( this ).data('price') + " ";
            });
            $('#price').html(str)
            $('input[name="fee"]').val(str)
        });

        $('#online').on('click', function()
            {
                $('.payment-online').css('display', 'block')
            }
        )

        $('#offline').on('click', function()
            {
                $('.payment-online').css('display', 'none')
            }
        )
    </script>

<style>

</style>
@endsection

