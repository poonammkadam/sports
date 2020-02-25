@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Events</h3>
            </div>
            <div class="row">
                @foreach($arrObjEvents as $objEvent)
                <div class="col-md-3 item-inner">
                    <div class="events-item">
                        <div class="events-image">
                            <img src="" alt="">
                            <div class="overlay"><a class="btn btn-success btn-block" href="{{url('/event/register').'/'.$objEvent->id}}">Register</a>
                                <br><br>
                            </div>
                        </div>
                        <p></p>
                        <h5><strong>{{$objEvent->name}}</strong></h5>
                            <br><br>
                      </div>
                </div><!--/.col-md-3-->
                @endforeach
              </div>
        </div>
    </div>
@endsection

