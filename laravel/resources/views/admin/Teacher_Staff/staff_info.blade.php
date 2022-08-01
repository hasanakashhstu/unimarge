@extends('admin.index')
@section('Title', 'Staff')
@section('breadcrumbs', 'Staff Report')
@section('breadcrumbs_link', '/staff_report')
@section('breadcrumbs_title', 'Staff Report')

@section('content')



    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif


    @if (Session::has('wrong'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('wrong') }}
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



    <div class="alert alert-info">
        <strong>Warning!</strong> <br>System Automatic Create Admin If You are fill up Email and Password
    </div>




    <div class="container">
        <h2><i class="fa fa-user" aria-hidden="true"></i> Add Staff</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Staff</p> <!-- Transport Details -->


        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/teacher_info_report'><i class="fa fa-address-card-o" aria-hidden="true"></i> Teacher
                                Report</a></li>
                        <li><a href='/staff_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Staff</a></li>
                        <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's Report
                            </a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/teacher_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/teacher_report_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/teacher_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>

                </div>
            </div>
        </div>




        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>New Staff</h5>
            </div>
            <div class="widget-content nopadding">
                {{ Form::open(['url' => '/teacher_info', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'navalidate' => 'navalidate']) }}

                <div class="controls">
                    {{ Form::hidden('status', 'Staff', ['id' => 'required', 'title' => 'status', 'placeholder' => '']) }}
                </div>


                <div class="teacher_block_heading">Basic Information</div>
                <div class="teacher_block basic_information_block">
                    <div class="control-group">
                        {{ Form::label('teacher_name', 'Staff Name', ['class' => 'control-label', 'title' => 'Staff Name']) }}

                        <div class="controls">
                            {{ Form::text('teacher_name', '', ['id' => 'required', 'title' => 'teacher_name', 'placeholder' => 'Staff Name']) }}

                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('father_name', 'Fathers Name:', ['class' => 'control-label', 'title' => 'Father Name']) }}
                        <div class="controls">
                            {{ Form::text('fathers_name', '', ['id' => 'required', 'title' => 'fathers_name', 'placeholder' => 'Fathers Name']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('mothers_name', 'Mother Name:', ['class' => 'control-label', 'title' => 'Mother Name']) }}
                        <div class="controls">
                            {{ Form::text('mothers_name', '', ['id' => 'required', 'title' => 'mothers_name', 'placeholder' => 'Mother Name']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('birth_date', 'Date Of Birth(mm/dd)', ['class' => 'control-label', 'title' => 'birth_date']) }}
                        <div class="controls">
                            <div data-date="" class="input-append date datepicker">
                                {{ Form::date('birth_date', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}

                                <span class="add-on"><i class="icon-th"></i></span>
                                <!-- <input type="date">  -->
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('gender', 'Gender', ['class' => 'control-label', 'title' => 'gender']) }}
                        <div class="controls">
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others']) }}

                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('maritual_status', 'Marital Status', ['class' => 'control-label', 'title' => 'Marital Status']) }}
                        <div class="controls">
                            {{ Form::select('marital_status', ['Married' => 'Married', 'Unmarried' => 'Unmarried']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('religion', 'Religion', ['class' => 'control-label', 'title' => 'religion']) }}
                        <div class="controls">
                            {{ Form::select('religion', ['Islam' => 'Islam', 'Hindu' => 'Hindu', 'Buddhist' => 'Buddhist', 'Khristan' => 'Khristan']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('email', 'Email', ['class' => 'control-label', 'title' => 'Email']) }}
                        <div class="controls">
                            {{ Form::email('email', '', ['id' => 'required', 'title' => 'email', 'placeholder' => '@email']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('mobil_no', 'Mobile No', ['class' => 'control-label', 'title' => 'Mobile No']) }}
                        <div class="controls">
                            {{ Form::number('mobile_no', '', ['id' => 'required', 'title' => 'mobile_no', 'placeholder' => 'Mobile No']) }}
                        </div>
                    </div>
                    <div class="control-group">
                        {{ Form::label('faculty_id', 'Faculty', ['class' => 'control-label']) }}
                        <div class="controls">
                            @php
                                $faculty_array = ['' => '--select--'];
                                // dd($faculty);
                            @endphp
                            @foreach ($faculty as $faculty_data)
                                @php
                                    $faculty_array[$faculty_data->faculty_id] = $faculty_data->faculty_name;
                                @endphp
                            @endforeach
                            {{ Form::select('faculty_id', $faculty_array, old('faculty_id'), ['class' => 'faculty_id', 'id' => 'faculty_id']) }}
                        </div>
                    </div>
                    <div class="control-group">

                        @foreach ($job_type_data as $job_type_data_list)
                            @php $job_type_array[$job_type_data_list->type_name]=$job_type_data_list->type_name @endphp
                        @endforeach

                        {{ Form::label('designation', 'Designation', ['class' => 'control-label', 'title' => 'Designation']) }}
                        <div class="controls">
                            {{ Form::select('designation', $job_type_array) }}
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('work_department', 'Work Department', ['class' => 'control-label', 'title' => 'Work Department']) }}
                        <div class="controls">
                            @foreach ($work_department_data as $work_department_data_list)
                                @php $work_department_array[$work_department_data_list->type_name]=$work_department_data_list->type_name @endphp
                            @endforeach

                            {{ Form::select('work_department', $work_department_array) }}
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('employment_id', 'Employement Id', ['class' => 'control-label', 'title' => 'Teacher Name']) }}

                        <div class="controls">
                            {{ Form::text('employment_id', '', ['id' => 'required', 'title' => 'employment_id', 'placeholder' => 'Employement Id']) }}

                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('address', 'Permanent Address', ['class' => 'control-label', 'title' => 'address']) }}
                        <div class="controls">
                            <table class="table address ">
                                <thead>
                                    <tr>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Upazilla</th>
                                        <th>Union</th>
                                        <th>Village/House No.</th>
                                        <th>Post Office Code No.</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($divisions_data as $divisions_data_list)
                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                            @endforeach
                                            <!--      {{ Form::select('division', $divisions_data_list_array, ['class' => 'p_divisions', 'id' => '']) }} -->
                                            <select name="division" class="p_divisions" id="a_table">
                                                <option>--Select--</option>
                                                @foreach ($divisions_data as $divisions_data_list)
                                                    <option value="{{ $divisions_data_list->id }}" id="a_table">
                                                        {{ $divisions_data_list->name }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <select name="home_district" class="p_district" id="a_table">
                                                <option>--Select--</option>
                                            </select>
                                        </td>

                                        <td>

                                            <select name="upazilas" class="p_upazilas" id="a_table">
                                                <option>--Select--</option>
                                            </select>

                                        </td>
                                        <td>
                                            <select name="unions" class="p_unions" id="a_table">
                                                <option>--Select--</option>
                                            </select>

                                        </td>
                                        <td>
                                            <input class="form-control village_name" id="required"
                                                placeholder="Village/House No." title="Village/House No."
                                                name="village_name" type="text" value="" id="a_table">

                                        </td>
                                        <td>
                                            <input class="form-control post_office" id="required"
                                                placeholder="Post Office Code No." title="Post Office Code No."
                                                name="post_office" type="text" value="" id="a_table">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="control-group">
                            {{ Form::label('', '', ['class' => 'control-label', 'title' => 'address']) }}
                            <div class="controls">
                                <input type="checkbox" class="check_permanent_addrs"> Same as Permanent Address
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('address', 'Present Address', ['class' => 'control-label', 'title' => 'address']) }}
                        <div class="controls">
                            <table class="table address present_table">
                                <thead>
                                    <tr>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Upazilla</th>
                                        <th>Union</th>
                                        <th>Village/House No.</th>
                                        <th>Post Office Code No.</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($divisions_data as $divisions_data_list)
                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                            @endforeach
                                            <!--      {{ Form::select('division', $divisions_data_list_array, ['class' => 'p_divisions', 'id' => '']) }} -->
                                            <select name="present_division" class="present_divisions" id="a_table">
                                                <option>--Select--</option>
                                                @foreach ($divisions_data as $divisions_data_list)
                                                    <option value="{{ $divisions_data_list->id }}">
                                                        {{ $divisions_data_list->name }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <select name="present_home_district" class="present_district" id="a_table">
                                                <option>--Select--</option>
                                            </select>
                                        </td>

                                        <td>

                                            <select name="present_upazilas" class="present_upazilas" id="a_table">
                                                <option>--Select--</option>
                                            </select>

                                        </td>
                                        <td>
                                            <select name="present_unions" class="present_unions" id="a_table">
                                                <option>--Select--</option>
                                            </select>

                                        </td>
                                        <td>
                                            <input class="table_text present_village_name" id="required"
                                                placeholder="Village/House No." title="Village/House No."
                                                name="present_village_name" type="text" value="">

                                        </td>
                                        <td>
                                            <input class="table_text present_post_office" id="required"
                                                placeholder="Post Office Code No." title="Post Office Code No."
                                                name="present_post_office" type="text" value="">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('photo', 'Photo:', ['class' => 'control-label', 'title' => 'upload_photo']) }}
                    <!-- <label class="control-label">Photo</label> -->
                    <div class="controls">
                        <input type="file" name="photo" onchange="readURL(this);">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Photo', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                        <!-- <img id='blah'  src="img/blankavatar.png"  alt="your Photo" class='img-responsive img-circle blank_applicant_student_image' /> -->
                    </div>
                </div>
            </div>
            <div class="teacher_block_heading">Qualification</div>
            <div class="teacher_block educational_history">
                <div class="control-group">

                    <label class="control-label">Qualification</label>
                    <p class="col-lg-12 inner_heading">
                        <input type="button" class="add_education_history" value="ADD Educational Qualifications">
                    </p>
                    <div class="controls">
                        <table class="table address">
                            <thead>
                                <tr>
                                    <th>Degree Name</th>
                                    <th>Subject Name</th>
                                    <th>Passing Year</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody class="educational_tbody" id="educational_tbody">
                                <tr class="educational_tr">
                                    <td>{{ Form::text('degree_name', '', ['id' => 'a_table', 'title' => 'degree_name', 'placeholder' => '']) }}
                                    </td>
                                    <td>{{ Form::text('board_name', '', ['id' => 'a_table', 'title' => 'board_name']) }}
                                    </td>
                                    <td>{{ Form::text('passing_year', '', ['id' => 'a_table', 'title' => 'passing_year']) }}
                                    </td>
                                    <td>{{ Form::text('department_name', '', ['id' => 'a_table', 'title' => 'department_name']) }}
                                    </td>

                                    <td>
                                        <div class="">
                                            <button id="delete_tr" class="btn-danger" type="button"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="teacher_block_heading">Authorization</div>
            <div class="teacher_block authorization">
                <div class="control-group">
                    {{ Form::label('password', 'Password', ['class' => 'control-label', 'title' => 'Password']) }}
                    <div class="controls">
                        {{ Form::password('password', ['id' => 'password', 'onkeyup' => 'password_len_check()', 'title' => 'password']) }}
                        <span class="add-on" style="width:0%" id="password_show_button"><i class="fa fa-eye-slash"
                                aria-hidden="true"></i></span>
                        <br>
                        <span id="help_block"></span>
                    </div>

                </div>
                <div class="control-group">
                    {{ Form::label('confiram_password', 'Confiram Password', ['class' => 'control-label', 'title' => 'Confirm Password']) }}
                    <div class="controls">
                        {{ Form::password('password_confirmation', ['id' => 'password_confirm', 'onkeyup' => 'password_match()', 'title' => 'confirm_password']) }}
                        <br>
                        <span id="password_match"></span>
                    </div>
                </div>
            </div>
            <div class="teacher_block_heading">Others</div>
            <div class="teacher_block others">
                <div class="control-group">
                    {{ Form::label('joining_date', 'Joining Date', ['class' => 'control-label', 'title' => 'Joining Date']) }}
                    <div class="controls">
                        <div data-date="12-02-2012" class="input-append date datepicker">
                            {{ Form::date('joining_date', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}

                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('resign_date', 'Date Of Resign', ['class' => 'control-label', 'title' => 'Date Of Resign']) }}
                    <div class="controls">
                        <div data-date="12-02-2012" class="input-append date datepicker">
                            {{ Form::date('resign_date', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}

                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('research_leave', 'Research Leave', ['class' => 'control-label', 'title' => 'Research Leave']) }}
                    <div class="controls">
                        {{ Form::select('research_leave', ['Yes' => 'Yes', 'No' => 'No']) }}
                    </div>
                </div>
            </div>

            <div class="teacher_block_heading">Social Network</div>
            <div class="teacher_block others">
                <div class="control-group">
                    {{ Form::label('social_network_1', 'Facebook', ['class' => 'control-label', 'title' => 'Facebook']) }}

                    <div class="controls">
                        {{ Form::text('social_network_1', '', ['id' => 'required', 'title' => 'social_network_1', 'placeholder' => 'Facebook']) }}

                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('social_network_2', 'Twitter', ['class' => 'control-label', 'title' => 'Twitter']) }}

                    <div class="controls">
                        {{ Form::text('social_network_2', '', ['id' => 'required', 'title' => 'social_network_2', 'placeholder' => 'Twitter']) }}

                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('social_network_3', 'Instagram', ['class' => 'control-label', 'title' => 'Instagram']) }}

                    <div class="controls">
                        {{ Form::text('social_network_3', '', ['id' => 'required', 'title' => 'social_network_3', 'placeholder' => 'Instagram']) }}

                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('social_network_4', 'Pinterest', ['class' => 'control-label', 'title' => 'Pinterest']) }}

                    <div class="controls">
                        {{ Form::text('social_network_4', '', ['id' => 'required', 'title' => 'social_network_4', 'placeholder' => 'Pinterest']) }}
                    </div>
                </div>
            </div>
            <div class="form-actions">
                @can('create teacher')
                    <input type="submit" value="Submit" class="btn btn-success" id="submit_button">
                @endcan
            </div>
            {{ Form::close() }}
            <!-- </form> -->
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/teacher.js') }}"></script>
    @endpush
    <script type="text/javascript">
        $(document).ready(function() {
            //permanent address script
            $('.p_divisions').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/district_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".p_district").html('');

                        if (data[0]) {
                            $(".p_district").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_district").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_district").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

            $('.p_district').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/upozila_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".p_upazilas").html('');

                        if (data[0]) {
                            $(".p_upazilas").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_upazilas").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_upazilas").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });
            $('.p_upazilas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/unions_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        console.log(data);
                        $(".p_unions").html('');

                        if (data[0]) {
                            $(".p_unions").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_unions").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_unions").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });


            //Faculty script
            $('.p_facultys').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/department_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".p_department").html('');

                        if (data[0]) {
                            $(".p_department").append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_district").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_district").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

            $('.p_district').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/upozila_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".p_upazilas").html('');

                        if (data[0]) {
                            $(".p_upazilas").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_upazilas").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_upazilas").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });
            $('.p_upazilas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/unions_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        console.log(data);
                        $(".p_unions").html('');

                        if (data[0]) {
                            $(".p_unions").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_unions").append('<option value=' + data[i].id + ' >' +
                                    data[i].name + '</option>');
                            }
                        } else {
                            $(".p_unions").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });
            //permanent address script

            //present address script
            $('.present_divisions').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/district_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".present_district").html('');

                        if (data[0]) {
                            $(".present_district").append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_district").append('<option value=' + data[i].id +
                                    ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_district").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

            $('.present_district').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/upozila_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        $(".present_upazilas").html('');

                        if (data[0]) {
                            $(".present_upazilas").append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_upazilas").append('<option value=' + data[i].id +
                                    ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_upazilas").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });
            $('.present_upazilas').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '/frontend/unions_filter/' + id + '',
                    type: "get",
                    success: function(data) {
                        console.log(data);
                        $(".present_unions").html('');

                        if (data[0]) {
                            $(".present_unions").append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_unions").append('<option value=' + data[i].id +
                                    ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_unions").append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });
            //present address script
            var present_divisionhtml = $(".present_divisions").html();

            //as same permanent address
            $('.check_permanent_addrs').click(function() {
                if ($(this).prop("checked") == true) {
                    var p_divisions_val = $('.p_divisions').val();
                    var p_divisions_text = $('.p_divisions option:selected').text();

                    var p_district_val = $('.p_district').val();
                    var p_district_text = $('.p_district option:selected').text();

                    var p_upazilas_val = $('.p_upazilas').val();
                    var p_upazilas_text = $('.p_upazilas option:selected').text();

                    var p_upazilas_val = $('.p_upazilas').val();
                    var p_upazilas_text = $('.p_upazilas option:selected').text();

                    var village_name = $('.village_name').val();
                    var post_office = $('.post_office').val();

                    // console.log(p_address_table);
                    $(".present_divisions").html('<option value=' + p_divisions_val + ' >' +
                        p_divisions_text + '</option>');
                    $(".present_district").html('<option value=' + p_district_val + ' >' + p_district_text +
                        '</option>');
                    $(".present_upazilas").html('<option value=' + p_upazilas_val + ' >' + p_upazilas_text +
                        '</option>');
                    $(".present_unions").html('<option value=' + p_upazilas_val + ' >' + p_upazilas_text +
                        '</option>');
                    $(".present_village_name").val(village_name);
                    $(".present_post_office").val(post_office);
                } else {
                    // console.log(p_address_table);

                    $(".present_divisions").html(present_divisionhtml);
                    $(".present_district").html('<option value="--select--" > --select--</option>');
                    $(".present_upazilas").html('<option value="--select--" > --select--</option>');
                    $(".present_unions").html('<option value="--select--" > --select--</option>');
                    $(".present_village_name").val('');
                    $(".present_post_office").val('');
                }


            });
            //as same permanent address
            var add_programDiv_html = $(".add_programmain_div").html();
            $('.add_program').click(function() {
                $('.add_programmain_div').append(add_programDiv_html);

            });

            $('#add_programDiv').on('click', '#delete_divChose', function(eq) {
                $(this).closest('.add_programDiv').remove();
                // alert('dsf');
            });

            $('#add_programDiv').on('click', '.medium', function(eq) {
                var row = $(this).closest(".add_programDiv");
                var medium = $(this).val();
                $.ajax({
                    url: '/frontend/faculty_department/' + medium + '',
                    type: "get",
                    success: function(data) {
                        row.find('.department').html(' ');
                        if (data[0]) {
                            row.find('.department').append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.department').append('<option value=' + data[i].id +
                                    ' >' + data[i].department_name + '</option>');
                            }
                        } else {
                            row.find('.department').append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });


            });


            $('#add_programDiv').on('click', '.department', function(eq) {
                var row = $(this).closest(".add_programDiv");
                var department = $(this).val();
                $.ajax({
                    url: '/frontend/department_program/' + department + '',
                    type: "get",
                    success: function(data) {
                        row.find('.manage_class').html(' ');
                        if (data[0]) {
                            row.find('.manage_class').append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.manage_class').append('<option value=' + data[i].id +
                                    ' >' + data[i].class_name + '</option>');
                            }
                        } else {
                            row.find('.manage_class').append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

            $('#add_programDiv').on('click', '.manage_class', function(eq) {
                var row = $(this).closest(".add_programDiv");
                var section = $(this).val();
                $.ajax({
                    url: '/frontend/class_section/' + section + '',
                    type: "get",
                    success: function(data) {
                        row.find('.section').html(' ');
                        if (data[0]) {
                            row.find('.section').append(
                                '<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.section').append('<option value=' + data[i].id +
                                    ' >' + data[i].section_name + '</option>');
                            }
                        } else {
                            row.find('.section').append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

            var educational_tbody = $(".educational_tbody").html();
            $('.add_education_history').click(function() {
                $('.educational_tbody').append(educational_tbody);

            });

            $('#educational_tbody').on('click', '#delete_tr', function(eq) {
                $(this).closest('.educational_tr').remove();
                // alert('dsf');
            });



            $('.borads').change(function() {
                var name = $(this).val();
                if (name == 'Others') {
                    $(".others_university").show();
                } else {
                    $(".others_university").hide();
                    $(".university_name").val('');
                }
            });

            $('.medium').change(function() {
                var medium = $(this).val();
                $.ajax({
                    url: '/frontend/faculty_department/' + medium + '',
                    type: "get",
                    success: function(data) {
                        $('.department').html(' ');
                        if (data[0]) {
                            $('.department').append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                $('.department').append('<option value=' + data[i].id + ' >' +
                                    data[i].department_name + '</option>');
                            }
                        } else {
                            $('.department').append(
                                '<option selected>----No Data Found----</option>');
                        }
                    }
                });
            });

        });
    </script>
@stop
