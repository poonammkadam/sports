@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="profile-complite">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
                <h1>You have already register your profile...</h1>
                <p> You can update your profile data here..</p>
                <a class="btn btn-info" href="{{url('/update_changes')}}">Update Profile</a> <a class="btn btn-info"
                                                                                                href="/events">Events</a>
            </div>
        </div>
    </div>
@endsection
