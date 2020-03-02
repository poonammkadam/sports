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
                    <h6 id="price">-</h6>
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

                <div class="payment-online">
                    <div class="form-container">
                        <div class="personal-information">
                            <h1>Payment Information</h1>
                        </div> <!-- end of personal-information -->
        
                        <input id="column-left" type="text" name="first-name" placeholder="First Name"/>
                        <input id="column-right" type="text" name="last-name" placeholder="Surname"/>
                        <input id="input-field" type="text" name="number" placeholder="Card Number"/>
                        <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
                        <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
        
                        <div class="card-wrapper"></div>
        
                        <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="on" maxlength="45" placeholder="Streed Address"/>
                        <input id="column-left" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="City"/>
                        <input id="column-right" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="ZIP code"/>
                        <input id="input-field" type="email" name="email" required="required" autocomplete="on" maxlength="40" placeholder="Email"/>
                        <input id="input-button" type="submit" value="Submit"/>
                </div>

                <div class="payment-offline">

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
        });

        $(document).ready(function() {

        });
    </script>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,900,700,500);
    
    body {
        padding: 60px 0;
        background-color: rgba(178,209,229,0.7);
        margin: 0 auto;
        width: 600px;
    }
    .body-text {
        padding: 0 20px 30px 20px;
        font-family: "Roboto";
        font-size: 1em;
        color: #333;
        text-align: center;
        line-height: 1.2em;
    }
    .form-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .card-wrapper {
        background-color: #6FB7E9;
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
        font-family: "Roboto"
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
    input[type="submit"]{
        display: block;
        height: 60px;
        width: 100%;
        border: none;
        background-color: #3C8DC5;
        color: #fff;
        margin-top: 2px;
        curson: pointer;
        font-size: 0.9em;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
    }
    input[type="submit"]:hover{
        background-color: #6FB7E9;
        transition: 0.3s ease;
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
        body {
            width: 100%;
            margin: 0 auto;
        }
        .form-container {
            margin: 0 2%;
        }
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

