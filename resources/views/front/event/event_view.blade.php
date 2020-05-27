@extends('layouts.app')
@section('content')
    <div class="container top my-5">
        <div class="title section-header text-center">
            <h2>{!! $objEvent->name !!}</h2>
        </div>
        <div class="">
            <div class="banner text-center">
                <img src="/{{$objEvent->banner}}" style="max-height:500px" class="w-100">
            </div>
        </div>

        <div class="description my-5 section-description">
            <div>{!! $objEvent->description !!}</div>
            @if(auth()->check() && !auth()->user()->isOrganiser())
                @if( date('Y-m-d', strtotime($objEvent->registration_start_date)) <= date('Y-m-d') && date('Y-m-d', strtotime($objEvent->registration_end_date)) >= date('Y-m-d'))
                    <a href="{{url('/event/register').'/'.$objEvent->id}}"
                       class="btn btn-primary btn-lg">Register</a>

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
        $(document).on('click', '.collapsible-item-heading', function (event) {
            let ariaId = event.currentTarget.id;
            $('[aria-labelledby="' + ariaId + '"]').toggleClass('show');
        })
    </script>
    <style>
        .collapsible-item-collapse img {
            max-width: 80%;
        }

        .panel-heading {
            border: none;
            padding: 15px;
            background: #0b1126;
            color: #fff;
        }

        .panel {
            margin: 0px;
            border: 0px
        }

        .panel-default > .panel-heading {
            background: #0b1126 !important;
            color: #fff !important;
        }
    </style>

@endsection
