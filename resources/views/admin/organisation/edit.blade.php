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
                        <form method="POST" autocomplete="off" action="{{url('/admin/organisation/update/'.$objOrganisation->id)}}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Oganisation Name</label>
                                    <input required  type="text" name="name"  value="{{ $objOrganisationProfile ?$objOrganisationProfile->name:''}}" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">About Oganisation</label>
                                    <textarea class="form-control"  name="about"  id="exampleFormControlTextarea1" rows="3">{{$objOrganisationProfile ?$objOrganisationProfile->about:''}} </textarea>
                                </div>
                            </div>

                            <h3>Contact Information</h3>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control"  name="address"  id="exampleFormControlTextarea1" rows="3">{{$objOrganisationProfile ?$objOrganisationProfile->address:''}} </textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Mobile phone</label>
                                    <input required  type="tel"  name="mobile_no"  value="{{$objOrganisationProfile ?$objOrganisationProfile->contact_no:''}}" class="form-control"  placeholder="Please put along with country code">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Nationality</label>
                                    <select class="form-control custom-select" name="nationality">
                                        <option selected>Select Country</option>
                                        @foreach($arrCountries as $objCountries)
                                            <option value="{{$objCountries}}">{{$objCountries}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button required  type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var input = document.querySelector("#phone");
        $("#phone").intlTelInput()
    </script>
@endsection
