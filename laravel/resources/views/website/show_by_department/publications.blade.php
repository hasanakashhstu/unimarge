@extends('website.index')
@section('website_main_section')

    <!-- page title start -->
    <div class="page-title-area bg-overlay text-center coursetitle">
        <div class="container">
            <div class="breadcrumb-inner">
                <h4 class="">{{ $department->department_name }} / Academic / </h4>
                <h2 class="page-title">Publication</h2>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- tution section -->
    <div class="main-blog-area pd-top-100 pd-bottom-90 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12 pd-10">
                    {{-- teachers loop start --}}
                    @php
                        $index = 0;
                    @endphp
                    <div class="accordion" id="accordionAcademicPublication">
                        @forelse ($teachers as $teacher)
                            @php
                                $index += 1;
                            @endphp
                            <div class="card">
                                <div class="card-header" id="publicationHeading{{ $index }}">
                                    <h2 class="mb-0">
                                        <style>
                                            .accordionAcademicPublicationButton:hover {
                                                color: white !important;
                                            }

                                        </style>
                                        <button class="btn btn-link btn-block text-left accordionAcademicPublicationButton"
                                            type="button" data-toggle="collapse"
                                            data-target="#publicationCollapse{{ $index }}" aria-expanded="true"
                                            aria-controls="publicationCollapse{{ $index }}">
                                            {{ $teacher->teacher_name }}
                                        </button>
                                    </h2>
                                </div>
                                <div id="publicationCollapse{{ $index }}" class="collapse @if ($loop->first) show @endif"
                                    aria-labelledby="publicationHeading{{ $index }}"
                                    data-parent="#accordionAcademicPublication">
                                    <div class="card-body">
                                        {{-- publications loop start --}}
                                        @forelse ($teacher->publications as $publication)
                                            {!! $publication->content !!}
                                            @if (!$loop->last)
                                                <hr />
                                            @endif
                                        @empty
                                            <p class="text-danger text-center">Information is not available! Comming soon...
                                            </p>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-danger text-center">Information is not available! Comming soon...</p>
                        @endforelse

                        <div class="float-right mt-4">
                            {{ $teachers->links('vendor.pagination.bootstrap-4') }}
                        </div>
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
