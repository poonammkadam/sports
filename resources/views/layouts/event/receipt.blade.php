
@extends('layouts.app')
@section('content')

    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Participation</h3>
            </div>
            <form id="event_submit" method="POST" action="{{url('event/register')}}" autocomplete="off">
                @csrf
                <input type="hidden" name="event_id" value="{{$objEvent->id}}">
                <h2>{{$objEvent->name}}</h2>
                <br>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <select class="form-control custom-select" name="event_category" id="category">
                                <option>Select event</option>
                                @foreach($objEvent->category as $index => $prate)
                                    <option class="cate"
                                            data-price={{$prate->amount}} value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Fee</label>
                    <input type="hidden" value="" id="exampleFormControlInput1" name="fee">
                    <h6>B$ <span id="price">--</span></h6>
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
                    <div class="demo-container">
                        <div class="card-wrapper"></div>
                        <div class="form-row mt-5">
                            <div class="form-group col-md-6">
                                <input class="form-control" placeholder="Card number" type="tel" name="number">
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
@endsection

