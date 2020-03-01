@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Events View</div>

                    <div class="card-body">
                        <div class="row m-2">
                            <div class="col-4"><b> Event Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Description:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->description}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organiser_name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Contact No:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organiser_contact_number}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Address:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organiser_address}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Venue:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->venue}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Event Date:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->event_date}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Registration End Date:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->registration_end_date}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Participants</div>

                    <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
@endsection
