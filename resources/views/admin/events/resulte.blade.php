@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit Events Catrgory resulte</div>

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
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{url('admin/resulte/upload/'.$objEventParticipant->id)}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <h2>{{$objEventParticipant->profile->first_name}} {{$objEventParticipant->profile->last_name}}</h2>
                            <h2>{{$objEventParticipant->events->name}}</h2>
                            <h3>{{$objEventParticipant->category->category_type}} {{$objEventParticipant->category->category_subtype}}</h3>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Rank Status</label>
                                <div class="col-md-6">
                                    <input id="rank_status" required type="text" class="form-control " name="rank_status" autocomplete="rank_status" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Race Time</label>
                                <div class="col-md-6">
                                    <input id="race_time" required type="time" class="form-control " name="race_time" autocomplete="race_time" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="resulte" class="col-md-4 col-form-label text-md-right">Upload Certificate File</label>
                                    <div class="col-md-6">
                                        <input required id="resulte" type="file" class="" name="file" >
                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload
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

