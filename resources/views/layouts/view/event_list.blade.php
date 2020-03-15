@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Events</h3>
            </div>
            <div class="row">
                @foreach($arrObjEvents as $objEvent)
                @if( date('Y-m-d', strtotime($objEvent->registration_end_date)) > date('Y-m-d'))

                <div class="shadow card  item-inner" style="width:220px">
                    <img class="card-img-top" src="{{asset('images/img3.jpeg')}}"  style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title ellipsis">{{$objEvent->name}}</h4>
                      <p class="card-text">Registration will Close :-{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                      @if(auth()->user()->role != 'organizar')
                      <a href="{{url('/event/register').'/'.$objEvent->id}}" class="btn btn-primary stretched-link">Register</a>
                      @endif
                    </div>
                  </div>
                @else

                <div class="shadow card  item-inner" style="width:220px">
                    <img class="card-img-top" src="{{asset('images/img3.jpeg')}}"  data-toggle="tooltip" title="registertion close" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">{{$objEvent->name}}</h4>
                      <p class="card-text">Registration Close :-{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                      @if(auth()->user()->role != 'organizar')
                      <a href="{{url('/event/register').'/'.$objEvent->id}}" disabled='disabled' data-toggle="tooltip" title="registertion close" class="btn btn-primary stretched-link">Register</a>
                      @endif
                    </div>
                  </div>

               @endif
                @endforeach
              </div>
        </div>
    </div>
@endsection

