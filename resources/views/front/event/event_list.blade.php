@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="text-center">
            <h3>Events</h3>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @if(($arrObjEvents->count())>0)
                @foreach($arrObjEvents as $objEvent)
                    @if( date('Y-m-d', strtotime($objEvent->registration_end_date)) >= date('Y-m-d') && date('Y-m-d', strtotime($objEvent->registration_start_date)) < date('Y-m-d'))
                        <div class="col-sm-12 col-md-4 mb-5">
                            <div id="list-card" class="shadow-lg  bg-white rounded card "
                            >
                                <img class="card-img-top" src="{{asset('images/img3.jpeg')}}">
                                <div class="card-body">
                                    <h4 class="card-title ellipsis">{{$objEvent->name}}</h4>
                                    <p class="card-text">Registration will Close
                                        :-{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <h1> There is no event available to register. </h1>
            @endif
        </div>
        <div class="row">

            <h2 class="pagetitle"><span>Comming soon..</span></h2>
            @if(($arrObjEvents->count())>0)
                @foreach($arrObjEvents as $objEvent)
                    @if( date('Y-m-d', strtotime($objEvent->registration_start_date)) > date('Y-m-d'))
                        <div class="shadow-lg  mb-5 bg-white rounded card  item-inner" style="width:220px">
                            <img class="card-img-top" src="{{asset('images/img3.jpeg')}}" data-toggle="tooltip"
                                 title="registertion close" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$objEvent->name}}</h4>
                                <p class="card-text">Registration Close
                                    :-{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                @if(auth()->user()->role != 'organiser')
                                    <a href="{{url('/event/register').'/'.$objEvent->id}}" disabled='disabled'
                                       data-toggle="tooltip" title="registertion close"
                                       class="btn btn-primary stretched-link">Register</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <h1> There is no event available to register. </h1>
            @endif

        </div>
        <div class="row">

            <h2 class="pagetitle"><span>Closed Events</span></h2>
            @if(($arrObjEvents->count())>0)
                @foreach($arrObjEvents as $objEvent)
                    @if( date('Y-m-d', strtotime($objEvent->registration_end_date)) < date('Y-m-d'))
                        <div class="shadow-lg  mb-5 bg-white rounded card  item-inner" style="width:220px">
                            <img class="card-img-top" src="{{asset('images/img3.jpeg')}}" data-toggle="tooltip"
                                 title="registertion close" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title">{{$objEvent->name}}</h4>
                                <p class="card-text">Registration Close
                                    :-{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                @if(auth()->user()->role != 'organiser')
                                    <a href="{{url('/event/register').'/'.$objEvent->id}}" disabled='disabled'
                                       data-toggle="tooltip" title="registertion close"
                                       class="btn btn-primary stretched-link">Register</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>


    </div>
@endsection

