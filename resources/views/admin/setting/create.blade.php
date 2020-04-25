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
                        <form method="POST" action="{{ url('admin/setting/store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="terms" class="col-md-4 col-form-label text-md-right">Terms and
                                    Conditions</label>

                                <div class="col-md-6">
                                   <textarea id="terms" class="form-control" name="terms"
                                   >
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="policy" class="col-md-4 col-form-label text-md-right">Security
                                    Policy</label>

                                <div class="col-md-6">
                                   <textarea id="policy" class="form-control" name="policy"
                                   >
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about_us" class="col-md-4 col-form-label text-md-right">Personal Data
                                    Policy</label>

                                <div class="col-md-6">
                                   <textarea id="about_us" class="form-control" name="about_us"
                                   >
                                    </textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('terms', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('policy', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('about_us', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection
