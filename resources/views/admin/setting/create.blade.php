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
                                <label for="sec_policy" class="col-md-4 col-form-label text-md-right">Security
                                    Policy</label>

                                <div class="col-md-6">
                                   <textarea id="sec_policy" class="form-control" name="sec_policy"
                                   >
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="data_policy" class="col-md-4 col-form-label text-md-right">Personal Data
                                    Policy</label>

                                <div class="col-md-6">
                                   <textarea id="data_policy" class="form-control" name="data_policy"
                                   >
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="terms_of_use" class="col-md-4 col-form-label text-md-right">Online Terms of
                                    Use</label>

                                <div class="col-md-6">
                                   <textarea id="terms_of_use" class="form-control" name="terms_of_use"
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
@endsection
