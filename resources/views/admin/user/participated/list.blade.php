@extends('admin.admin_template')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Events Participated
                by {{$objUserProfile->first_name}}{{$objUserProfile->last_name}}</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 160px;">User ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 207px;">
                                    Event Name
                                </th>

                                {{--                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"--}}
                                {{--                                    aria-label="Browser: activate to sort column ascending" style="width: 207px;">--}}
                                {{--                                    Event Description--}}
                                {{--                                </th>--}}

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Organisers name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Category name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Event Fee amount
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Payment status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Upload Resulte
                                </th>

                            </tr>
                            </thead>

                            <tbody>

                            @if($objUserProfileCategory->count() > 0)
                                @foreach($objUserProfileCategory as $objEvent)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$objEvent->id}}</td>
                                        <td>
                                            {{$objEvent->category->events->name}}
                                        </td>

                                        {{--                                        <td>--}}
                                        {{--                                            {{$objEvent->category->events->description}}--}}
                                        {{--                                        </td>--}}

                                        <td>
                                            {{$objEvent->category->events->organisation->name}}
                                        </td>

                                        <td>
                                            {{$objEvent->category->category_type}}  {{$objEvent->category->category_subtype}}
                                        </td>

                                        <td>
                                            {{$objEvent->category->amount}}
                                        </td>

                                        <td>
                                            @if($objEvent->payment_status == 1)
                                                <a href="#" class="btn btn-success m-1 disabled">Paid</a>
                                            @else
                                                <a href="{{url('admin/events/paid/'.$objEvent->id)}}"
                                                   class="btn btn-danger m-1">Unpaid</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$objEvent->result_status)
                                                <a href="{{url('/admin/resulte/edit/'.$objEvent->id)}}"
                                                   class="btn btn-success m-1 ">Upload</a>

                                            @else
                                                <a class="btn btn-info disabled" title="Resulte already upload"
                                                   href="#">Already Uploaded</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr> No Records found</tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

