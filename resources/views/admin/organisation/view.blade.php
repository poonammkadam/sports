@extends('admin.admin_template')
@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Organisation View</div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-4"><b> Organisation Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objOrganisation->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organisation Description:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objOrganisation->about}}</div>
                        </div>


                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Contact No:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objOrganisation->contact_no}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Address:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objOrganisation->address}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Events</div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid"
                                           aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 160px;">Event ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Event Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Organiser Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Event Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 95px;">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($objOrganisation->events && $objOrganisation->events->count() > 0)
                                            @foreach($objOrganisation->events as $objEvent)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$objEvent->id}}</td>
                                                    <td>
                                                        {{$objEvent->name}}
                                                    </td>
                                                    <td>
                                                        {{$objEvent->organisation->name}}
                                                    </td>
                                                    <td>
                                                        {{$objEvent->event_date}}
                                                    </td>
                                                    <td>
                                                        <a href="{{url('admin/events/edit/'.$objEvent->id)}}"
                                                           class="btn btn-primary m-1">Edit</a>
                                                        <a href="{{url('admin/events/view/'.$objEvent->id)}}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
