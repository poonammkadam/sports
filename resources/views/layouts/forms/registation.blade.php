@extends('layouts.app')
@section('content')
    <div class="container main-body">
        <div class="form-body">
            <div class="text-center">
                <h3>Basic Information</h3>
            </div>
            <form method="POST" autocomplete="off" action="/profile/update">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input required  type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Local Name</label>
                        <input required  type="text" name="local_name" class="form-control" id="inputAddress" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">First Name</label>
                        <input required  type="text" name="first_name" class="form-control" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Last Name</label>
                        <input required  type="text" name="last_name" class="form-control" id="inputAddress2"
                               placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">DOB</label>
                        <input required  type="date" class="form-control" name="dob" id="inputAddress" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio1"
                                   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio2"
                                   value="option2">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" required  type="radio" name="gender" id="inlineRadio3"
                                   value="option3">
                            <label class="form-check-label" for="inlineRadio3">other</label>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Nationality</label>
                        <select class="form-control custom-select" name="nationality">
                            <option selected>Open this select menu</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                            <option value="3">c</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Local ID</label>
                        <input required  type="text" class="form-control" name="local_id" id="inputAddress2"
                               placeholder="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Passport</label>
                        <input required  type="text" class="form-control" name="passport_no" id="inputAddress2" placeholder="Passport ID">
                    </div>
                </div>
                <h3>Contact Information</h3>
                <div class="form-group">
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Country</label>
                        <select class="form-control custom-select" name="country">
                            <option selected>Open this select menu</option>
                            <option value="1">a</option>
                            <option value="2">b</option>
                            <option value="3">c</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddress2">Mobile phone</label>
                        <input required  type="text"  name="mobile_no" class="form-control" id="inputAddress2" placeholder="with country code">
                    </div>
                </div>
                <button required  type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

