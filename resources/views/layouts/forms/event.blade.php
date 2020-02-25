@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Parti</h3>
            </div>
            <form method="POST" autocomplete="off" action="/profile/update">
                @csrf
                {{$objEvent->name}}
                <br>
                {{$objEvent->event_type}}
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Select Event</label>
{{--                        <select class="form-control custom-select" name="event_name">--}}
{{--                            @foreach($objEvent-> as $objEvent)--}}
{{--                                <option value="{{$objEvent->id}}">{{$objEvent->name}}</option>--}}
{{--                           @endforeach--}}
{{--                        </select>--}}
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Fee</label>
                    <h6>400</h6>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Organizer</label>
                    <h6>xyz</h6>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Date</label>
                    <h6>26-</h6>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

