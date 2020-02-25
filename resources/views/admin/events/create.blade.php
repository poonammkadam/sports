@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Events</div>

                    <div class="card-body">
{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <form method="POST" autocomplete="off" action="{{url('/admin/event/create')}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Event title</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Event Description</label>

                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control " name="description"  required autocomplete="description">
                                    </textarea>


                                </div>
                            </div>

                            <div class="form-group">
                                    <label for="register_expire_date">Registertion Expire Date</label>
                                    <input type="datetime-local" class="form-control" id="register_expire_date" name="register_expire_date" placeholder="">
                            </div>

                            <div class="form-group">
                                    <label for="eventdate">Event Date</label>
                                    <input type="datetime-local" class="form-control" id="eventdate" name="eventdate" placeholder="" >
                            </div>

                            <div class="form-group row">
                                    <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                    <div class="col-md-6">
                                        <input id="venue" type="text" class="form-control" name="venue" required autocomplete="venue" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label for="orgname" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                                    <div class="col-md-6">
                                        <input id="orgname" type="text" class="form-control " name="orgname" required autocomplete="orgname" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                                    <div class="col-md-6">
                                        <input id="banner" type="text" class="form-control @error('banner') is-invalid @enderror" name="banner" required autocomplete="banner" autofocus>
                                    </div>
                                <label for="org_contact_no" class="col-md-4 col-form-label text-md-right">Organization Contact No.</label>
                                <div class="col-md-6">
                                    <input id="org_contact_no" type="text" class="form-control " name="org_contact_no" required autocomplete="org_contact_no" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="org_address" class="col-md-4 col-form-label text-md-right">Organization Address</label>
                                <div class="col-md-6">
                                    <textarea  id="org_address" type="text" class="form-control " name="org_address" required autocomplete="org_address" autofocus rows="3"></textarea>
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                    <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input id="banner" type="text" class="form-control" name="banner" required autocomplete="banner" autofocus>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
