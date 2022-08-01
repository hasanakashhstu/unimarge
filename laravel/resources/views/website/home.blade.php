@extends('website.index')
@section('website_main_section')

    <?php
    $founder_image = $founder[0]['image'];
    $chairman_image = $chairman[1]['image'];
    ?>



    <!-- banner start -->
    <div class="banner-area banner-area-1">
        <img class="animate-image-1 top_image_bounce" src="{{ asset('/assets/frontend/assets/img/banner/5.png') }}"
            alt="img">
        <div class="container">
            <div class="banner-slider owl-carousel">
                @foreach ($slider as $key => $slider_list)
                    <div class="item">
                        <div class="row justify-content-center">

                            <div class="col-lg-6 col-md-9 order-lg-12 align-self-center">
                                <div class="thumb banner-animate-thumb pl-lg-5">
                                    {{-- <img src="{{asset('/assets/uploads/images/banners/founder.png')}}" alt="img"> --}}
                                    <img src='{{ URL::asset($slider_list->image) }}' alt="img" width="400px"
                                        height="450px">
                                    @if ($slider_list->optional_text)
                                        <h3 class="al-animate-1 sub-title text-white text-center">
                                            {{ $slider_list->optional_text }}</h3>
                                    @else
                                        <h3 class="al-animate-1 sub-title text-white text-center"></h3>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-1 mt-5 mt-lg-0 align-self-center">
                                <div class="banner-inner style-white text-center text-lg-left">

                                    <h6 class="al-animate-1 title">{{ $slider_list->title }}</h6>
                                    @php
                                        if (strlen($slider_list->description) > 200) {
                                            $text = substr($slider_list->description, 0, 320);
                                            // dd($text,$website_setup->about_us);
                                        }
                                        
                                    @endphp

                                    <p class="al-animate-3">{{ $text }}...</p>
                                    {{-- <a class="btn btn-white al-animate-4" href="/frontend/about_us">Read More</a> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- banner end -->
    <!-- intro area start -->
    <div class="intro-area">
        <div class="container">
            <div class="intro-slider owl-carousel">
                <div class="item">
                    <a href="/login">
                        <div class="single-intro-inner bg-base style-white text-center">
                            <div class="details pd-30">
                                <h5><i class="fa fa-group"></i> Student Panel</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="/login">
                        <div class="single-intro-inner bg-info style-white text-center">
                            <div class="details pd-30">
                                <h5><i class="fa fa-group"></i> Teacher Panel</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="/login">
                        <div class="single-intro-inner bg-purple style-white text-center">
                            <div class="details pd-30">
                                <h5><i class="fa fa-group"></i> Parent Panel</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="single-intro-inner bg-success style-white text-center">
                            <!-- <div class="thumb">
                                                                <img src="public/frontend/assets/img/intro/4.png" alt="img">
                                                            </div> -->
                            <div class="details pd-30">
                                <h5><i class="fa fa-mail-forward"></i> Webmail</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro area end -->

    <!-- about area start -->
    <div class="about-area pd-top-90 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s"
                                data-wow-delay="0.1s">
                                <img src="{{ asset('/assets/images/about-bg-1.jpg') }}" alt="img">
                            </div>
                            <!-- <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s"
                                                                data-wow-delay="0.2s">
                                                                <img src="images/slider/slide-2.jpg" alt="img">
                                                            </div> -->
                        </div>
                        <!-- <div class="col-md-6">
                                                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s"
                                                                data-wow-delay="0.3s">
                                                                <img src="images/slider/slide-3.jpg" alt="img">
                                                            </div>
                                                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 align-self-center mt-3 mt-lg-0 pb-4 pb-lg-0">
                    <div class="section-title mb-0">
                        <h5 class="sub-title">About Z.H. SUST</h5>
                        <h4 class="title">Welcome to Z.H. Sikder University of Science and Technology</h4>
                        {{-- <p class="content text-justify">The Z. H. Sikder University of Science and Technology a --}}
                        {{-- coeducational --}}
                        {{-- privately owned university is dedicated to advancing knowledge and educating students in --}}
                        {{-- science, technology, and other areas of scholarship that will best serve the nation and --}}
                        {{-- the world in the 21st century. The University has been established in 2012 and planned --}}
                        {{-- to be organized into four faculties...</p> --}}
                        @php
                            if (strlen($website_setup->about_us) > 200) {
                                $text = substr($website_setup->about_us, 0, 400);
                                // dd($text,$website_setup->about_us);
                            }
                            
                        @endphp
                        <p class="content text-justify"> {!! $text !!} </p>
                        <a class="btn btn-base" href="/frontend/about_us">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- admission start -->
    <div class="about-area pd-top-90 pd-bottom-90 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="thumb about-thumb wow animated zoomIn pd-top-30" data-wow-duration="0.8s"
                                data-wow-delay="0.1s">
                                <img src="{{ asset('/assets/images/slider/slide-1.jpg') }}" alt="img" height="400px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 align-self-end mt-3 mt-lg-0 pb-4 pb-lg-0">
                    <div class="section-title mb-0">
                        <h5 class="sub-title">Admission is going on</h5>
                        <h4 class="title">We are one of the largest, most diverse universities with over 900
                            students in Bangladesh.</h4>
                        <p class="content text-justify">{!! $text !!}</p>
                        <p class="text-right"> <a class="btn btn-base" href="/frontend/online-admission">Apply Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- admission end -->

    <!-- course section start -->
    <?php
    //  @foreach($nav_dept as $key => $value)
    $nav_dept = collect($manage_department)->all();
    //            dd($nav_dept,$manage_department);
    ?>

    <div class="course-area pd-top-70 pd-bottom-70  bg-parallax">
        <div class="container">

            <div class="row">
                @foreach ($nav_dept as $key => $value)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-course-inner">
                            <div class="thumb">
                                <img style="display: block; height: 130px; width: 100%;"
                                    src='{{ Storage::url($value->image) }}' alt="Department Image">
                            </div>
                            <div class="details">
                                <h5><a href="">{{ $value->department_name }}</a>
                                </h5>
                                <div class="btn-area ">
                                    <div class="row">
                                        <div class="col-12 text-md-right text-right">
                                            <a class="btn btn-border-base b-animate-3"
                                                href="{{ url('/') }}/frontend/department/{{ $value->department_code }}">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>
        </div>
    </div>
    <!-- course section End -->

    <!-- video area start -->
    <div class="video-area pd-top-110 pd-bottom-120 jarallax">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title mb-2 text-center">
                        <h2 class="title">Video Tour in Z.H. SUST</h2>
                        <p>Take a tour in Z.H. SUST and you will find the best university in the Shariatpur. The
                            video will take you to every places in this university.</p>
                        <a class="video-play-btn" href="{{ $website_setup->video_link }}" data-effect="mfp-zoom-in"><i
                                class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="jarallax-container-0"
            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
            <div style="background-position: 50% 50%; background-size: cover; background-repeat: no-repeat;
                                                    background-image: url(&quot;image/about-bg-2.jpg&quot;); position: fixed; top: 0px; left: 0px;
                                                    width: 1519.2px; height: 474.9px; overflow: hidden; pointer-events: none; margin-top: -28.45px;
                                                    transform: translate3d(0px, 146.519px, 0px);">
            </div>
        </div>
    </div>

    <!-- video area end -->



    <!-- start news & event section -->
    <div class="blog-area pd-top-70 pd-bottom-70 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 ">
                    <div class="section-title text-left ">
                        <!-- <h5 class="sub-title">Latest News</h5> -->
                        <h2 class="title text-before-left">Latest News</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="section-title text-right ">
                        <!-- <h5 class="sub-title">Latest News</h5> -->
                        <h2 class="title text-before-right">Latest Notice</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="news scroller">
                            @if ($news->isNotEmpty())
                                @foreach ($news as $news_list)
                                    <div class="row individual_news">
                                        <div class="col-md-2 float-left">
                                            <img src='https://via.placeholder.com/50x50?text=News' alt="News">
                                        </div>
                                        <div class="col-md-10 ml-6">
                                            <h5 class="text-left news-title" style="height: max-content"><a
                                                    href="{{ url('news/' . $news_list->website_news_id) }}">{{ $news_list->title }}</a>
                                            </h5>
                                            <p>Publish Date: {{ str_limit($news_list->news_date, 10) }}</p>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="text-center news-title mt-3">NO NEWS TO SHOW</h5>
                            @endif
                        </div>
                        <div class="text-right mg-top-25">
                            <a class="btn btn-border-base b-animate-3 " href="{{ url('news') }}">Read All News</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pd-bottom-40">
                    <div class="news-slider slider-control-square owl-carousel">
                        @if ($notice->isNotEmpty())
                            @foreach ($notice as $notice_list)
                                <div class="col-md-12 no-padding-margin">
                                    <div class="single-blog-inner">
                                        <div class="thumb">
                                            <img src="{{ asset('/assets/frontend/assets/img/blog/1.png') }}" alt="img">
                                        </div>
                                        <div class="details">
                                            <h4><a
                                                    href="{{ url('frontend/notice/' . $notice_list->notice_id) }}">{{ str_limit($notice_list->notice_title, 50) }}</a>
                                            </h4>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i> Publish
                                                        Date:&nbsp;{{ $notice_list->created_at->format('Y-m-d') }} </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="text-center news-title mt-3">NO Notice TO SHOW</h5>
                        @endif
                    </div>
                    <div class="text-right mgtop">
                        <a class="btn btn-border-base b-animate-3 " href="{{ url('frontend/notice') }}">Read All
                            Notice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--News & event section end-->

    <!-- events -->
    <div class="event pd-top-70 pd-bottom-90 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 ">
                    <div class="section-title text-left ">
                        <h4 class="title text-before-left">Recent Events</h4>
                    </div>
                    <div class="news scroller">

                        @if ($recentEvents->isNotEmpty())
                            @foreach ($recentEvents as $recentEvent)
                                <div class="row individual_news">
                                    <div class="col-md-2 float-left thumb">
                                        <img src='{{ Storage::url($recentEvent->image) }}' alt="Image">
                                    </div>
                                    <div class="col-md-10 float-right">
                                        <h5 class="text-left news-title"><a
                                                href="{{ url('events/' . $recentEvent->website_events_id) }}">{{ $recentEvent->title }}</a>
                                        </h5>
                                        <hr>
                                        <p><i class="fa fa-calendar"></i>
                                            {{ $recentEvent->start_date->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="text-center news-title">NO Events TO SHOW</h5>
                        @endif

                    </div>
                    <div class="text-right mg-top-25">
                        <a class="btn btn-border-base b-animate-3 " href="{{ url('events?type=recent') }}">All Recent
                            Events</a>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="section-title text-left">
                        <h4 class="title text-before-right">Upcomming Events</h4>
                    </div>
                    <div class="news scroller bg-white">
                        @if ($upcommingEvents->isNotEmpty())
                            @foreach ($upcommingEvents as $upcommingEvent)
                                <div class="row individual_news">
                                    <div class="col-md-2 float-left thumb">
                                        <img src='{{ Storage::url($upcommingEvent->image) }}' alt="Image">
                                    </div>
                                    <div class="col-md-10 float-right">
                                        <h5 class="text-left news-title"><a
                                                href="{{ url('events/' . $upcommingEvent->website_events_id) }}">{{ $upcommingEvent->title }}</a>
                                        </h5>
                                        <hr>
                                        <p><i class="fa fa-calendar"></i>
                                            {{ $upcommingEvent->start_date->format('Y-m-d') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="text-center news-title">NO Events TO SHOW</h5>
                        @endif
                    </div>
                    <div class="text-right mg-top-25">
                        <a class="btn btn-border-base b-animate-3 " href="{{ url('events?type=upcomming') }}">All
                            Upcomming Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end events -->







    <!-- content end -->
@stop
