@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Events</h3>
            </div>
            <div class="row">
                @foreach($arrObjEvents as $objEvent)
                <div class="shadow card col-md-2 item-inner">
                     <img src="{{asset('images/img3.jpeg')}}" class="card-img-top" alt="">
                    <div class="card-body">
                            <div class="overlay">
                                <br><br>
                            </div>
                                  <h5 class="card-title"><strong>{{$objEvent->name}}</strong></h5>
                        @if(auth()->user()->role != 'organizar')
                    <a class="btn btn-success btn-block" href="{{url('/event/register').'/'.$objEvent->id}}">Register</a>
                            @endif
                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </div>
@endsection

