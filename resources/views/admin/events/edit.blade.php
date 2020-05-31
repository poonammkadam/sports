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
    <div class=" ">
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
                        <form method="POST" enctype="multipart/form-data" autocomplete="off"
                              action="{{url('admin/events/edit/'.$objEvent->id)}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Event title</label>

                                <div class="col-md-10">
                                    <input id="name" required type="text" class="form-control " name="name"
                                           value="{{$objEvent->name?$objEvent->name:''}}"
                                           autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Event
                                    Description</label>

                                <div class="col-md-10">
                                    <textarea id="description" class="form-control" name="description"
                                              autocomplete="description">
                                        {{$objEvent->description?$objEvent->description:''}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="eventdate" class="col-md-2 col-form-label text-md-right">Event Date</label>
                                <div class="col-md-4">
                                    <input required type="datetime-local" class="form-control" id="eventdate"
                                           name="eventdate" placeholder=""
                                           value="{{$objEvent->event_date ? \Carbon\Carbon::parse($objEvent->event_date)->toDateTimeLocalString(): ''}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="venue" class="col-md-2 col-form-label text-md-right">Venue</label>
                                <div class="col-md-4">
                                    <input required id="venue" type="text" class="form-control" name="venue"
                                           autocomplete="venue" autofocus value="{{$objEvent->venue}}">
                                </div>
                                <label for="org" class="col-md-2 col-form-label text-md-right">Select
                                    Organisation</label>
                                <div class="col-md-4">
                                    <select id="org" class="form-control custom-select" name="organisation">
                                        <option selected>Open this select menu</option>
                                        @foreach($arrObjOrganisation as $objOrg)
                                            <option
                                                value="{{$objOrg->id}}" {{ $objEvent->org_id==$objOrg->id? 'selected':''}}>{{$objOrg->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div id="dynamic_field">
                                @foreach($objEvent->category as $key=>$category)
                                    <div class="addedSection">

                                        <h3>Category Default{{$key}}</h3>
                                        <div class="row">
                                            <input type="hidden" required
                                                   id="{{'category_id'.$key}}"
                                                   name="{{'category['.$key.'][id]'}}"
                                                   class="form-control item_category"
                                                   value="{{$category->id}}"
                                            >
                                            <div class="col-md-6">
                                                <label for="{{'category_type'.$key}}">Category</label>
                                                <input type="text" required
                                                       id="{{'category_type'.$key}}"
                                                       name="{{'category['.$key.'][type]'}}"
                                                       class="form-control item_category"
                                                       value="{{$category->category_type}}"
                                                >
                                            </div>
                                            <input type="hidden" required id="{{'category_fee_name'.$key}}"
                                                   name="{{'category['.$key.'][fee][early][name]'}}"
                                                   class="form-control item_category"
                                                   placeholder="Category fee..." value="early">
                                            <div class="col-md-6">
                                                <label for="{{'category_subtype'.$key}}">Sub-Category</label>
                                                <input required
                                                       type="text"
                                                       id="{{'category_subtype'.$key}}"
                                                       name="{{'category['.$key.'][subtype]'}}"
                                                       class="form-control item_category"
                                                       value="{{$category->category_subtype}}"
                                                >
                                            </div>
                                        </div>

                                        {{--                                        //early ticket--}}
                                        @php
                                            $objEarlyTicket = $category->ticket->where('name', 'early')->first();
                                            $objNormalTicket = $category->ticket->where('name', 'normal')->first();
                                            $objLateTicket = $category->ticket->where('name', 'late')->first();
                                        @endphp
                                        <div class="row">
                                            <div class="col-md-3 ">
                                                <input type="hidden" required id="{{'category_id'.$key}}"
                                                       name="{{'category['.$key.'][fee][early][id]'}}"
                                                       class="form-control item_category"
                                                       placeholder="Category fee..."
                                                       value="{{$objEarlyTicket->id}}"
                                                >
                                                <label for="{{'category_type'.$key}}">Early Bird Fee</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" required id="{{'category_fee'.$key}}"
                                                           name="{{'category['.$key.'][fee][early][fee]'}}"
                                                           class="form-control item_category"
                                                           placeholder="Category fee..."
                                                           value="{{$objEarlyTicket->fee}}"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_fee'.$key}}">Early Bird Ticket
                                                    Quantity</label><input
                                                    type="number" required id="{{'category_fee'.$key}}"
                                                    name="{{'category['.$key.'][fee][early][quantity]'}}"
                                                    class="form-control item_category"
                                                    value="{{$objEarlyTicket->quantity}}"
                                                >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_start_date'.$key}}">Early Bird Ticket Start
                                                    Date</label><input
                                                    type="date" required id="{{'category_start_date'.$key}}"
                                                    name="{{'category['.$key.'][fee][early][start_date]'}}"
                                                    @if($key != 0) readonly @endif
                                                    class="form-control item_category catergory-early-ticket-start-date"
                                                    value="{{$objEarlyTicket->start_date}}"
                                                >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_end_date'.$key}}">Early Bird Ticket End
                                                    Date</label><input
                                                    type="date" required id="{{'category_end_date'.$key}}"
                                                    name="{{'category['.$key.'][fee][early][end_date]'}}"
                                                    @if($key != 0) readonly @endif
                                                    class="form-control item_category catergory-early-ticket-end-date"
                                                    value="{{$objEarlyTicket->end_date}}"
                                                >
                                            </div>
                                        </div>
                                        {{--                                        //end of early ticket--}}
                                        {{--                                        //normal ticket--}}
                                        <div class="row">
                                            <input type="hidden" required id="{{'category_id'.$key}}"
                                                   name="{{'category['.$key.'][fee][normal][id]'}}"
                                                   class="form-control item_category"
                                                   placeholder="Category fee..."
                                                   value="{{$objNormalTicket->id}}"
                                            >
                                            <div class="col-md-3">
                                                <label for="{{'category_fee'.$key}}">General Fee</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" required id="{{'category_fee'.$key}}"
                                                           name="{{'category['.$key.'][fee][normal][fee]'}}"
                                                           class="form-control item_category"
                                                           value="{{$objNormalTicket->fee}}"
                                                    >
                                                </div>
                                            </div>
                                            <input type="hidden" required id="{{'category_fee_name'.$key}}"
                                                   name="{{'category['.$key.'][fee][normal][name]'}}"
                                                   class="form-control item_category"
                                                   placeholder="Category fee..." value="normal">
                                            <div class="col-md-3">
                                                <label for="{{'category_fee'.$key}}">General Ticket
                                                    Quantity</label><input
                                                    type="number"
                                                    required
                                                    id="{{'category_fee'.$key}}"
                                                    name="{{'category['.$key.'][fee][normal][quantity]'}}"
                                                    class="form-control item_category"
                                                    value="{{$objNormalTicket->quantity}}"
                                                >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_start_date'.$key}}">General Ticket Start
                                                    Date</label><input
                                                    type="date" required id="{{'category_start_date'.$key}}"
                                                    name="{{'category['.$key.'][fee][normal][start_date]'}}"
                                                    @if($key != 0) readonly @endif
                                                    class="form-control item_category catergory-general-ticket-start-date"
                                                    value="{{$objNormalTicket->start_date}}"
                                                >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_end_date'.$key}}">General Ticket End
                                                    Date</label>
                                                <input type="date"
                                                       required
                                                       id="{{'category_end_date'.$key}}"
                                                       @if($key != 0) readonly @endif
                                                       name="{{'category['.$key.'][fee][normal][end_date]'}}"
                                                       class="form-control item_category catergory-general-ticket-end-date"
                                                       value="{{$objNormalTicket->end_date}}"
                                                >
                                            </div>

                                        </div>
                                        {{--                                        end of normal ticket--}}
                                        {{--                                        Late ticket--}}
                                        <div class="row">
                                            <input type="hidden" required id="{{'category_id'.$key}}"
                                                   name="{{'category['.$key.'][fee][late][id]'}}"
                                                   class="form-control item_category"
                                                   placeholder="Category fee..."
                                                   value="{{$objLateTicket->id}}"
                                            >
                                            <div class="col-md-3">
                                                <label for="{{'category_fee'.$key}}">Late Fee</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span
                                                            class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" required id="{{'category_fee'.$key}}"
                                                           name="{{'category['.$key.'][fee][late][fee]'}}"
                                                           class="form-control item_category"
                                                           value="{{$objLateTicket->fee}}"
                                                    >
                                                </div>
                                            </div>
                                            <input type="hidden" required id="{{'category_fee_name'.$key}}"
                                                   name="{{'category['.$key.'][fee][late][name]'}}"
                                                   class="form-control item_category"
                                                   placeholder="Category fee..." value="late">

                                            <div class="col-md-3">
                                                <label for="{{'category_fee'.$key}}">Late Ticket Quantity</label>
                                                <input type="number"
                                                       required
                                                       id="{{'category_fee'.$key}}"
                                                       name="{{'category['.$key.'][fee][late][quantity]'}}"
                                                       class="form-control item_category"
                                                       value="{{$objLateTicket->quantity}}"
                                                >
                                            </div>
                                            <div class="col-md-3">
                                                <label for="{{'category_start_date'.$key}}">Late Ticket Start
                                                    Date</label>
                                                <input type="date"
                                                       required
                                                       id="{{'category_start_date'.$key}}"
                                                       name="{{'category['.$key.'][fee][late][start_date]'}}"
                                                       @if($key != 0) readonly @endif
                                                       class="form-control item_category catergory-late-ticket-start-date"
                                                       value="{{$objLateTicket->start_date}}"
                                                >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="{{'category_end_date'.$key}}">Late Ticket End Date</label>
                                                <input type="date"
                                                       required
                                                       id="{{'category_end_date'.$key}}"
                                                       name="{{'category['.$key.'][fee][late][end_date]'}}"
                                                       class="form-control item_category catergory-late-ticket-end-date"
                                                       @if($key != 0) readonly @endif
                                                       value="{{$objLateTicket->end_date}}"
                                                >
                                            </div>
                                        </div>
                                        {{--                                        //end late ticket--}}
                                        {{--                                        <div class="form-group">--}}
                                        {{--                                            <button type="button" name="remove" class="btn btn-danger btn-xs remove">--}}
                                        {{--                                                Remove--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right" for="add">Add Event Type</label>
                                <button type="button" name="add" id="add" class="btn  btn-outline-dark"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>

                            <div class="form-group row">

                                <div id="add_start_transportation_fields">
                                    @foreach($objEvent->start as $intStart=>$transstart)
                                        <div class="addedSection"><h3>Add Transportation before Race</h3>
                                            <div class="row">
                                                <input type="hidden" required
                                                       id="{{'trans_id'.$intStart}}"
                                                       name="{{'transstart['. $intStart .'][id]'}}"
                                                       class="form-control item_category"
                                                       value="{{$transstart->id}}">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'trans_start'.$intStart}}">Location
                                                            Name</label> <input type="text" required
                                                                                id="{{'trans_start'.$intStart}}"
                                                                                name="{{'transstart['. $intStart .'][location]'}}"
                                                                                class="form-control item_category"
                                                                                value="{{$transstart->location}}"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'trans_start_fee' . $intStart }}">Fee</label><input
                                                            required type="number"
                                                            id="{{'trans_start_fee' . $intStart }}"
                                                            name="{{'transstart[' . $intStart . '][fee]'}}"
                                                            class="form-control item_category"
                                                            value="{{$transstart->price}}"
                                                        ></div>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <button type="button" name="remove"--}}
                                            {{--                                                        class="btn btn-danger btn-xs remove">Remove--}}
                                            {{--                                                </button>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="add_start_transportation" class="col-md-2 col-form-label text-md-right">Enter
                                    Pickup Location </label>
                                <button type="button" name="add" id="add_start_transportation"
                                        class="btn  btn-outline-dark"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>


                            <div class="form-group row">


                                <div id="add_end_transportation_field">
                                    @foreach($objEvent->end as $intEnd=>$transend)
                                        <div class="addedSection"><h3>Add Transportation After Race</h3>
                                            <div class="row">
                                                <input type="hidden" required
                                                       id="{{'trans_end' .$intEnd }}"
                                                       name="{{'transend[' . $intEnd . '][id]'}}"
                                                       class="form-control item_category"
                                                       value="{{$transend->id}}">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'trans_end' .$intEnd }}">Location
                                                            Name</label> <input type="text" required
                                                                                id="{{'trans_end' .$intEnd }}"
                                                                                name="{{'transend[' . $intEnd . '][location]'}}"
                                                                                class="form-control item_category"
                                                                                value="{{$transend->location}}"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'trans_end_fee' . $intEnd }}">Fee</label><input
                                                            required type="number"
                                                            id="{{'trans_end_fee' . $intEnd }}"
                                                            value="{{$transend->price}}"
                                                            name="{{'transend[' . $intEnd . '][fee]'}}"
                                                            class="form-control item_category"

                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <button type="button" name="remove"--}}
                                            {{--                                                        class="btn btn-danger btn-xs remove">--}}
                                            {{--                                                    Remove--}}
                                            {{--                                                </button>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="add_end_transportation" class="col-md-2 col-form-label text-md-right">Enter
                                    Drop Location After Event</label>
                                <button type="button" name="add" id="add_end_transportation"
                                        class="btn  btn-outline-dark"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>


                            <div class="form-group row">
                                <div id="add_accomodation_field">
                                    @foreach($objEvent->accom as $intAccom=>$objAccom)
                                        <div class="addedSection"><h3>Add Accomodation</h3>
                                            <div class="row">
                                                <input type="hidden" required
                                                       id="{{'accomodation' . $intAccom}}"
                                                       name="{{'accomodation[' . $intAccom . '][id]'}}"
                                                       class="form-control item_category"
                                                       value="{{$objAccom->id}}"
                                                >
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'accomodation' . $intAccom}}">Accomodation
                                                            Name</label> <input type="text" required
                                                                                id="{{'accomodation' . $intAccom}}"
                                                                                name="{{'accomodation[' . $intAccom . '][name]'}}"
                                                                                class="form-control item_category"
                                                                                value="{{$objAccom->name}}"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label
                                                            for="{{'accomodation_fee' . $intAccom}}">Accomodation
                                                            Fee</label><input required type="number"
                                                                              id="{{'accomodation_fee' . $intAccom}}"
                                                                              name="{{'accomodation[' . $intAccom . '][fee]'}}"
                                                                              class="form-control item_category"
                                                                              value="{{$objAccom->price}}"
                                                        ></div>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <button type="button" name="remove"--}}
                                            {{--                                                        class="btn btn-danger btn-xs remove">--}}
                                            {{--                                                    Remove--}}
                                            {{--                                                </button>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="add_accomodation" class="col-md-2 col-form-label text-md-right">Add
                                    Accomodation</label>
                                <button type="button" name="add" id="add_accomodation"
                                        class="btn  btn-outline-dark"><i
                                        class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>


                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Enter Racekit
                                    Amount (optional)</label>
                                <div class="addedSection">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="racekit" class="">Enter Amount</label>
                                            <input type="text" required="" id="racekit" name="racekit"
                                                   class="form-control item_category" value="{{$objEvent->racekit}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group evet-form-list">
                                <label for="event_status" class="event-form-input">Event Status</label>
                                <select id="event_status" class="form-control custom-select" name="event_status">
                                    <option selected>Open this select menu</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Postponed">Postponed</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="banner" class="col-md-2 col-form-label text-md-right">Upload Banner</label>
                                <div class="col-md-10">
                                    <input required id="banner" type="file" class="" name="banner"
                                           value="{{$objEvent->banner}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary mx-auto">
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
        $(document).ready(function () {

            let earlyStartDateValue = $('.catergory-early-ticket-start-date').val();
            let normalStartDateValue = $('.catergory-general-ticket-start-date').val();
            let lateStartDateValue = $('.catergory-late-ticket-start-date').val();
            let earlyEndDateValue = $('.catergory-early-ticket-end-date').val();
            let normalEndDateValue = $('.catergory-general-ticket-end-date').val();
            let lateEndDateValue = $('.catergory-late-ticket-end-date').val();
            $(document).on('change', '.catergory-early-ticket-start-date', (event) => {
                $(".catergory-early-ticket-start-date").each(function (item) {
                    $('.catergory-early-ticket-start-date').val(event.target.value)
                });
            })

            $(document).on('change', '.catergory-general-ticket-start-date', (event) => {
                $(".catergory-general-ticket-start-date").each(function (item) {
                    $('.catergory-general-ticket-start-date').val(event.target.value)
                });
            })

            $(document).on('change', '.catergory-late-ticket-start-date', (event) => {
                $(".catergory-late-ticket-start-date").each(function (item) {
                    $('.catergory-late-ticket-start-date').val(event.target.value)
                });
            })

            $(document).on('change', '.catergory-early-ticket-end-date', (event) => {
                $(".catergory-early-ticket-end-date").each(function (item) {
                    $('.catergory-early-ticket-end-date').val(event.target.value)
                });
            })

            $(document).on('change', '.catergory-general-ticket-end-date', (event) => {
                $(".catergory-general-ticket-end-date").each(function (item) {
                    $('.catergory-general-ticket-end-date').val(event.target.value)
                });
            })

            $(document).on('change', '.catergory-late-ticket-end-date', (event) => {
                $(".catergory-late-ticket-end-date").each(function (item) {
                    $('.catergory-late-ticket-end-date').val(event.target.value)
                });
            })
            intIndex = 0
            $(document).on('click', '#add', function () {
                let earlyStartDateValue = $('.catergory-early-ticket-start-date').val();
                let normalStartDateValue = $('.catergory-general-ticket-start-date').val();
                let lateStartDateValue = $('.catergory-late-ticket-start-date').val();
                let earlyEndDateValue = $('.catergory-early-ticket-end-date').val();
                let normalEndDateValue = $('.catergory-general-ticket-end-date').val();
                let lateEndDateValue = $('.catergory-late-ticket-end-date').val();
                intIndex =
                    {!! $objEvent->category->count() !!}
                var html = '<div class="addedSection"><h3>Category' + intIndex + '</h3>';
                html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="category_type' + intIndex + '">Category</label> <input type="text" required id="category_type' + intIndex + '" name="category[' + intIndex + '][type]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-6"><div  class="form-group"><label for="category_subtype' + intIndex + '">Sub-Category</label><input required type="text" id="category_subtype' + intIndex + '" name="category[' + intIndex + '][subtype]" class="form-control item_category"></div></div></div>';

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][fee]" class="form-control item_category"></div></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][early][name]" class="form-control item_category" placeholder="Category fee..." value="early">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][quantity]" class="form-control item_category"></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket Start Date</label><input type="date" readonly value="' + earlyStartDateValue + '" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][start_date]" class="form-control catergory-early-ticket-start-date item_category"></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Early Bird Ticket End Date</label><input type="date" readonly value="' + earlyEndDateValue + '" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][early][end_date]" class="form-control catergory-early-ticket-end-date item_category"></div></div></div>';

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][fee]" class="form-control item_category"></div></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][quantity]" class="form-control item_category"></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][normal][name]" class="form-control item_category" placeholder="Category fee..." value="normal">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Start Date</label><input type="date" readonly value="' + normalStartDateValue + '" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][start_date]" class="form-control catergory-general-ticket-start-date item_category"></div></div>';
                html += '<div class="col-md-3"> <label for="category_fee' + intIndex + '">General Ticket End Date</label><input type="date" value="' + normalEndDateValue + '" readonly required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][normal][end_date]" class="form-control catergory-general-ticket-end-date item_category"></div> </div>'

                html += '<div class="row"><div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Late Fee</label><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][fee]" class="form-control item_category"></div></div></div>';
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">Late Ticket Quantity</label><input type="number" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][quantity]" class="form-control item_category"></div></div>';
                html += '<input type="hidden" required  id="category_fee_name' + intIndex + '" name="category[' + intIndex + '][fee][late][name]" class="form-control item_category" placeholder="Category fee..." value="late">\n'
                html += '<div class="col-md-3"><div  class="form-group"><label for="category_fee' + intIndex + '">General Ticket Start Date</label><input type="date" readonly  value="' + lateStartDateValue + '" required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][start_date]" class="form-control catergory-late-ticket-start-date item_category"></div></div>';
                html += '<div class="col-md-3"> <label for="category_fee' + intIndex + '">Late Ticket End Date</label><input type="date" value="' + lateEndDateValue + '" readonly required  id="category_fee' + intIndex + '" name="category[' + intIndex + '][fee][late][end_date]" class="form-control catergory-late-ticket-end-date item_category"></div></div>'


                html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
                $('#dynamic_field').append(html);
            });
            $(document).on('click', '.remove', function () {
                $(this).closest('.addedSection').remove();
            });
        })
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });


        var inttransportstartIndex = {!! $objEvent->start->count() !!}
        $(document).on('click', '#add_start_transportation', function () {
            var html = '<div class="addedSection"><h3>Add Transportation before Race</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="trans_start' + inttransportstartIndex + '">Location Name</label> <input type="text" required id="trans_start' + inttransportstartIndex + '" name="transstart[' + inttransportstartIndex + '][location]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="trans_start_fee' + inttransportstartIndex + '">Fee</label><input required type="number" id="trans_start_fee' + inttransportstartIndex + '" name="transstart[' + inttransportstartIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_start_transportation_fields').append(html);
            inttransportstartIndex = inttransportstartIndex + 1
        });

        var inttransportendIndex = {!! $objEvent->end->count() !!}
        $(document).on('click', '#add_end_transportation', function () {
            var html = '<div class="addedSection"><h3>Add Transportation After Race</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="trans_end' + inttransportendIndex + '">Location Name</label> <input type="text" required id="trans_end' + inttransportendIndex + '" name="transend[' + inttransportendIndex + '][location]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="trans_end_fee' + inttransportendIndex + '">Fee</label><input required type="number" id="trans_end_fee' + inttransportendIndex + '" name="transend[' + inttransportendIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_end_transportation_field').append(html);
            inttransportendIndex = inttransportendIndex + 1
        });

        var intAccomodationIndex = {!! $objEvent->accom->count() !!}
        $(document).on('click', '#add_accomodation', function () {
            var html = '<div class="addedSection"><h3>Add Accomodation</h3>';
            html += '<div class="row"><div class="col-md-6"><div  class="form-group"><label for="accomodation' + intAccomodationIndex + '">Accomodation Name</label> <input type="text" required id="accomodation' + intAccomodationIndex + '" name="accomodation[' + intAccomodationIndex + '][name]" class="form-control item_category"></div></div>';
            html += '<div class="col-md-6"><div  class="form-group"><label for="accomodation_fee' + intAccomodationIndex + '">Accomodation Fee</label><input required type="number" id="accomodation_fee' + intAccomodationIndex + '" name="accomodation[' + intAccomodationIndex + '][fee]" class="form-control item_category"></div></div></div>';
            html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
            $('#add_accomodation_field').append(html);
            intAccomodationIndex = intAccomodationIndex + 1
        });

    </script>
    <style>
        .addedSection {
            background-color: #bec4c6 !important;
            margin: 20px !important;
            padding: 10px !important;
        }
    </style>
@endsection

