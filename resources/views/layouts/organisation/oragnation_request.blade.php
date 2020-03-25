@extends('layouts.app')
@section('content')

    <div class="container main-body">
        @if (session('alert'))
            <div class="alert alert-info">
                {{ session('alert') }}
            </div>
        @endif
        <div class="form-body">
            <div class="text-center">
                <h3>Basic Information</h3>
            </div>
            <form method="POST" autocomplete="off" action="/oragnation/request">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">oragnation Email</label>
                        <input required  type="email" name="email" value=""  class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">oragnation Name</label>
                        <input required  type="text" name="name" value="" class="form-control" id="inputAddress" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">oragnation Description</label>
                        <input required  type="text" name="description" class="form-control" id="inputAddress" placeholder="description">
                    </div>
                </div>

                <button required  type="submit" class="btn btn-primary">Send Request</button>
            </form>
        </div>
    </div>
@endsection

