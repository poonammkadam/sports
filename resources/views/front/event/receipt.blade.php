@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" ">
                    <div class="card-header"><h1>Events View</h1></div>

                    <div class="card-body">

                        <div class="row">
                            <div class="banner">
                                <img src="{{'/public/'.$objParticipants->events->banner}}" style="max-height:400px"
                                     class="w-100">
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-4"><b> Event Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->name}}</div>
                        </div>

                        {{--                        <div class="row m-2">--}}
                        {{--                            <div class="col-4"><b> Event Description:</b></div>--}}
                        {{--                            <div class="col-1"></div>--}}
                        {{--                            <div class="col-7">{{$objParticipants->events->description}}</div>--}}
                        {{--                        </div>--}}

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organisation->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Contact No:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organisation->contact_no}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Address:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->organisation->address}}</div>
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

                        @if($objParticipants->racekit_price == 'yes')
                            <div class="row m-2">
                                <div class="col-4"><b> Racekit Price:</b></div>
                                <div class="col-1"></div>
                                <div class="col-7">B$ {{$objParticipants->events->racekit}}</div>
                            </div>
                        @endif

                        @if(null !=$objParticipants->getaccom)
                            <div class="row m-2">
                                <div class="col-4"><b> Accomodation:</b></div>
                                <div class="col-1"></div>
                                <div class="col-7">B$ {{$objParticipants->getaccom->price}}</div>
                            </div>
                        @endif

                        @if($objParticipants->getstart)
                            <div class="row m-2">
                                <div class="col-4"><b> Pickup Location(Before Race):</b></div>
                                <div class="col-1"></div>
                                <div class="col-7">B$ {{$objParticipants->getstart->price}}</div>
                            </div>
                        @endif

                        @if($objParticipants->getend)
                            <div class="row m-2">
                                <div class="col-4"><b> Pickup Location(After Race) :</b></div>
                                <div class="col-1"></div>
                                <div class="col-7">B$ {{$objParticipants->getend->price}}</div>
                            </div>
                        @endif

                        <div class="row m-2">
                            <div class="col-4"><b> Upload Receipt</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">
                                <form enctype="multipart/form-data" method="post"
                                      action="{{url('event/receipt/upload/'.$objParticipants->id)}}">
                                    @csrf
                                    <input type="file" class="form-control-file m-0 p-0" name="receipt"
                                           id="exampleFormControlFile1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

