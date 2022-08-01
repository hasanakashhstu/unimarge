
<!-- footer area start -->
<footer class="footer-area bg-overlay-rgba">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_contact">

                        <h4 class="widget-title">Contact Us</h4>
                        <ul class="details">
                            <li><i class="fa fa-map-marker"></i>{{$general_settings->address}}
                            </li>
                            <li><i class="fa fa-envelope"></i>{{$general_settings->email}}</li>
                            <li><i class="fa fa-phone"></i>{{$general_settings->Phone}}</li>
                        </ul>
                        <ul class="social-media">
                            <li>
                                <a href="{{$general_settings->social_network_1}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true" style="line-height: 32px;"></i></a>
                            </li>
                            <li>
                                <a href="{{$general_settings->social_network_2}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="line-height: 32px;"></i></a>
                            </li>
                            <li>
                                <a href="{{$general_settings->social_network_3}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="line-height: 32px;"></i></a>
                            </li>
                            <li>
                                <a href="{{$general_settings->social_network_4}}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true" style="line-height: 32px;"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widget widget_nav_menu">

                        <h4 class="widget-title">About Us</h4>
                        <ul>
                            <li><a href="">Contact Us </a></li>
                            <li><a href="">Register Office</a></li>
                            <li><a href="">Office of the Chancellor</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                            <li><a href="">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <?php
                //  @foreach($nav_dept as $key => $value)
                $nav_dept = collect($manage_department)->all();
                //            dd($nav_dept,$manage_department);
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">Academic </h4>
                        <ul>
                            @foreach($nav_dept as $key => $value)
                                <li><a href="{{url('/')}}/frontend/department/{{$value->department_code}}">{{$value->department_name}}</a></li>
                            @endforeach
{{--                            <li><a href="">Department of Computer Science & Engineering</a></li>--}}
{{--                            <li><a href="">Department of Chemical Engineering </a></li>--}}
{{--                            <li><a href="">Department of Electrical & Electronic Engineering</a></li>--}}
{{--                            <li><a href="">Department of Civil Engineering</a></li>--}}
{{--                            <li><a href="">Department of LAW</a></li>--}}
{{--                            <li><a href="">Department of Business Administration</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 pl-lg-5 pr-5 pr-lg-0">
                    <div class="widget widget_nav_menu">

                        <h4 class="widget-title">Quick Links</h4>

                        <ul>
                            <li><a href="/frontend/online-admission">Apply Now</a></li>
                            <li><a href="">Live Class</a></li>
                            <li><a href="">Library</a></li>
                            <li><a href="">Alumuni</a></li>
                            <li><a href="{{ url('news') }}">News</a></li>
                            <li><a href="{{ url('frontend/notice') }}">Notice</a></li>
                            <li><a href="">Career</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-4 align-self-center">
                    <a href="index.html"><img src="public/uploads/images/logo/new-logo.png" alt="img"></a>
                </div> -->
                <div class="col-md-12 text-md-center align-self-center mt-lg-0 mt-3">
                    <p>© <a href="https://nicesoftware.com.bd/" target="_blank">NIMBLE Code Execution System (NICE System)</a>. All Right Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->

<!-- back to top area end -->