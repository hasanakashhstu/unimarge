@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center coursetitle">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">{{ $department->department_name }} / Academic / </h4>
                <h2 class="page-title">Gallery</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- tution section -->
    <div class="main-blog-area pd-top-100 pd-bottom-90 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12 pd-10">
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-md-4">
                                <div class="single-gallery">
                                    <img src='{{ Storage::url($gallery->image) }}' alt="Image" style="max-height: 400px;">
                                </div>
                            </div>
                        @endforeach
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
    <!-- end tution section -->

    <!-- content end -->

@stop
