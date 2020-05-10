@extends('layouts.app')
@section('content')
    <div class="container top my-5">
        <div>
            <div class="row event-form-main">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 event-form">
                    @foreach($arrObjParticepent as $objPra)
                        <div class="shadow-lg p-5" style="background: white;">
                            <ul>
                                {{$objPra->t_shirt_size}}
                                <li><h5>Particepent Name :</h5>
                                    {{$objPra->profile->user->name}}</li>
                                <li><h5>Particepent Email :</h5>
                                    {{$objPra->profile->user->email}}</li>
                                <li><h5>Particepent Gender :</h5>
                                    {{$objPra->profile->gender}}</li>
                                <li><h5>Particepent Full Name :</h5>
                                    {{$objPra->profile->first_name}} {{$objPra->profile->last_name}}</li>
                                <li><h5>Particepent Local Id :</h5>
                                    {{$objPra->profile->local_id}}</li>
                                <li><h5>Particepent Passport No. :</h5>
                                    {{$objPra->profile->passport}}</li>
                                <li><h5>Particepent DOB :</h5>
                                    {{$objPra->profile->date_of_birth}}</li>
                                <li><h5>Particepent Mobile No. :</h5>
                                    {{$objPra->profile->mobile_no_primary}}</li>
                                <li><h5>Particepent Address :</h5>
                                    {{$objPra->profile->address}}</li>
                                <li><h5>Particepent T-shirt Size :</h5>{{$objPra->t_shirt_size}}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
    </div>
@endsection
