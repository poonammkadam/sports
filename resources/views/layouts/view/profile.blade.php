@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container text-center">
            <h1>{{$objProfile->name}}</h1>
            <p>{{$objProfile->email}}</p>
{{--            {{dd($objUserProfile)}}--}}
            <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#demo">See More</button>
            <div id="demo" class="collapse">
                <div class="profile-data"><h4>First Name :{{$objUserProfile->first_name}}</h4></div>
                <div class="profile-data" ><h4>Last Name : {{$objUserProfile->last_name}}</h4></div>
                <div class="profile-data"><h4>Gender :{{$objUserProfile->gender}}</h4></div>
                <div><h2>Contact Info</h2>
                <div class="profile-data"><h4>My Moblie Number : {{$objUserProfile->mobile_no_primary}}</h4></div>
                <div class="profile-data"><h4>My Country :{{$objUserProfile->country}}</h4></div>
                <div class="profile-data"><h4>My Address :{{$objUserProfile->address}}</h4></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-3 text-center">
        <h3>My Participant Events</h3><br>
        <div class="row">
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
        </div>
    </div><br>

    <div class="container-fluid bg-3 text-center">
        <div class="row">
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-3">
                <p>Some text..</p>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            </div>
        </div>
    </div><br><br>

@endsection
