@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center">
        <div class="container">
            <div class="breadcrumb-inner">
                {{-- <h4>Office of The</h4> --}}
                <h2 class="page-title">{{ $office->name }}</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- Facuty Member page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 pd-10">
                    <div class="course-details-page">
                        <div class="row">
                            @forelse ($headandSubHeads as $headandSubHead)
                                <div class="col-lg-4 mb-3">
                                    <div class="thumb">
                                        <img src="{{ Storage::url($headandSubHead->teacher->photo) }}" alt="Photo">
                                    </div>
                                </div>
                                <div class="col-lg-8 align-self-center mb-3">
                                    <div class="details">
                                        <h4 class="name">{{ $headandSubHead->teacher->teacher_name }}</h4>
                                        <p class="designation">{{ $headandSubHead->teacher->designation }}</p>
                                        <div class="contact-area no-padding-margin">
                                            <ul class="details no-padding-margin">
                                                <li><i class="fa fa-envelope"></i>{{ $headandSubHead->teacher->email }}
                                                </li>
                                                <li><i
                                                        class="fa fa-phone"></i>{{ $headandSubHead->teacher->mobile_no }}
                                                </li>
                                            </ul>
                                            <ul class="social-media style-base no-padding-margin">
                                                <li>
                                                    <a href="{{ $headandSubHead->teacher->social_network_1 }}"
                                                        target="_blank"><i class="fa fa-facebook" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $headandSubHead->teacher->social_network_2 }}"
                                                        target="_blank"><i class="fa fa-twitter" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $headandSubHead->teacher->social_network_3 }}"
                                                        target="_blank"><i class="fa fa-instagram" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $headandSubHead->teacher->social_network_4 }}"
                                                        target="_blank"><i class="fa fa-pinterest" aria-hidden="true"
                                                            style="line-height: 31px;"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-danger text-center">No Information Available!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="td-sidebar pd-10 bg-gray">
                        <div class="widget widget_catagory">
                            <h4 class="widget-title">Administrative</h4>
                            <ul class="catagory-items">
                                @foreach ($administrativeOffices as $administrativeOffice)
                                    <li><a
                                            href="{{ route('frontend.administratives.show', $administrativeOffice->slug) }}"><i
                                                class="fa fa-angle-right"></i>{{ $administrativeOffice->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="course-area1 pd-top-100 ">
                <h2 class="mb-5">Members of {{ $office->name }}</h2>
                <div class="row">
                    @forelse ($administrativeMembers as $administrativeMember)
                        @if ($administrativeMember->teacher)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single-team-inner text-center">
                                    <div class="thumb">
                                        <img src="{{ Storage::exists($administrativeMember->teacher->photo)? Storage::url($administrativeMember->teacher->photo): asset('assets/uploads/images/banners/VC.png') }}"
                                            alt="Photo">
                                    </div>
                                    <div class="details">
                                        <h5><a href="#">{{ $administrativeMember->teacher->teacher_name }}</a>
                                        </h5>
                                        <p>{{ $administrativeMember->teacher->designation }}</p>
                                        <ul class="social-media">
                                            <li>
                                                <a href="{{ $administrativeMember->teacher->social_network_1 }}"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $administrativeMember->teacher->social_network_2 }}"><i
                                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $administrativeMember->teacher->social_network_3 }}"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $administrativeMember->teacher->social_network_4 }}"><i
                                                        class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                        <div class="pd-20">
                                            <div class="row">
                                                <div class="col-12 text-md-center text-center">
                                                    <a class="btn bg-light b-animate-3" href="#">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12">
                            <p class="text-danger text-center">No Information Available!</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    <!-- Facuty Member page end -->

@stop
