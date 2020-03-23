@extends('admin.admin_template')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update User</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" autocomplete="off" action="{{url('/admin/user/update/'.$objProfile->id)}}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input required  type="email" name="email" value="{{$objProfile->user->email}}"  class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Local Name</label>
                                    <input required  type="text" name="local_name" value="{{$objProfile->user->name}}" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">First Name</label>
                                    <input required  type="text" name="first_name"  value="{{$objProfile->first_name}}"  class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Last Name</label>
                                    <input required  type="text" name="last_name" value="{{$objProfile->last_name}}"  class="form-control" id="inputAddress2"
                                           placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">DOB</label>
                                    <input required  type="date"  value="{{\Carbon\Carbon::parse($objProfile->dob)->format('Y-m-d')}}" class="form-control" name="dob" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Gender</label>
                                    <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required {{$objProfile->gender && $objProfile->gender=='male' ? 'checked': ''}}  type="radio" name="gender" id="inlineRadio1"
                                               value="male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required {{$objProfile->gender && $objProfile->gender=='female' ?  'checked': ''}}  type="radio" name="gender" id="inlineRadio2"
                                               value="female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" required {{$objProfile->gender && $objProfile->gender=='other' ? 'checked': ''}}  type="radio" name="gender" id="inlineRadio3"
                                               value="other">
                                        <label class="form-check-label" for="inlineRadio3">other</label>
                                    </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nationality">Nationality</label>
                                        <select id="nationality" class="form-control custom-select" name="nationality">
                                            <option selected>Open this select menu</option>
                                            @foreach($arrCountries as $objCountries)
                                             <option value="{{$objCountries}}">{{$objCountries}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Local ID</label>
                                    <input required  type="text"  value="{{$objProfile->local_id}}" class="form-control" name="local_id" id="inputAddress2"
                                           placeholder="" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Passport</label>
                                    <input  type="text" class="form-control" value="{{$objProfile->passport}}" name="passport_no" id="inputAddress2" placeholder="Passport ID">
                                </div>
                            </div>
                            <h3>Contact Information</h3>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control"  name="address" id="exampleFormControlTextarea1" rows="3"> {{$objProfile->address}}"</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">T-shirt size</label>
                                    <select class="form-control custom-select" name="t_shirt_size">
                                        <option selected>Open this select menu</option>
                                        <option {{$company->t_shirt_size == 'XS'  ? 'selected' : ''}} value="XS">XS</option>
                                        <option {{$company->t_shirt_size == 'S'  ? 'selected' : ''}} value="S">S</option>
                                        <option {{$company->t_shirt_size == 'M'  ? 'selected' : ''}} value="M">M</option>
                                        <option {{$company->t_shirt_size == 'L'  ? 'selected' : ''}} value="L">L</option>
                                        <option {{$company->t_shirt_size == 'XL'  ? 'selected' : ''}} value="XL">XL</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Mobile phone</label>
                                    <input required  type="tel" value="{{$objProfile->mobile_no_primary}}"  name="mobile_no" class="form-control" id="inputAddress2" placeholder="Please put along with country code">
                                </div>
                            </div>
                            <button required  type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
