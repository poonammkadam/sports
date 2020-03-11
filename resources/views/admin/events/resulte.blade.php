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
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{url('admin/resulte/upload/'.$objEvent->id)}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <h2>{{$objEvent->name}}</h2>
                           
                            <div class="form-group row">
                                <label for="tshirt">Select Category</label>
                                 <select id="category" class="form-control custom-select" name="category">
                                    <option selected>Open this select menu</option>
                                    @foreach($objEvent->category as $objCategory)
                                    <option value="{{$objCategory->id}}">{{$objCategory->category_type}} {{$objCategory->category_subtype}}</option>
                                    @endforeach
                                </select>
                                </div>
                            <div class="form-group row">
                                    <label for="resulte" class="col-md-4 col-form-label text-md-right">Upload Resulte File</label>
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

