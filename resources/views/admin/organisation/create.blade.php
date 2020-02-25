@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Organisation</div>

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
                        <form method="POST" autocomplete="off" action="/admin/organisation/create">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Event title</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Event Description</label>

                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_no" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                                <div class="col-md-6">
                                    <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" required autocomplete="contact_no" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                                    <div class="col-md-6">
                                        <input id="banner" type="text" class="form-control @error('banner') is-invalid @enderror" name="banner" required autocomplete="banner" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                                <div class="col-md-6">
                                    <input id="banner" type="text" class="form-control @error('banner') is-invalid @enderror" name="banner" required autocomplete="banner" autofocus>
                                </div>
                            </div>

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
