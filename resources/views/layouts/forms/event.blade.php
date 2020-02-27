@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Parti</h3>
            </div>
            <form method="POST" autocomplete="off" action="{{url('event/register')}}">
                @csrf
                <h2>{{$objEvent->name}}</h2>
                <br>
                <select class="form-control custom-select" name="event_category" id="category">
                    <option>Select event</option>
                @foreach($objEvent->category as $index => $prate)
                        <option class="cate" data-price={{$prate->amount}} value="{{$prate->id}}">{{$prate->category_type}} {{$prate->category_subtype}}</option>
                 @endforeach
                </select>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Fee</label>
                    <h6 id="price">-</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Organizer</label>
                    <h6>{{$objEvent->organiser_name}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Number</label>
                    <h6>{{$objEvent->organiser_contact_number}}-</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Date</label>
                    <h6>{{$objEvent->event_date}}-</h6>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        $("#category").on('change', function(){
            var str = "";
            $( "select option:selected" ).each(function() {
                str += $( this ).data('price') + " ";
            });
            $('#price').html(str)
            // var color = colorsMap[item];
            // document.getElementById("salute").style.color = color;


        });
        // function getAmount(category_id){
        //     var categoryid=category_id.options[category_id.selectedIndex].dataset('price')
        // console.log(categoryid)
        // }
    </script>
@endsection

