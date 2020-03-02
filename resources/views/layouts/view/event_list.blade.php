@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
                <h3>Events</h3>
            </div>
            <div class="row">
                @foreach($arrObjEvents as $objEvent)
                <div class="shadow card col-md-2 item-inner">
                     <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                            <div class="overlay">
                                <br><br>
                            </div>
                                  <h5 class="card-title"><strong>{{$objEvent->name}}</strong></h5>
                    <a class="btn btn-success btn-block" href="{{url('/event/register').'/'.$objEvent->id}}">Register</a>
                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </div>
@endsection

