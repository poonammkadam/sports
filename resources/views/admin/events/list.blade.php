@extends('admin.admin_template')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Events</h3>
        </div>
        <div align="left">
            <a href="{{ url('admin/events/create') }}" class="btn btn-info">Add New</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
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
                                    style="width: 160px;">Event ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 100px;">
                                    Event Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 100px;">
                                    Organiser Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 100px;">
                                    Event Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Action
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                              Upload result
                            </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($arrObjEvents->count() > 0)
                                @foreach($arrObjEvents as $objEvents )
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$objEvents->id}}</td>
                                        <td>
                                            {{$objEvents->name}}
                                        </td>
                                        <td>
                                            {{$objEvents->organiser_name}}
                                        </td>
                                        <td>
                                            {{$objEvents->event_date}}
                                        </td>
                                        <td>
                                            <a href="{{url('admin/events/edit/'.$objEvents->id)}}"
                                               class="btn btn-primary m-1">Edit</a>
                                            <a href="{{url('admin/events/view/'.$objEvents->id)}}"
                                               class="btn btn-primary m-1">View</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-info"  href="{{url('admin/resulte/edit/'.$objEvents->id)}}">Upload</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr> No Records found </tr>
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

