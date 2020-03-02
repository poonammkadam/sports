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

                    <div class="row">
                        <div>
                            <input type="text" id="cc-number" required="required" placeholder="CARD NUMBER">
                            <span id="show-cc-label"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <input type="text" id='cc-expiration' required="required" placeholder="VALID THRU">
                        </div>
                        <div class="col-2">
                            <input type="text" id="cc-cvv" required="required" placeholder="CVV">
                            <i class="i-icon-payment i-icon-cvv2"></i>
                        </div>
                    </div>
                    <div class="last-row">
                        <div>
                            <input type="text" id="cc-name" required="required" placeholder="NAME">
                        </div>
                    </div>
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
    #credit-card label{margin-right:5px;}
    #credit-card input {
        padding:8px 11px;
        border:1px solid #d5d9da;
        box-shadow: 0 0 5px #e8e9eb inset;
        width: 100%;
        font-size:1em;
        margin-right: 5px;
    }
    #cc-number {
        width: 330px !important;
    }
    #cc-name {
        width: 330px !important;
    }
    #result{margin-left:5px;}
    .row {
        display: flex;
        margin-bottom: 15px;
    }
    .last-row {
        display: flex;
    }
    .col-1 {
        width: 47%;
    }
    .col-2 {
        width: 45%;
    }
    .full-width {
        width: 100%;
    }
    #cc-expiration {
        width: 80% !important;
    }
    .i-icon-cvv2 {
        position: absolute;
        right: 30px;
        margin-top: -33px;
    }
    .i-icon-card-num{
        width: 49px;
        height: 30px;
        background-position: 6px -69px;
        position: absolute;
        right: 32px;
        top: 23px;
    }

    #show-cc-label {
        position: absolute;
        right: 30px;
        margin-top: 2px;
    }
</style>
@endsection

