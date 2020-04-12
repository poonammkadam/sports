@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Events View</div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-4"><b> Event Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Description:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->description}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
