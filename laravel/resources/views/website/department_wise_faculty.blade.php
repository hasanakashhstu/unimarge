@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">{{ $department->department_name }} / Academic / </h4>
                <h2 class="page-title">Facuty Members</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pd-10">
                    <div class="row">
                        @forelse ($teachers as $teacher)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-team-inner text-center">
                                    <div class="thumb">
                                        <img
                                            src="{{ $teacher->photo ? Storage::url($teacher->photo) : asset('img/blankavatar.png') }}" />
                                    </div>
                                    <div class="details">
                                        <h5><a href="">{{ $teacher->teacher_name }}</a>
                                        </h5>
                                        <p>{{ $teacher->designation }}</p>
                                        <ul class="social-media">
                                            <li>
                                                <a href="{{ $teacher->social_network_1 }}" target="_blank"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $teacher->social_network_2 }}" target="_blank"><i
                                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $teacher->social_network_3 }}" target="_blank"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $teacher->social_network_4 }}" target="_blank"><i
                                                        class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                        <div class="pd-20">
                                            <div class="row">
                                                <div class="col-12 text-md-center text-center">
                                                    <a class="btn bg-light b-animate-3"
                                                        href="{{ url('frontend/faculty_profile/' . $teacher->teacher_id) }}">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-danger">No Teacher Available in this Department!</p>
                        @endforelse
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
