@extends('layouts.app')
@section('content')
    <div class="container top my-5">
        <div class="row">
            <div class="banner">
                <img src="{{'/public/'.$objEvent->banner}}" style="max-height:400px" class="w-100">
            </div>
        </div>
        <div class="title section-header">
            <h2>{!! $objEvent->name !!}</h2>

            <p> {!! $objEvent->banner !!}</p>
            <a href="{{url('/event/register').'/'.$objEvent->id}}"
               class=" btn btn-primary stretched-link">Register</a>
        </div>
    </div>
@endsection
