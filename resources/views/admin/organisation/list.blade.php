@extends('admin.admin_template')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Organisation</h3>
        </div>
        <div align="left">
            <a href="{{ url('admin/organisation/create') }}" class="btn btn-info">Add organisation</a>
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
                                    style="width: 50px;">Organisation ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 100px;">
                                    Organisation Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 100px;">
                                    Organisation Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($arrObjOrganisation->count() > 0)
                                @foreach($arrObjOrganisation as $objOrganisation )
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$objOrganisation->id}}</td>
                                        <td>
                                            {{$objOrganisation->name}}
                                        </td>
                                        <td>
                                            {{$objOrganisation->email}}
                                        </td>

                                        <td>
                                            <a href="{{url('admin/organisation/edit/'.$objOrganisation->id)}}"
                                               class="btn btn-primary m-1">Edit</a>
                                            <a href="{{url('admin/organisation/view/'.$objOrganisation->id)}}"
                                               class="btn btn-primary m-1">View</a>
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

