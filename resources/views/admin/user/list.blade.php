@extends('admin.admin_template')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>
        <div align="left">
            <a href="{{ url('admin/user/create') }}" class="btn btn-info">Add New User</a>
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
                                    style="width: 160px;">User ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 207px;">
                                    User Name
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 207px;">
                                    User Email
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 95px;">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($arrObjUsers->count() > 0)
                                     @foreach($arrObjUsers as $objProfile)
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">{{$objProfile->id}}</td>
                                        <td>
                                            {{$objProfile->user->name}}
                                        </td>

                                        <td>
                                            {{$objProfile->user->email}}
                                         </td>

                                        <td>
                                            <a href="{{url('admin/user/edit/'.$objProfile->id)}}"  class="btn m-1 btn-primary">Edit</a>
                                            <a href="{{url('admin/user/events/'.$objProfile->id)}}"  class="btn m-1 btn-primary"> Events</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            @else
                                <tr> <td>No Records found</td> </tr>
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

