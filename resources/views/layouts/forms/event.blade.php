@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div class="text-center">
                <h3>Event Participation</h3>
            </div>
            <form method="POST" action="{{url('event/register')}}" autocomplete="off" >
                @csrf
                <input type="hidden" name="event_id" value="{{$objEvent->id}}">
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
                    <h6>{{$objEvent->organiser_contact_number}}</h6>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Event Date</label>
                    <h6>{{$objEvent->event_date}}</h6>
                </div>

{{--                <div class="payment-online">--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="cc-number" class="control-label">Card number formatting <small class="text-muted">[<span class="cc-brand"></span>]</small></label>--}}
{{--                        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="cc-exp" class="control-label">Card expiry formatting</label>--}}
{{--                        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="cc-cvc" class="control-label">Card CVC formatting</label>--}}
{{--                        <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="numeric" class="control-label">Restrict numeric</label>--}}
{{--                        <input id="numeric" type="tel" class="input-lg form-control" data-numeric>--}}
{{--                    </div>--}}

{{--                    <h2 class="validation"></h2>--}}
{{--                </div>--}}

                <div class="payment-offline">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        $("#category").on('change', function(){
            let str = "";
            $( "select option:selected" ).each(function() {
                str += $( this ).data('price') + " ";
            });
            $('#price').html(str)
        });
        // jQuery(function($) {
        //     $('[data-numeric]').payment('restrictNumeric');
        //     $('.cc-number').payment('formatCardNumber');
        //     $('.cc-exp').payment('formatCardExpiry');
        //     $('.cc-cvc').payment('formatCardCVC');
        //
        //     $.fn.toggleInputError = function(erred) {
        //         this.parent('.form-group').toggleClass('has-error', erred);
        //         return this;
        //     };
        //
        //     $('form').submit(function(e) {
        //         var data = $('form').serialize();
        //         e.preventDefault();
        //
        //         var cardType = $.payment.cardType($('.cc-number').val());
        //         $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
        //         $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
        //         $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
        //         $('.cc-brand').text(cardType);
        //
        //         $('.validation').removeClass('text-danger text-success');
        //         $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
        //     });
        // });
    </script>

@endsection

