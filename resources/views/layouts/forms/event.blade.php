@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Parti</h3>
            </div>
            <form method="POST" autocomplete="off" action="/profile/update">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Select Event</label>
                        <select class="form-control custom-select" name="event_id">
                            <option selected>Open this select menu</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                            <option value="3">c</option>
                        </select>
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

