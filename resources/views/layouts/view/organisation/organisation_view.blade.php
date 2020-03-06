@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <div class="container text-center">
            <div class="profile-head">
                <h1>organisation name</h1>
                <p>email id</p>
            </div>
            <button type="button" class="btn btn-outline-dark" data-toggle="collapse" data-target="#demo">See More</button>
            <div id="demo" class="collapse  text-center">
                <div>
                    <div class="profile-data"><h4>Description</h4></div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid bg-3 text-center">
        <h3>My Events</h3><br>
        <div class="row my-event">
        
{{--            @foreach ($objUserProfilEvents as $item)--}}
                <div class="shadow card col-md-3 item-inner text-center">
                    <img src="{{asset('images/img1.jpeg')}}" class="card-img-top event-img" alt="">
                    <div class="card-body">
                        <div class="overlay">
                            <br><br>
                        </div>
                        <h4 class="card-title"><strong>Event one</strong></h4>
                        <h5 class="card-title"><strong>On 26-03-2020</strong></h5>
                    
                    </div>
                </div>
            <div class="shadow card col-md-3 item-inner text-center">
                <img src="{{asset('images/img2.jpg')}}" class="card-img-top event-img" alt="">
                <div class="card-body">
                    <div class="overlay">
                        <br><br>
                    </div>
                    <h4 class="card-title"><strong>Event one</strong></h4>
                    <h5 class="card-title"><strong>On 26-03-2020</strong></h5>
        
                </div>
            </div>
            <div class="shadow card col-md-3 item-inner text-center">
                <img src="{{asset('images/img2.jpg')}}" class="card-img-top event-img" alt="">
                <div class="card-body">
                    <div class="overlay">
                        <br><br>
                    </div>
                    <h4 class="card-title"><strong>Event one</strong></h4>
                    <h5 class="card-title"><strong>On 26-03-2020</strong></h5>
                </div>
            </div>
            <div class="shadow card col-md-3 item-inner text-center">
                <img src="{{asset('images/img1.jpeg')}}" class="card-img-top event-img" alt="">
                <div class="card-body">
                    <div class="overlay">
                        <br><br>
                    </div>
                    <h4 class="card-title"><strong>Event one</strong></h4>
                    <h5 class="card-title"><strong>On 26-03-2020</strong></h5>
        
                </div>
            </div>

{{--            @endforeach--}}
        
        </div>
    </div>

@endsection
