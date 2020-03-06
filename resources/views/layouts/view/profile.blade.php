@extends('layouts.app')
@section('content')
    <div class="jumbotron">
     <div class="container text-center">
            <div class="profile-head">
            <h1>{{$objProfile->name}}</h1>
            <p>{{$objProfile->email}}</p>
<<<<<<< HEAD
            </div>
=======

>>>>>>> 3649ec1d3836f9416213e05fddd4551650cb6613
            <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#demo">See More</button>
            <div id="demo" class="collapse  text-center">
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
        <div class="row my-event">

            @foreach ($objUserProfilEvents as $item)
            <div class="shadow card col-md-3 item-inner text-center">
                <img src="{{ URL::to('/') }}/public/{{ $item->events->banner }}" class="card-img-top event-img" alt="">
               <div class="card-body">
                       <div class="overlay">
                           <br><br>
                       </div>
                   <h4 class="card-title"><strong>{{$item->events->name}}</strong></h4>
                    <h5 class="card-title"><strong>{{$item->events->description}}</strong></h5>
                    <h5 class="card-title"><strong>{{$item->events->event_date}}</strong></h5>

               </div>
           </div>
           @endforeach

        </div>
    </div>

@endsection
