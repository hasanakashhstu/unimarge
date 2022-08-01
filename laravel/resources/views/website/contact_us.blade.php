@extends('website.index')
@section('website_main_section')

    <!-- content start -->

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">

                <h2 class="page-title">Contact</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- contact area start -->
    <div class="contact-area pd-top-110 pd-bottom-120">
        <div class="container">
            <div class="section-title text-center">

                <h2 class="title">Get in touch</h2>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <!-- <div class="contact-page-thumb thumb"></div> -->

                    <ul class="details">
                        <li><i class="fa fa-map-marker"></i>{{$contact->address}}
                        </li>
                        <li><i class="fa fa-envelope"></i>{{$contact->email}}</li>
                        <li><i class="fa fa-phone"></i>{{$contact->Phone}}</li>
                    </ul>

                </div>
                <div class="col-lg-7 col-md-6 align-self-center">
                    <form class="contact-form-inner  mt-5 mt-md-0" action="" method="POST">
                        <input type="hidden" name="_token" value="">
                        <div class="row custom-gutters-20">
                            <div class="col-lg-6">
                                <label class="single-input-inner style-bg-border">
                                    <input type="text" name="first_name" placeholder="First Name" value="">
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="single-input-inner style-bg-border">
                                    <input type="text" name="last_name" placeholder="Last Name" value="">
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="single-input-inner style-bg-border">
                                    <input type="email" name="email" placeholder="Email" value="">
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="single-input-inner style-bg-border">
                                    <textarea placeholder="Message" name="message"> </textarea>
                                </label>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end-->

    <div class="contact-g-map">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29208.601361499546!2d90.3598076!3d23.7803374!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1589109092857!5m2!1sen!2sbd"></iframe> -->
        <iframe
                src="{{$contact->map_location}}"
                width="100%" height="550" style="border:0;" allowfullscreen="no" loading="lazy"></iframe>
{{--        <iframe--}}
{{--                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.03336548684!2d90.4701865147738!3d23.241872884842373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375505a119847cab%3A0xcf8973eae6c1b242!2sZ.%20H.%20Sikder%20University%20of%20Science%20and%20Technology!5e0!3m2!1sen!2sbd!4v1633286073867!5m2!1sen!2sbd"--}}
{{--                width="100%" height="550" style="border:0;" allowfullscreen="no" loading="lazy"></iframe>--}}
    </div>



    <!-- content end -->

@stop