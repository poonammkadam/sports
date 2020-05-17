@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- Upcoming Events -->
        @if(($arrObjUpcomingEvents->count()) > 0)
            <section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="container">
                    <div class="section-header">
                        <h2>Upcoming Events</h2>
                        <p>Here are some of our events</p>
                    </div>
                    <div class="row">
                        @foreach($arrObjUpcomingEvents as $objEvent)
                            <div class="col-lg-4 col-md-6">
                                <div class="speaker">
                                    <img src="{{$objEvent->banner}}" alt="Speaker 1" class="img-fluid">
                                    <div class="details">
                                        <h3>{{$objEvent->name}}</h3>
                                        <h4 class="text-white  mb-0"><i
                                                class="fa fa-map-marker mr-1">{{$objEvent->venue}}</i>
                                        </h4>
                                        <p>{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                    </div>
                                    <a href="{{'event/'.$objEvent->id}}" class="stretched-link"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    <!-- Events -->
        <section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="section-header">
                    <h2>Events</h2>
                    <p>Here are some of our events</p>
                </div>

                <div class="row">
                    @if(($arrObjCurrentEvents->count()) > 0)
                        @foreach($arrObjCurrentEvents as $objEvent)
                            <div class="col-lg-4 col-md-6">
                                <div class="speaker">
                                    <img src="{{$objEvent->banner}}" alt="Speaker 1" class="img-fluid">
                                    <div class="details">
                                        <h3>{{$objEvent->name}}</h3>
                                        <h4 class="text-white  mb-0"><i
                                                class="fa fa-map-marker mr-1">{{$objEvent->venue}}</i>
                                        </h4>
                                        <p>{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                    </div>
                                    <a href="{{'event/'.$objEvent->id}}" class="stretched-link"></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center"><h3>There are No events available at a moment</h3></div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Past Events -->
        @if(($arrObjPastEvents->count()) > 0)
            <section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="container">
                    <div class="section-header">
                        <h2>Closed Events</h2>
                        <p>Here are some of our events</p>
                    </div>

                    <div class="row">
                        @foreach($arrObjPastEvents as $objEvent)
                            <div class="col-lg-4 col-md-6">
                                <div class="speaker">
                                    <img src="{{$objEvent->banner}}" alt="Speaker 1" class="img-fluid">
                                    <div class="details">
                                        <h3>{{$objEvent->name}}</h3>
                                        <h4 class="text-white  mb-0"><i
                                                class="fa fa-map-marker mr-1">{{$objEvent->venue}}</i>
                                        </h4>
                                        <p>{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                    </div>
                                </div>
                                <a href="{{'event/'.$objEvent->id}}" class="stretched-link"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

