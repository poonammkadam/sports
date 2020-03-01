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

                <div class="payment-online">

                    <div class="form-group owner">
                        <label for="owner">Owner</label>
                        <input type="text" name="cc_owner" class="form-control" id="owner">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" name="cc_cvv" class="form-control" id="cvv">
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" name="cc_cardnumber" class="form-control" id="cardNumber">
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label for="expdate">Expiration Date</label>
                        <select id="expdate" class="form-control" name="cc_month">
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <label>
                            <select class="form-control" name="cc_year">
                                <option value="16"> 2016</option>
                                <option value="17"> 2017</option>
                                <option value="18"> 2018</option>
                                <option value="19"> 2019</option>
                                <option value="20"> 2020</option>
                                <option value="21"> 2021</option>
                                <option value="22"> 2022</option>
                                <option value="23"> 2023</option>
                                <option value="24"> 2024</option>
                                <option value="25"> 2025</option>
                                <option value="26"> 2026</option>
                                <option value="27"> 2027</option>
                                <option value="28"> 2028</option>
                                <option value="29"> 2029</option>
                                <option value="30"> 2030</option>
                                <option value="31"> 2031</option>
                                <option value="32"> 2032</option>
                                <option value="33"> 2033</option>
                                <option value="34"> 2034</option>
                                <option value="35"> 2035</option>
                                <option value="36"> 2036</option>
                                <option value="37"> 2037</option>
                                <option value="38"> 2038</option>
                                <option value="39"> 2039</option>
                                <option value="40"> 2040</option>
                                <option value="41"> 2041</option>
                                <option value="42"> 2042</option>
                                <option value="43"> 2043</option>
                                <option value="44"> 2044</option>
                                <option value="45"> 2045</option>
                                <option value="46"> 2046</option>
                                <option value="47"> 2047</option>
                                <option value="48"> 2048</option>
                                <option value="49"> 2049</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="{{asset('/images/visa.jpg')}}" id="visa">
                        <img src="{{asset('/images/mastercard.jpg')}}" id="mastercard">
                        <img src="{{asset('/images/amex.jpg')}}" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
                    </div>
                </div>

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

