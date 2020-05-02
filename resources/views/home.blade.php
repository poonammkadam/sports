@extends('layouts.app')
@section('content')
    <section id="intro">
        <div class="intro-container wow fadeIn">
            <h1 class="mb-4 pb-0">The Annual<br><span>Marketing</span> Conference</h1>
            <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
               data-autoplay="true"></a>
            <a href="#about" class="about-btn scrollto">About The Event</a>
        </div>
    </section>

    <!-- end header section -->

    <!-- about section -->
    <section id="speakers" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header">
                <h2>Events</h2>
                <p>Here are some of our events</p>
            </div>

            <div class="row">
                @if(($arrObjEvents->count())>0)

                    @foreach($arrObjEvents as $objEvent)
                        <div class="col-lg-4 col-md-6">
                            <div class="speaker">
                                <img src="{{'public/'.$objEvent->banner}}" alt="Speaker 1" class="img-fluid">
                                <div class="details">
                                    <h3>{{$objEvent->name}}</h3>
                                    <h4 class="text-white  mb-0"><i
                                            class="fa fa-map-marker mr-1">{{$objEvent->venue}}</i>
                                    </h4>
                                    <p>{{  date('l j F Y', strtotime($objEvent->registration_end_date))}}</p>
                                    <a href="{{'event/'.$objEvent->id}}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>


    <!-- about section -->

    <!-- teacher section -->
    <section id="supporters" class="section-with-bg wow fadeInUp"
             style="visibility: visible; animation-name: fadeInUp;">

        <div class="container">
            <div class="section-header">
                <h2>Sponsors</h2>
            </div>

            <div class="row no-gutters supporters-wrap clearfix">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/1.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/4.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/5.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/6.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/7.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="supporter-logo">
                        <img src="img/supporters/8.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section id="subscribe">
        <div class="container wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="section-header">
                <h2>Newsletter</h2>
                <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
            </div>

            <form method="POST" action="#">
                <div class="form-row justify-content-center">
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Enter your Email">
                    </div>
                    <div class="col-auto">
                        <button type="submit">Subscribe</button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <section id="contact" class="section-bg wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

        <div class="container">

            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Nihil officia ut sint molestiae tenetur.</p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>A108 Adam Street, NY 535022, USA</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>

            </div>

            <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validation"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                   data-rule="email" data-msg="Please enter a valid email">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                               data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required"
                                  data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </div>

        </div>
    </section>


    </main>








@endsection
