@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Events</div>
                    
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
                   
                        <form method="POST" autocomplete="off" action="{{url('/admin/event/edit')}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Event title</label>
                                <div class="col-md-6">
                                    <input id="name" value="{{$objEvent->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Event Description</label>
                                
                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description">
                                        {{$objEvent->description}}
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="startdate" class="col-md-4 col-form-label text-md-right">>Start Date</label>
                                <div class="col-md-6">
                                <input class="form-control" id="startdate" name="startdate" placeholder="" type="datetime"
                                >
                                </div>
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
            </div>
        </div>
    </div>
@endsection
