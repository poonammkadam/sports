@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
       @endif
      <h1>you already register your profile...</h1> 
      <p> you can update your profile data or you register for event here..</p>      
    <a class="btn" href="/update_changes">Update Profile</a>  <a class="btn" href="/events">Events</a>
    </div>
  </div>
@endsection