@extends('website.index')
@section('website_main_section')
    <style>
        .owl-carousel .item {
            height: 10rem;
            /*background: #4DC7A0;*/
            padding: 1rem;
        }

        .owl-carousel .item h4 {
            color: #FFF;
            font-weight: 400;
            margin-top: 0rem;
        }
    </style>

    <!-- content start -->

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center coursetitle">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">Academic</h4>
                <h2 class="page-title">{{ $department->department_name }}</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- chairperson section -->
    <div class="main-blog-area pd-top-100 pd-bottom-90 bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="bg-base color-white text-line-height">Welcome to {{ $department->department_name }}</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12 pd-10">
                    <div class="course-details-page">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="thumb">
                                    @if ($department->departmentHead)
                                        <img src="{{ Storage::url($department->departmentHead->photo) }}" alt="Photo">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 align-self-center">
                                <div class="details">
                                    @if ($department->departmentHead)
                                        <h3 class="mb-1">Head of the Department's Message</h3>
                                        <hr>
                                        <h4 class="name">{{ $department->departmentHead->teacher_name }}</h4>
                                        <p class="faculty-name">{{ $department->getFaculty->faculty_name }}</p>
                                        <p class="designation">Head of the Department</p>
                                        <p class="department-name">{{ $department->department_name }}</p>

                                        <ul class="social-media style-base pt-4">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"
                                                        style="line-height: 32px;"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"
                                                        style="line-height: 32px;"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"
                                                        style="line-height: 32px;"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"
                                                        style="line-height: 32px;"></i></a>
                                            </li>
                                        </ul>
                                    @else
                                        <p class="text-danger">Head of the Department details not available!</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if (isset($message))
                            <div class="row pd-top-20">
                                <div class="col-lg-12">
                                    <p class="text-justify">{{ $message->chairperson }}...</p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="align-self-lg-end text-right pd-top-20">
                                        <a class="btn btn-border-base b-animate-3 text-right" href="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- sidebar -->
                <div class="col-lg-3 col-12 pd-10">
                    @include('website.includes.academic_sidebar')
                </div>
                <!-- /.sidebar -->
            </div>
        </div>
    </div>
    <!-- end chairperson section -->



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
                                            <p style="font-size: 12px">{!! str_limit($notice_list->Notice, 100) !!}</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i> Publish
                                                        Date:&nbsp;{{ str_limit($notice_list->created_at, 10) }} </li>
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


    <!-- faculty-members -->
    <div class="faculty-members pd-top-70 pd-bottom-70">
        <div class="container">
            <div class="row text-center mg-bottom-40">
                <div class="col-lg-12">
                    <h1 class="title ">Faculty Member</h1>
                    <p>Our honorable faculty members. They are continuously contributing.</p>
                </div>
            </div>
            <div class="row dept-faculty-member-slider slider-control-square owl-carousel">

                @foreach ($teacher_info as $teacher_info_list)
                    <div class="col-lg-12 col-sm-12">
                        <div class="single-team-inner text-center">
                            <div class="thumb">
                                <img src="{{ Storage::url($teacher_info_list->photo) }}" alt="Photo" width="100%"
                                    height="300px;">
                            </div>
                            <div class="details">
                                <h5><a href="individual-faculty-members.html">{{ $teacher_info_list->teacher_name }}</a>
                                </h5>
                                <p>{{ $teacher_info_list->designation }}</p>
                                <ul class="social-media">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"
                                                style="line-height:27px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"
                                                style="line-height:27px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"
                                                style="line-height:27px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"
                                                style="line-height:27px;"></i></a>
                                    </li>
                                </ul>
                                <div class="pd-20">
                                    <div class="row">
                                        <div class="col-12 text-md-center text-center">
                                            <a class="btn bg-light b-animate-3"
                                                href="/frontend/faculty_profile/{{ $teacher_info_list->teacher_id }}">View
                                                Profile</a>
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
    <!-- end faculty-members -->

    <!-- gallery -->
    <div class="course-area pd-top-115 pd-bottom-90 bg-parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title style-white text-md-left text-left">
                        <!-- <h5 class="sub-title">New Courses</h5> -->
                        <h2 class="title">Gallery</h2>
                    </div>
                    <div class="course-slider slider-control-square owl-carousel">
                        @foreach ($gallery as $gallery_list)
                            <div class="item col-lg-12">
                                <div class="single-course-inner">
                                    <div class="">
                                        <img src='{{ Storage::url("$gallery_list->image") }}' alt="img">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-1 color-white">Why study in {{ $department->department_name }}?</h3>
                    <hr>
                    @if (isset($message))
                        <p class="text-justify color-white">{{ $message->study }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery -->

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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <script>
        jQuery(document).ready(function($) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        })
    </script>
    <!-- content end -->


    {{-- <script src="{{asset('/assets/frontend/assets/js/vendor.js')}}"></script> --}}
    {{-- <!-- main js  --> --}}
    {{-- <script src="{{asset('/assets/frontend/assets/js/main.js')}}"></script> --}}


@stop
