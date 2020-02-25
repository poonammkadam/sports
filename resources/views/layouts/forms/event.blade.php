@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Basic Information</h3>
            </div>
            <form method="POST" autocomplete="off" action="/event/store">
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

                <div class="form-group">
                        <label for="startdate">Start Date</label>
                        <input class="form-control" id="startdate" name="startdate" placeholder="" type="datetime">
                </div>

                <div class="form-group">
                        <label for="enddate">End Date</label>
                        <input class="form-control" id="enddate" name="enddate" placeholder="" type="datetime"
                               >
                </div>

                <div class="form-group row">
                        <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                        <div class="col-md-6">
                            <input id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" required autocomplete="venue" autofocus>
                        </div>
                </div>

                <div class="form-group row">
                        <label for="orgname" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                        <div class="col-md-6">
                            <input id="orgname" type="text" class="form-control @error('orgname') is-invalid @enderror" name="orgname" required autocomplete="orgname" autofocus>
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
@endsection

