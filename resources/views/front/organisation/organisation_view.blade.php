@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container text-center">
            <div class="profile-head">
                <h1>{{$objOrganisation->name}}</h1>
                <p>{{auth()->user()->email}}</p>
            </div>
            <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#demo">See More
            </button>
            <div id="demo" class="collapse  text-center">
                <div>
                    <div class="profile-data">
                        <h4><strong>About : </strong>{{$objOrganisation->about}}</h4>
                    </div>
                    <div class="profile-data">
                        <h4><strong>Address : </strong>{{$objOrganisation->address}}</h4>
                    </div>
                    <div class="profile-data">
                        <h4><strong>Contact Number : </strong>{{$objOrganisation->contact_no}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-3 text-center">
        <h3>My Events</h3><br>
        <div class="row my-event">
            @foreach ($objOrganisation->events as $item)
                <div class="shadow card col-md-3 item-inner text-center">
                    <a href="{{url('/event/view/'.$item->id)}}"> <img
                            src="{{ URL::to('/') }}/public/{{ $item->banner }}" class="card-img-top event-img" alt="">
                        <div class="card-body">
                            <div class="overlay">
                                <br><br>
                            </div>
                            <h4 class="card-title"><strong>{{$item->name}}</strong></h4>
                            <h5 class="card-title"><strong>{{$item->event_date}}</strong></h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
