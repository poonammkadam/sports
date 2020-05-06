@extends('layouts.app')
@section('content')
    {{--    <div class="jumbotron">--}}
    {{--        <div class="container text-center">--}}
    {{--            <div class="profile-head">--}}
    {{--                <h1>{{$objProfile->name}}</h1>--}}
    {{--                <p>{{$objProfile->email}}</p>--}}
    {{--            </div>--}}
    {{--            <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#demo">See More--}}
    {{--            </button>--}}
    {{--            <div id="demo" class="collapse  text-center">--}}
    {{--                <div class="profile-data"><h4>First Name :{{$objUserProfile->first_name}}</h4></div>--}}
    {{--                <div class="profile-data"><h4>Last Name : {{$objUserProfile->last_name}}</h4></div>--}}
    {{--                <div class="profile-data"><h4>Gender :{{$objUserProfile->gender}}</h4></div>--}}
    {{--                <div><h2>Contact Info</h2>--}}
    {{--                    <div class="profile-data"><h4>My Mobile Number : {{$objUserProfile->mobile_no_primary}}</h4></div>--}}
    {{--                    <div class="profile-data"><h4>My Country :{{$objUserProfile->country}}</h4></div>--}}
    {{--                    <div class="profile-data"><h4>My Address :{{$objUserProfile->address}}</h4></div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="card">
        <h5 class="card-header">
        </h5>
        <div class="card-body">
            <div class="section-header">
                <h2>{{$objProfile->name}}</h2>
                <p>{{$objProfile->email}}</p>

                <div class="card-text">
                    <div id="demo" class="text-center">
                        <div class="profile-data "><h4>First Name
                                :{{$objUserProfile->first_name}}</h4></div>
                        <div class="profile-data "><h4>Last Name
                                : {{$objUserProfile->last_name}}</h4></div>
                        <div class="profile-data"><h4>Gender
                                :{{$objUserProfile->gender}}</h4></div>
                        <div>
                            <h3>Contact Info</h3>
                            <div class="profile-data"><h4>My Mobile Number : {{$objUserProfile->mobile_no_primary}}</h4>
                            </div>
                            @if($objUserProfile->country)
                                <div class="profile-data"><h4>My Country :{{$objUserProfile->country}}</h4></div>@endif
                            @if($objUserProfile->address)
                                <div class="profile-data"><h4>My Address :{{$objUserProfile->address}}</h4></div>@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header">
                <h2>Events</h2>
                <p>Here are some of our events</p>
            </div>

            <div class="row">
                @if(($objUserProfileEvents->count()) > 0)
                    @foreach($objUserProfileEvents as $objEvent)
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="{{'public/'.$objEvent->events->banner}}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3>{{$objEvent->events->name}}</h3>
                                    <h4 class="text-white  mb-0"><i
                                            class="fa fa-map-marker mr-1">{{$objEvent->events->venue}}</i>
                                    </h4>
                                    <p>{{  date('l j F Y', strtotime($objEvent->events->registration_end_date))}}</p>
                                    <a href="{{'event/'.$objEvent->events->id}}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center"><h3>There are No events available at a moment</h3></div>
                @endif
            </div>
        </div>
    </section>
@endsection
