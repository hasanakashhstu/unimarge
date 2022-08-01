@extends('admin.index')
@section('Title', 'Parents')
@section('breadcrumbs', 'Parents')
@section('breadcrumbs_link', '/parents_info')
@section('breadcrumbs_title', 'Parents')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
            {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::has('wrong'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Error!</strong>
            {{ Session::get('wrong') }}
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
        <h2><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Add Parent's </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Parent's Info Add</p>
        <!-- Transport Details -->


        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                        <li><a href='/parentreport'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Parent's
                                List</a></li>

                        <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/parents_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/parents_report_excel"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/parents_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>




        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                </span>
                <h5>Add New Parent
                </h5>
            </div>
            <div class="widget-content nopadding">
                {{ Form::open(['url' => '/parents_info', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'files' => 'true', 'novalidate' => 'novalidate']) }}

                <div class="control-group" hidden>
                    {{ Form::label('hidden_field', 'Hidden', ['class' => 'control-label', 'title' => 'hidden_field']) }}
                    <div class="controls">
                        {{ Form::text('parents_id', time(), ['id' => 'required', 'hidden' => 'hidden', 'title' => 'parents_name']) }}

                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('name', 'Name', ['class' => 'control-label', 'title' => 'Name']) }}


                    <div class="controls">
                        {{ Form::text('name', '', ['id' => 'required', 'placeholder' => 'Parents Name', 'title' => 'name']) }}

                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('email', 'Email Address', ['class' => 'control-label', 'title' => 'Email']) }}

                    <div class="controls">
                        {{ Form::email('email', '', ['id' => 'required', 'title' => 'email']) }}

                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('password', 'Password', ['class' => 'control-label', 'title' => 'Password']) }}

                    <div class="controls">

                        {{ Form::password('password', null, ['id' => 'required', 'placeholder' => 'Password', 'title' => 'Password']) }}
                        <span id="msg"></span>
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('password_check', 'Confirm Password', ['class' => 'control-label', 'title' => 'Password']) }}

                    <div class="controls">
                        {{ Form::password('password_check', null, ['id' => 'password_check', 'title' => 'password']) }}
                        <span id="msg1"></span>
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('phone', 'Phone', ['class' => 'control-label', 'title' => 'Phone']) }}

                    <div class="controls">
                        {{ Form::text('phone', '', ['id' => 'required', 'title' => 'phone']) }}

                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('address', 'Address', ['class' => 'control-label', 'title' => 'Address']) }}

                    <div class="controls">
                        <table class="table address">
                            <thead>
                                <tr>
                                    <th>Post Office</th>
                                    <th>Home District</th>
                                    <th>Division</th>
                                    <th>Village Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ Form::text('post_office', '', ['id' => 'required', 'placeholder' => 'Post Office', 'title' => 'post_office', 'class' => 'table_text']) }}
                                    </td>

                                    <td>{{ Form::text('home_district', '', ['id' => 'required', 'placeholder' => 'Home District', 'title' => 'home_district', 'class' => 'table_text']) }}
                                    </td>

                                    <td>{{ Form::text('division', '', ['id' => 'required', 'placeholder' => 'Division', 'title' => 'division', 'class' => 'table_text']) }}
                                    </td>

                                    <td>{{ Form::text('village_name', '', ['id' => 'required', 'placeholder' => 'Village Name', 'title' => 'village_name', 'class' => 'table_text']) }}
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('gender', 'Gender', ['class' => 'control-label', 'title' => 'gender']) }}
                    <div class="controls">
                        {{ Form::select('gender', ['Female' => 'Female', 'Male' => 'Male']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('profession', 'Profession', ['class' => 'control-label', 'title' => 'Profession']) }}

                    <div class="controls">
                        {{ Form::text('profession') }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('monthly salary', 'Mothly Salary', ['class' => 'control-label', 'title' => 'Mothly Salary']) }}

                    <div class="controls">
                        {{ Form::text('monthly_salary', '', ['id' => 'required', 'title' => 'monthly_salary']) }}

                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('photo', 'Photo', ['class' => 'control-label', 'title' => 'Photo']) }}

                    <div class="controls">
                        {{ Form::file('parents_image', ['onchange' => 'readURL(this);']) }}
                        Note: only jpg file are upload
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}

                    <div class="controls">
                        {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                    </div>
                </div>
                <div class="form-actions">
                    @can('create parent')
                        {{ Form::submit('submit', ['value' => 'Submit', 'id' => 'submit', 'class' => 'btn btn-success']) }}
                    @endcan
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/parents.js') }}"></script>
    @endpush



@stop
