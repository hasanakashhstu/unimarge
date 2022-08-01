@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">{{ $department->department_name }} / Academic </h4>
                <h2 class="page-title">Former Head of The Department</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 pd-10">
                    <div class="course-details-page">
                        @if ($departmentHead)
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="thumb">
                                        <img src="{{ $departmentHead->photo ? Storage::url($departmentHead->photo) : asset('img/blankavatar.png') }}"
                                            alt="Image">
                                    </div>
                                </div>
                                <div class="col-lg-8 align-self-center">
                                    <div class="details">
                                        <h4 class="name">{{ $departmentHead->teacher_name }}</h4>
                                        <p class="designation">{{ $departmentHead->designation }}</p>
                                        <p class="department-name">{{ $departmentHead->department->department_name }}</p>
                                        <div class="contact-area no-padding-margin">
                                            <ul class="details no-padding-margin">
                                                <li><i class="fa fa-map-marker"></i>Dhaka Bangladesh
                                                    P.S.: {{ $departmentHead->address->post_office }}, Dist.:
                                                    {{ $departmentHead->address->home_district }}
                                                </li>
                                                <li><i class="fa fa-envelope"></i>{{ $departmentHead->email }}</li>
                                                <li><i class="fa fa-phone"></i> {{ $departmentHead->mobile_no }}</li>
                                            </ul>
                                            <ul class="social-media style-base no-padding-margin">
                                                <li>
                                                    <a href="{{ $departmentHead->social_network_1 }}" target="_blank"><i
                                                            class="fa fa-facebook" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $departmentHead->social_network_2 }}" target="_blank"><i
                                                            class="fa fa-twitter" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $departmentHead->social_network_3 }}" target="_blank"><i
                                                            class="fa fa-instagram" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $departmentHead->social_network_4 }}" target="_blank"><i
                                                            class="fa fa-pinterest" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @else
                            <p class="text-center text-danger">Information is not available! Comming soon...</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('website.includes.academic_sidebar')
                </div>

            </div>
        </div>
    </div>
    <!-- Facuty Member page end -->

@stop
