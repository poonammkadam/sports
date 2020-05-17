@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Reslute</div>

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
                        <form method="POST" enctype="multipart/form-data" autocomplete="off"
                              action="{{url('admin/event/results/upload')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$objEvent->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Enter Result Url
                                    <i class="fa fa-link" aria-hidden="true"></i></label>
                                <div class="col-md-6">
                                    <input id="url" type="text" class="form-control " name="url" autocomplete="url"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload <i class="fa fa-upload" aria-hidden="true"></i>
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

