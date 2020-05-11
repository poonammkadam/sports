@extends('layouts.app')
@section('content')
    <?php
    $objCountries = new \PragmaRX\Countries\Package\Countries();
    $arrCountries = $objCountries->all()->pluck('name.common');
    ?>
    <div class="container main-body my-3">
        @if (session('alert'))
            <div class="alert alert-info">
                {{ session('alert') }}
            </div>
        @endif
        <div class="form-body">
            <div class="text-left">
                <h2>Basic Information</h2>
            </div>
            <form method="POST" autocomplete="off" action="/profile/update">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Email</label>
                        <input required type="email" name="email" value="{{auth()->user()->email}}" class="form-control"
                               id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5">
                        <label for="inputAddress">Local Name</label>
                        <input required type="text" name="local_name" value="{{auth()->user()->name}}"
                               class="form-control"
                               id="inputAddress" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputAddress">First Name</label>
                        <input required type="text" value="{{$objProfile->first_name}}" name="first_name"
                               class="form-control"
                               id="inputAddress"
                               placeholder="">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5">
                        <label for="inputAddress2">Last Name</label>
                        <input required type="text" value="{{$objProfile->last_name}}" name="last_name"
                               class="form-control"
                               id="inputAddress2"
                               placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputAddress">DOB</label>
                        <input required type="date" value="{{$objProfile->date_of_birth}}" class="form-control"
                               name="dob"
                               id="inputAddress" placeholder="">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5">
                        <label for="inputAddress2">Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required type="radio" name="gender" id="inlineRadio1"
                                   value="male">
                            <label class="form-check-label ml-0" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required type="radio" name="gender" id="inlineRadio2"
                                   value="female">
                            <label class="form-check-label ml-0" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required type="radio" name="gender" id="inlineRadio3"
                                   value="others">
                            <label class="form-check-label ml-0" for="inlineRadio3">other</label>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputAddress">Nationality</label>
                        <select class="form-control custom-select" name="nationality"
                                value="{{$objProfile->country}}">
                            <option selected>Open this select menu</option>
                            @foreach($arrCountries as $objCountries)
                                <option value="{{$objCountries}}">{{$objCountries}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5">
                        <label for="inputAddress2">Local ID</label>
                        <input required type="text" class="form-control" name="local_id" id="inputAddress2"
                               value="{{$objProfile->local_id}}" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="tshirt">T-shirt size</label>
                        <select id="tshirt" class="form-control custom-select" name="t_shirt_size"
                                value="{{$objProfile->t_shirt_size}}">
                            <option selected>Open this select menu</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5">
                        <label for="inputAddress2">Passport</label>
                        <input required type="text" class="form-control" value="{{$objProfile->passport}}"
                               name="passport_no" id="inputAddress2"
                               placeholder="Passport ID">
                    </div>

                </div>
                <h2 class="mt-4">Contact Information</h2>
                <div class="form-row">

                    <div class="form-group col-md-5">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1"
                                  rows="3">{{$objProfile->address}}</textarea>
                    </div>
                    <div class="col-md-2"></div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputAddress2">Mobile phone</label>
                        <input required type="tel" name="mobile_no" class="form-control" id="inputAddress2"
                               value="{{$objProfile->mobile_no_primary}}" placeholder="with country code">
                    </div>
                </div>
                <button required type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
