@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" ">
                    <div class="card-header"><h1>Events View</h1></div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-4"><b> Event Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Description:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->description}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organiser_name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Contact No:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organiser_contact_number}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Address:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organiser_address}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Venue:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->venue}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Date:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->event_date}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Registration End Date:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->registration_end_date}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Upload Receipt</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->registration_end_date}}</div>
                        </div>

                        <form enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

