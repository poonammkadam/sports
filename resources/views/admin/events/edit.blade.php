@extends('admin.admin_template')
@section('content')
    <script>
        $(document).on('click', '.pick_up_yes', function () {
            $('#pickup_drop_available').css('display', 'block');
        });

        $(document).on('click', '.pick_up_no', function () {
            $('#pickup_drop_available').css('display', 'none');
        });

    </script>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
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

                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{url('/admin/events/edit/'.$objEvent->id)}}">
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

                            <div class="form-group row ">
                                <label for="startdate" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                <div class="col-md-6">
                                    <input type="datetime-local" class="form-control" id="startdate" name="startdate"
                                           value="{{\Carbon\Carbon::parse($objEvent->startdate)->format('Y-m-d\TH:i')}}"
                                           placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enddate" class="col-md-4 col-form-label text-md-right">End Date</label>
                                <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="enddate" name="enddate"
                                       value="{{\Carbon\Carbon::parse($objEvent->enddate)->format('Y-m-d\TH:i')}}"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                <div class="col-md-6">
                                    <input value="{{$objEvent->venue}}" id="venue" type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" required autocomplete="venue" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="orgname" class="col-md-4 col-form-label text-md-right">Organization </label>
                                <div class="col-md-6">{{$objOrganisation->name}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Is pickup and drop available</label>

                                <div class="col-md-6">
                                    <label for="pick_up_yes">Yes
                                        <input type="radio" required class="pick_up_yes" id="pick_up_yes" name="pickup_drop"  value="yes">
                                    </label>
                                    <label for="pick_up_no">No
                                    <input type="radio" required class="pick_up_no" id="pick_up_no" name="pickup_drop" value="no">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row" id="pickup_drop_available" style="display: none">
                                <label for="pickup_drop" class="col-md-4 col-form-label text-md-right">Is pickup and drop Location</label>
                                <div class="col-md-6">
                                    <textarea required  id="pickup_drop" type="text" class="form-control"  name="pickup_drop"  autocomplete="pickup_drop" autofocus rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                                <div class="col-md-6">
                                    <input id="banner" value="{{$objEvent->banner}}" class="btn btn-primary" type="file"  name="banner" required autocomplete="banner" autofocus>
                                {{$objEvent->banner}}
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
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
