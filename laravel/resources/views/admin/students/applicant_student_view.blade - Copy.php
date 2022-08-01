@extends('admin.index')
@section('Title', 'Admission Student')
@section('breadcrumbs', 'Admission Student')
@section('breadcrumbs_link', '/aplicant_student')
@section('breadcrumbs_title', 'Admission Student')
@section('content')


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ Session::get('success') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade in">
    <strong>Error!</strong> {{ Session::get('error') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade in">
    <ul style='list-style:none'>
        @foreach ($errors->all() as $error)
        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <h2><i class="fa fa-user-plus" aria-hidden="true"></i>Admission Student</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{ Session::get('school.system_name') }} Student Details</p>
    <!-- Transport Details -->
    <div class='row'>
        <div class="panel panel-default">
            <div class="panel-body text-left">
                <ul class='dropdown_test'>
                    <li><a href='/create_admin'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Admission
                            Test</a></li>
                    <li><a href='/user_access'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Student
                            Promation</a></li>
                    <li><a href='/permission_role'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student
                            Promotion</a></li>
                    <li><a href='/'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                </ul>
            </div>
        </div>
        <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
                <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                                                                                    href="/applicant_student_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                <button class="btn btn-default" title='Export Excel' type="button"><a href="/applicant_student_excel"><i
                            class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                                                                                  href="/applicant_student_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                                                                                          aria-hidden="true"></i></button>

            </div>
        </div>
    </div>
    <!-- From Heading Part End -->
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"> <i class="icon-info-sign"></i></span>
            <h5>Admission Student</h5>
        </div>
        <div class="widget-content nopadding">
            <div class="applicant_student_block">
              
                    <div class="col-lg-2">
                        <div class="logo">
                            <img src="{{ asset('img/logo.png') }}" style="height: 70%;
                            margin-left: 12px;
                            margin-top: 1%;
                            width: 70px;" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="content_main_title">
                            <h2>Z.H. Sikder University of Science and Technology</h2>
                        </div>
                    </div>
            </div> <!-- applicant_student_block X -->
        </div> <!-- widget-content nopadding X -->
    </div> <!-- widget-box X -->
</div> <!-- container X -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">



@push('custom-scripts')

@endpush
@stop
