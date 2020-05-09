@extends('layouts.app')
@section('content')
    <div class="container top my-5">
        <div class="row">
            <div class="banner text-center">
                <img src="{{'/public/'.$objEvent->banner}}" style="max-height:300px" class="w-100">
            </div>
        </div>
        <div class="title section-header text-center">
            <h2>{!! $objEvent->name !!}</h2>
        </div>
        <div class="description section-description text-center">
            <h2>{!! $objEvent->description !!}</h2>
            @if(auth()->check() && !auth()->user()->isOrganiser())
                @if( date('Y-m-d', strtotime($objEvent->registration_start_date)) <= date('Y-m-d') && date('Y-m-d', strtotime($objEvent->registration_end_date)) >= date('Y-m-d'))
                    <a href="{{url('/event/register').'/'.$objEvent->id}}"
                       class="btn btn-outline-danger btn-lg">Register</a>

                @elseif(date('Y-m-d', strtotime($objEvent->registration_end_date)) < date('Y-m-d'))
                    <div class="title section-header text-center">
                        <h4>Sorry Resgistration closed</h4>
                    </div>
                @else
                    <div class="title section-header text-center">
                        <h4>Resgistation will open
                            at {{  date('l j F Y', strtotime($objEvent->registration_start_date))}}</h4>
                    </div>
                @endif
            @endif
            @if(auth()->check() && auth()->user()->isOrganiser())
                <h3>Event Category List</h3>
                @if(isset($objOrganisation) && $objOrganisation->id == $objEvent->org_id )
                    <ul>
                        @foreach($objEvent->category as $objCategory)
                            <li><h5>{{$objCategory->category_type}}{{$objCategory->category_subtype}}</h5><a
                                    href="{{'/org/participants/list/'.$objEvent->id.'/'.$objCategory->id}}"
                                    class="btn btn-outline-danger btn-lg mb-5"> View Participants list ->></a></li>
                        @endforeach
                    </ul>
                @endif
            @endif
        </div>
    </div>
@endsection
