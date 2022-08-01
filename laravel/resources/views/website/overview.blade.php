@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">About</h4>
                <h2 class="page-title">Overview</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area bg-white pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="team-details-page">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="wow zoomIn animated about-thumb" data-wow-duration="0.8s"
                             data-wow-delay="0.1s"
                             style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.1s; animation-name: zoomIn;">
                            <img src='{{URL::asset("$website_setup->image")}}' alt="img">
                        </div>
                    </div>
                    <div class="col-lg-4 align-self-start">
                        <div class="sidebar_r bg-light pd-10">
                            <h4 class="sidebarHeading">About</h4>
                            <hr>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/bot"><i class="fa fa-angle-right" aria-hidden="true"></i> BoT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/message_bot_chairman"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i> Messege of BoT Chairman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/message_bot_vc"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Messege of BoT VC</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/overview"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/mission_vision"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Vision, Mission & Strategy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/syndicate"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Syndicate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/academic"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Academic Council</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/frontend/about_us"><i class="fa fa-angle-right" aria-hidden="true"></i> About
                                        Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="details align-self-center text-justify pd-top-30">
                    <h2 class="mb-2">Overview</h2>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                              {!! $website_setup->overview !!}
                            
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facuty Member page end -->

@stop