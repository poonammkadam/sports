@extends('admin.admin_template')
@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                            <div class="col-7">{!! $objEvent->description !!}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Name:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organisation->name}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Contact No:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organisation->contact_no}}</div>
                        </div>

                        <div class="row m-2">
                            <div class="col-4"><b> Organiser Address:</b></div>
                            <div class="col-1"></div>
                            <div class="col-7">{{$objEvent->organisation->address}}</div>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Participants</div>

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
                                                style="width: 160px;"> ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                User Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Category
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Sub-Category
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Gender
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Payment Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Team/Sponsor
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 100px;">
                                                Payment Type
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 95px;">
                                                Upload result
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($objEvent->eventParticipants->count() > 0)
                                            @foreach($objEvent->eventParticipants as $objParticipants )
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$objParticipants->id}}</td>
                                                    <td>
                                                        {{$objParticipants->profile->first_name}} {{$objParticipants->profile->last_name}}
                                                    </td>

                                                    <td>
                                                        {{$objParticipants->category->category_type}}
                                                    </td>
                                                    <td>
                                                        {{($objParticipants->category->category_subtype)}}
                                                    </td>
                                                    <td>
                                                        {{($objParticipants->profile->gender)}}
                                                    </td>
                                                    <td>
                                                        @if($objParticipants->payment_status == 1)
                                                            <span>Completed</span>
                                                        @elseif($objParticipants->payment_status == 2)
                                                            <span>Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        --
                                                    </td>
                                                    <td>
                                                        @if($objParticipants->payment_type=='online')
                                                            <span>Online</span>
                                                        @else
                                                            <span>Offline</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!$objParticipants->result_status)
                                                            <a class="btn btn-info"
                                                               href="{{url('/admin/resulte/edit/'.$objParticipants->id)}}">Upload</a>
                                                        @else
                                                            <a class="btn btn-info disabled" title="Resulte already upload" href="#">Already Uploaded</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection
