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
                                    <textarea id="description"  class="form-control " name="description"  autocomplete="description">
                                    </textarea>
                                </div>
                            </div>

                            <button type="button" name="add" id="add" class="btn offset-md-4 btn-outline-dark"><i class="fa fa-plus" aria-hidden="true"></i></button>

                            <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right" for="dynamic_field" >Add Event Type</label>

                                <div id="dynamic_field">
                                    <div class="addedSection">
                                        <label for="category_type0">Category</label> <input type="text" required id="category_type0" name="category[0][type]" class="form-control item_category">
                                        <label for="category_subtype0">Sub-Category</label><input required type="text" id="category_subtype0" name="category[0][subtype]" class="form-control item_category">
                                        <label for="category_fee0">Fee</label><input type="text" required  id="category_fee0" name="category[0][fee]" class="form-control item_category">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="register_expire_date" class="col-md-4 col-form-label text-md-right">Registration Expire Date</label>
                                <div class="col-md-6">
                                <input required type="datetime-local" class="form-control" id="register_expire_date" name="register_expire_date" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="eventdate" class="col-md-4 col-form-label text-md-right">Event Date</label>
                                <div class="col-md-6">
                                    <input required type="datetime-local" class="form-control" id="eventdate" name="eventdate" placeholder="" >
                                </div>
                                </div>


                            <div class="form-group row">
                                    <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                                    <div class="col-md-6">
                                        <input required id="venue" type="text" class="form-control" name="venue"  autocomplete="venue" autofocus>
                                    </div>
                            </div>

                            <div class="form-group row">
                            <label for="tshirt">Select Organistion</label>
                             <select id="org" class="form-control custom-select" name="organisation">
                                <option selected>Open this select menu</option>
                                @foreach($arrObjOrganisation as $objOrg)
                                <option value="{{$objOrg->id}}">{{$objOrg->name}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Is pickup and drop available</label>

                                <div class="col-md-6">
                                  <input type="radio" required class="pick_up_yes" name="pickup_drop"  value="yes">Yes
                                  <input type="radio" required class="pick_up_no" name="pickup_drop" value="no">No
                                </div>
                            </div>

                            <div class="form-group row" id="pickup_drop_available" style="display: none">
                                <label for="pickup_drop" class="col-md-4 col-form-label text-md-right">Is pickup and drop Location</label>
                                <div class="col-md-6">
                                    <textarea required  id="pickup_drop" type="text" class="form-control"  name="pickup_drop"  autocomplete="pickup_drop"  rows="3"></textarea>
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

    <script type="text/javascript">
		$(document).ready(function(){
			var intIndex = 0
				$(document).on('click', '#add', function(){
					intIndex= intIndex + 1
					var html = '<div class="addedSection">';
					html += '<div  class="form-group"><label for="category_type'+intIndex+'">Category</label> <input type="text" required id="category_type'+intIndex+'" name="category['+intIndex+'][type]" class="form-control item_category"></div>';
					html += '<div  class="form-group"><label for="category_subtype'+intIndex+'">Sub-Category</label><input required type="text" id="category_subtype'+intIndex+'" name="category['+intIndex+'][subtype]" class="form-control item_category"></div>';
					html += '<div  class="form-group"><label for="category_fee'+intIndex+'">Fee</label><input type="text" required  id="category_fee'+intIndex+'" name="category['+intIndex+'][fee]" class="form-control item_category"></div>';
					html += '<div class="form-group"><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></div></div>';
					$('#dynamic_field').append(html);
				});
			$(document).on('click', '.remove', function(){
				$(this).closest('.addedSection').remove();
			});
		})


    </script>
@endsection

