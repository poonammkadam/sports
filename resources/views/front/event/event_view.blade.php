@extends('layouts.app')
@section('content')
    <div class="container top my-5">
        <div class="title section-header text-center">
            <h2>{!! $objEvent->name !!}</h2>
        </div>
        <div class="">
            <div class="banner text-center">
                <img src="{{'/public/'.$objEvent->banner}}" style="max-height:300px" class="w-100">
            </div>
        </div>

        <div class="description my-5 section-description">
            <div>{!! $objEvent->description !!}</div>
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
    <script>
        $(document).on('click', '.collapsible-item-heading .collapsible-item-title-link', function (event) {
            this.collapse('toggle')
        })

    </script>

    <style>
        .panel-heading a:nth-child(2):hover {
            text-decoration: none;
            background-color: #55acee;
            color: #ffffff;
        }

        .panel-group .panel {
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            border: none;
        }

        .panel-group .panel {
            margin-bottom: 0;
            overflow: hidden;
            border-radius: 4px;
        }

        .panel-default {
            border-color: #ddd;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .panel-default > .panel-heading {
            padding: 0;
            outline: none;
            border: none;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -o-border-radius: 0;
            border-radius: 0;
            width: 100%;
        }

        .panel-group .panel-heading {
            border-bottom: 0;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        .panel-heading a:nth-child(2).collapsed {
            color: #ffffff;
            background-color: #333333;
        }

        .panel-heading a:nth-child(2) {
            font-weight: 400;
            padding: 12px 35px 12px 15px;
            display: inline-block;
            width: 100%;
            background-color: #55acee;
            color: #ffffff;
            position: relative;
            text-decoration: none;
        }
    </style>
@endsection
