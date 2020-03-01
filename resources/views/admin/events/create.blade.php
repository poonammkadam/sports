@extends('admin.admin_template')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="{{url('admin/events/store')}}">
                            @csrf
                            <input type="hidden" name="field" value="admin">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Event title</label>

                                <div class="col-md-6">
                                    <input id="name" required type="text" class="form-control " name="name" value=""  autocomplete="name" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Event Description</label>

                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control " name="description"   autocomplete="description">
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Add Event Type</label>
                                <button type="button" name="add" id="add" class="btn btn-outline-dark" onclick="addEventType()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                <div id="dynamic_field"></div>
                            </div>

                            <div class="form-group">
                                    <label for="register_expire_date">Registration Expire Date</label>
                                    <input required type="datetime-local" class="form-control" id="register_expire_date" name="register_expire_date" placeholder="">
                            </div>

                            <div class="form-group">
                                    <label for="eventdate">Event Date</label>
                                    <input required type="datetime-local" class="form-control" id="eventdate" name="eventdate" placeholder="" >
                            </div>


                            <div class="form-group row">
                                    <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                    <div class="col-md-6">
                                        <input required id="venue" type="text" class="form-control" name="venue"  autocomplete="venue" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label for="orgname" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                                    <div class="col-md-6">
                                        <input required id="orgname" type="text" class="form-control " name="orgname"  autocomplete="orgname" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="org_contact_no" class="col-md-4 col-form-label text-md-right">Organization Contact No.</label>
                                <div class="col-md-6">
                                    <input required id="org_contact_no" type="text" class="form-control " name="org_contact_no"  autocomplete="org_contact_no" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="org_address" class="col-md-4 col-form-label text-md-right">Organization Address</label>
                                <div class="col-md-6">
                                    <textarea required  id="org_address" type="text" class="form-control " name="org_address"  autocomplete="org_address" autofocus rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="banner" class="col-md-4 col-form-label text-md-right">Upload Banner</label>
                                    <div class="col-md-6">
                                        <input required id="banner" type="file" class="" name="banner" >
                                    </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
@endsection
<script type="text/javascript">
    function addEventType() {
        var input = document.createElement("input");
        var intIndex = $(document).find("#dynamic_field .event-type").length;
        input.type = "text";
        input.name = "category["+intIndex+"][type]";
        input.placeholder = 'Enter Gender';
        var div = document.createElement("div");
        div.className = 'event-type form-group';
        div.innerHTML = 'Add Event Gender:';
        div.appendChild(input);

        var input2 = document.createElement("input");
        input2.type = "text";
        input2.placeholder = 'Event Distance';
        input2.name = "category["+intIndex+"][subtype]";
        div.appendChild(input2);

        var input3 = document.createElement("input");
        input3.type = "text";
        input3.placeholder = 'Event fee';
        input3.name = "category["+intIndex+"][fee]";
        div.appendChild(input3);

        var input4 = document.createElement("input");
        input4.type = "button";
        input4.name = "remove_type";
        input4.className = "remove_type";
        input4.value = "Remove";
        div.appendChild(input4);
        document.getElementById("dynamic_field").appendChild(div);

        $(document).ready(function () {
            $(document).on('click', '.remove_type', function (event) {
                $(this).parent().remove();
            });
        });
    }
</script>
