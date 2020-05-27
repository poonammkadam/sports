@extends('admin.admin_template')
@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Events View</div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-4"><b> Event Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->name}}</div>
                        </div>

                        {{--                        <div class="row m-2">--}}
                        {{--                            <div class="col-4"><b> Event Description:</b></div>--}}
                        {{--                            <div class="col-1"></div>--}}
                        {{--                            <div class="col-7">{!! $objEvent->description !!}</div>--}}
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

                        @if($objParticipants->events->organisation->address)
                            <div class="row m-2">
                                <div class="col-4"><b> Organiser Address:</b></div>
                                <div class="col-1"></div>
                                <div class="col-7">{{$objParticipants->events->organisation->address}}</div>
                            </div>
                        @endif
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
                            <div class="col-4"><b> Category:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objParticipants->events->registration_end_date}}</div>
                        </div>

                        <h4 class="text-center">Payment Structure</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Services</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Category</td>
                                <td>{{$objParticipants->category->category_subtype}}{{$objParticipants->category->category_type}}</td>
                                <td>B$ {{$objParticipants->ticket->fee}} </td>
                            </tr>
                            @php
                                $total=0;
                                $total=$objParticipants->ticket->fee;
                            @endphp

                            @if($objParticipants->getaccom)
                                <tr>
                                    <td>Accomodation</td>
                                    <td>{{$objParticipants->getaccom->name}}</td>
                                    <td>{{$objParticipants->getaccom->price}}</td>
                                </tr>
                                @php
                                    $total+=$objParticipants->getaccom->price;
                                @endphp
                            @endif
                            @if($objParticipants->getstart)
                                <tr>
                                    <td>Pickup Location(Before Race)</td>
                                    <td>{{$objParticipants->getstart->location}}</td>
                                    <td>{{$objParticipants->getstart->price}}</td>
                                </tr>
                                @php
                                    $total+=$objParticipants->getstart->price;
                                @endphp
                            @endif
                            @if($objParticipants->getend)
                                <tr>
                                    <td>Pickup Location(After Race)</td>
                                    <td>{{$objParticipants->getend->location}}</td>
                                    <td>{{$objParticipants->getend->price}}</td>
                                </tr>
                                @php
                                    $total+=$objParticipants->getend->price
                                @endphp
                            @endif
                            @if($objParticipants->racekit_price)
                                <tr>
                                    <td>RaceKit Price</td>
                                    <td>Yes</td>
                                    <td>{{$objParticipants->racekit_price}}</td>
                                </tr>
                                @php
                                    $total+=$objParticipants->racekit_price
                                @endphp
                            @endif
                            <tr>
                                <td colspan="2"><b>Total</b></td>
                                <td>B${{$total}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
