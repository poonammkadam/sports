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
                        <input id="column-left" type="text" name="cardholder_name" placeholder="Cardholder Name"/>
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
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,900,700,500);

    .card-wrapper {
        width: 100%;
        display: flex;

    }
    .personal-information {
        background-color: #3C8DC5;
        color: #fff;
        padding: 1px 0;
        text-align: center;
    }
    h1 {
        font-size: 1.3em;
    }
    input {
        margin: 1px 0;
        padding-left: 3%;
        font-size: 14px;
    }
    input[type="text"]{
        display: block;
        height: 50px;
        width: 97%;
        border: none;
    }
    input[type="email"]{
        display: block;
        height: 50px;
        width: 97%;
        border: none;
    }
    #column-left {
        width: 46.8%;
        float: left;
        margin-bottom: 2px;
    }
    #column-right {
        width: 46.8%;
        float: right;
    }

    @media only screen and (max-width: 480px){
        input {
            font-size: 1em;
        }
        #input-button {
            width: 100%;
        }
        #input-field {
            width: 96.5%;
        }
        h1 {
            font-size: 1.2em;
        }
        input {
            margin: 2px 0;
        }
        input[type="submit"]{
            height: 50px;
        }
        #column-left {
            width: 96.5%;
            display: block;
            float: none;
        }
        #column-right {
            width: 96.5%;
            display: block;
            float: none;
        }
    }
</style>
@endsection

