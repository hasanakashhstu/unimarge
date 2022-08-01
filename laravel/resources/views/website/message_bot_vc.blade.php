@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">About</h4>
                <h2 class="page-title">Messege of BoT VC</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area bg-white pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="team-details-page">
                <div class="row">
                    @if ($teacher)
                        <div class="col-lg-4">
                            <div class="thumb">
                                <img src="{{ Storage::url($teacher->photo) }}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-4 align-self-center">
                            <div class="details">
                                <h3 class="mb-1">{{ $teacher->teacher_name }}</h3>
                                <p class="">{{ $teacher->designation }}</p>
                                <p class="">Email : {{ $teacher->email }}</p>
                                <p class="">Address: {{ $teacher->home_district }}</p>
                                <ul class="social-media style-base pt-4">
                                    <li>
                                        <a href="{{ $teacher->social_network_1 }}"><i class="fa fa-facebook"
                                                aria-hidden="true" style="line-height: 34px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $teacher->social_network_2 }}"><i class="fa fa-twitter"
                                                aria-hidden="true" style="line-height: 34px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $teacher->social_network_3 }}"><i class="fa fa-instagram"
                                                aria-hidden="true" style="line-height: 34px;"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $teacher->social_network_4 }}"><i class="fa fa-pinterest"
                                                aria-hidden="true" style="line-height: 34px;"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-8">
                            <p class="text-danger text-center">No Information Available!</p>
                        </div>
                    @endif
                    <div class="col-lg-4 align-self-start">
                        <div class="sidebar_r bg-light pd-10">
                            <h4 class="sidebarHeading">About</h4>
                            <hr>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/bot"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i> BoT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/message_bot_chairman"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i> Messege of BoT Chairman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/message_bot_vc"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i>
                                        Messege of BoT VC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/overview"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i>
                                        Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/mission_vision"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i>
                                        Vision, Mission & Strategy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/syndicate"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i>
                                        Syndicate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/academic"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i>
                                        Academic Council</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/about_us"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i> About
                                        Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-area1 pd-top-100">
                <h2 class="mb-2">Messege of BoT VC</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <p> {!! $website_setup->principle_message !!} </p>
                        <hr>
                        {{-- <b>Name, Degrees</b> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facuty Member page end -->

@stop
