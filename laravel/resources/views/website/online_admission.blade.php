@section('online_apply_css')
{{-- Page Heading --}}
.page-title_check{
color: white;
}

.page-title-area{
padding: 130px 0px 50px 0px;
}

.teacher_block,
.admit_student_block ,
.applicant_student_block {
background: #ffffff;
}
.teacher_block_heading,
.admit_student_block_heading,
.applicant_student_block_heading{
font-size: 17px;
padding: 10px;
background: #666;
color: #fff;
border-radius: 5px;
}
div.completed_credit{
background: #EEEEEE;
margin: 1%;
border-radius: 10px;
}
.widget-box.alert.alert-danger.alert-dismissible.fade.in {
right: initial;
left: 50%;
top: 10%;
transform: translateX(-50%);
}

.alert-danger{
right: initial;
left: 50%;
top: 10%;
transform: translateX(-50%);
}
.alert-success{
right: initial;
left: 50%;
top: 10%;
transform: translateX(-50%);
}

.fade.in {
opacity: 1;
transition: all 0.9s ease;
}

.textare_for_transport{width: 60%}
.address{width: 100%;}
.blank_applicant_student_image{width: 19%;}


.dropdown_test li {display: inline;}
.dropdown_test li a{padding: 10px; background: #666;color: #fff; border-radius: 5px}
.dropdown_test li a:hover{padding: 12px; background: #666;color: #fff; border-radius: 5px}
.addmission_student_status{width: 50%;}
.student_roll_rege{width: 60%; }
.roll_reg_width{width:20%;}

.b_s_name{width: 15%}
.b_s_roll{width: 10%}
.b_s_reg{width: 10%}
.b_s_email{width: 16%}
.b_s_password{width: 10%}
.b_s_phone{width: 10%}
.b_s_gender{width: 10%}
.remove_field {margin-bottom: 10px}
.add_field_button {margin-bottom: 10px}
.promoation{width: 50%; text-align: center;}
.chart_account_heading{color: black}

.font_my{font-family: Monaco, Menlo, Consolas, "Courier New", monospace}
#my_align{text-align:center}
.display_status{display: inline-flex;}

.larger_font_permission{font-size:larger;}

/*.body_for_report{font-family:Monaco, Menlo, Consolas, "Courier New", monospace;}
.report_class_background{background-color:gray;color: #fff;height: 25px;}
.print_report{margin-top: 2%;margin-left: 25%;margin-right: 25%;}
.p_tag_report{font-size: 11px;}*/

.alert{top: 3%!important}
.color_black{color: black}

.table_text{width: 150px;}

.tags {
list-style: none;
margin: 0;
overflow: hidden;
padding: 0;
}

.tag {
background: crimson;
border-radius: 3px 0 0 3px;
color: #fff;
display: inline-block;
height: 26px;
line-height: 26px;
padding: 0 20px 0 23px;
position: relative;
margin: 0 10px 10px 0;
text-decoration: none;
-webkit-transition: color 0.2s;
}

.tag::before {
background: #fff;
border-radius: 10px;
box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
content: '';
height: 6px;
left: 10px;
position: absolute;
width: 6px;
top: 10px;
}

.tag::after {
background: #eeeeee;
border-bottom: 13px solid transparent;
border-left: 10px solid crimson;
border-top: 13px solid transparent;
content: '';
position: absolute;
right: 0;
top: 0;
}

.tag:hover {
background-color: crimson;
color: white;
}

.tag:hover::after {
border-left-color: crimson;
}

#sidebar > ul {
border-bottom: 1px solid #37414b;
max-height: 75vh !important;
overflow: auto;
}
#sidebar > ul::-webkit-scrollbar {
width: 5px;
}
#sidebar > ul::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
#sidebar > ul::-webkit-scrollbar-thumb {
background-color: darkgrey;
outline: 1px solid slategrey;
}
#sidebar > ul li ul li a:hover, #sidebar > ul li ul li.active a {
color: #38f109;
background-color: transparent !important;
font-size: 12px;
font-weight: bold;
}
.teacher_block,
.admit_student_block ,
.applicant_student_block {
background: #ffffff;
margin: 1%;
}
.teacher_block_heading,
.admit_student_block_heading,
.applicant_student_block_heading{
font-size: 17px;
padding: 10px;
background: #3782ec;
color: #fff;
border-radius: 5px;
}

#degree_name,
#session_choose,
#gender{
width: 100%;
padding: 3px 0px;
}

/* == breadcrumb == */
ul.breadcrumb {
width: 900px;
margin: auto;
padding: 0px 16px;
list-style: none;
background-color: none !important;
}

.breadcrumb{
background: none:
}

/* Display list items side by side */
ul.breadcrumb li {
display: inline;
font-size: 18px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
padding: 8px;
color: black;
content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
color: #0275d8;
font-size: 16px;
text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
color: #01447e;
text-decoration: underline;
}

#dependent_relation,
.p_divisions,
.p_district,
.p_upazilas,
.p_unions,
.present_divisions,
.present_district,
.present_upazilas,
.present_unions,
.educational_tr td select,
#quota,
#credit_transfer,
select {
width: 100%;
padding: 3px 0px;
}
.form_container_effect{
padding: 1px 10px;
box-shadow: 3px 3px 15px lightgray;
}
@endsection

@extends('website.index')
@section('website_main_section')





<div class="page-title-area bg-overlay text-center">
    <div class="container">
        <div class="breadcrumb-inner">
            <h2 class="page-title">Online Addmission</h2>
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/frontend/online-admission') }}">Online Addmission</a></li>
                <li><a href="{{ url('/frontend/application-form-front') }}">Application</a></li>
                <li><a>Application Form</a></li>
            </ul>
        </div>
    </div>
</div>



<!-- Main content container -->
<div class="container form_container_effect mt-5 mb-5 pt-3">
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="" class="close" our_management-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ Session::get('success') }}
    </div>

    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
        <a href="" class="close" our_management-dismiss="alert" aria-label="close">&times;</a>
        <strong>Wrong!</strong> {{Session::get('error')}}
    </div>
    @endif
    {{ Form::open(['url' => '/frontend/online-admission-form-submit/'.$admission_setup->admission_setup_id, 'files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'method' => 'post']) }}

    <!-- Semester & Degree -->
    <div class="row">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Semester & Degree</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('degree_name', 'Degree Name*', ['class' => 'control-label', 'title' => 'degree_name']) }}
                <div class="form-control" >
                    {{Form::label('degree_name',$admission_setup->program_type,['id'=>'','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('session_choose', 'Semester Name*', ['class' => 'control-label', 'title' => 'Session Name']) }}
                <div class="form-control">
                    {{Form::label('program_type',$admission_setup->session_name,['id'=>'','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('session', 'Semester Year*', ['class' => 'control-label', 'title' => 'Session Choose']) }}
                <div class="form-control">
                    {{Form::label('session',$admission_setup->year,['id'=>'','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
        </div>
    </div>
    <!-- Semester & Degree X -->

    <!-- Department & Hall of Residence X -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Department & Hall of Residence</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">


            <div class="form-group">
                {{ Form::label('department', 'Department name*', ['class' => 'control-label', 'title' => 'Department Name']) }}
                <div class="form-control">
                    {{Form::label('department',$admission_setup->department_name,['id'=>'','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                {{ Form::label('hall_of_residence', 'Hall of Residence*', ['class' => 'control-label', 'title' => 'Hall of Residence']) }}
                <div class="">
                    <select class="form-control" id="" name="hall_of_residence" required >
                        <option value="" required>-- Select Hall of Residence --</option>
                        @foreach ($dormitory_name as $dormitory_name_list)
                        <option value="{{ $dormitory_name_list->manage_dormitory_id }} ">{{ $dormitory_name_list->dormitory_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
    <!-- Department & Hall of Residence X -->

    <!-- Applicant's Information-->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Applicant's Information</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('student_name_bangla', 'Name in Bangla*', ['class' => 'control-label', 'title' => 'Name in Bangla']) }}
                <div class="">
                    {{ Form::text('student_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in Bangla', 'title' => 'Name in Bangla','required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('student_name', 'Name in English*', ['class' => 'control-label', 'title' => 'Name in English']) }}
                <div class="">
                    {{ Form::text('student_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in English', 'title' => 'Name in English','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('nid_birth', 'National ID(If any)', ['class' => 'control-label', 'title' => 'National ID']) }}
                <div class="">
                    {{ Form::text('nid_birth', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID', 'title' => 'National ID','']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('birth_date', 'Date of Birth No*', ['class' => 'control-label', 'title' => 'Date of Birth']) }}

                <div class="">
                    {{ Form::date('birth_date', '', ['data-date-format' => 'mm-dd-yyyy','class' => 'form-control', 'id' => '', 'placeholder' => 'National ID', 'title' => 'National ID','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('birth_registration', 'Birth Registration No*', ['class' => 'control-label', 'title' => 'std_birth_reg']) }}
                <div class="">
                    {{ Form::text('birth_registration', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Birth Registration No', 'title' => 'Birth Registration No','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('religion', 'Religion*', ['class' => 'control-label', 'title' => 'Religion']) }}
                <div class="">
                    <select class="form-control" id="" name="religion" required >
                        <option value="" required>-- Select Religion --</option>
                        @foreach ($religion_data as $religion)
                        <option value="{{ $religion->id }} ">{{ $religion->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('nationality', 'Nationality*', ['class' => 'control-label', 'title' => 'Nationality']) }}
                <div class="">
                    <select class="form-control" id="" name="nationality" required >
                        <option value="" required>-- Select Nationality --</option>
                        @foreach ($nationality_data as $nationality)
                        <option value="{{ $nationality->id }} ">{{ $nationality->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('maritial', 'Marital Status*', ['class' => 'control-label', 'title' => 'Marital Status']) }}
                <div class="">
                    <select class="form-control" id="" name="maritial" required >
                        <option value="" required>-- Select Marital Status --</option>
                        @foreach ($maritial_data as $maritial)
                        <option value="{{ $maritial->id }} ">{{ $maritial->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('blood_group', 'Blood Group*', ['class' => 'control-label', 'title' => 'Blood Group']) }}
                <div class="">
                    <select class="form-control" id="" name="blood_group" required >
                        <option value="" required>-- Select Blood Group --</option>
                        @foreach ($blood_group_data as $blood_group)
                        <option value="{{ $blood_group->id }} ">{{ $blood_group->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('income_guardian', 'Income of the Guardian*', ['class' => 'control-label', 'title' => 'Income of the Guardian']) }}
                <div class="">
                    {{ Form::text('income_guardian', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Income of the Guardian', 'title' => 'Income of the Guardian','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('email', 'E-mail*', ['class' => 'control-label', 'title' => 'E-mail']) }}
                <div class="">
                    {{ Form::email('email', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'E-mail', 'title' => 'E-mail','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('phone', 'Student Contact No*', ['class' => 'control-label', 'title' => 'Student Contact No']) }}
                <div class="">
                    {{ Form::text('phone', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Student Contact No', 'title' => 'Student Contact No','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('father_mobile_no', 'Father Contact No*', ['class' => 'control-label', 'title' => 'Father Contact No']) }}
                <div class="">
                    {{ Form::text('father_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father Contact No', 'title' => 'Father Contact No','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('mother_mobile_no', 'Mother Contact No', ['class' => 'control-label', 'title' => 'Mother Contact No']) }}
                <div class="">
                    {{ Form::text('mother_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother Contact No', 'title' => 'Mother Contact No']) }}
                </div>
            </div>
        </div>


    </div>
    <!-- Applicant's Information X -->

    <!-- Father's Information-->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Father's Information</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('father_name_bangla', 'Father Name in Bangla*', ['class' => 'control-label', 'title' => 'Father Name in Bangla']) }}
                <div class="">
                    {{ Form::text('father_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father Name in Bangla', 'title' => 'Father Name in Bangla','required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('father_name', 'Father Name in English*', ['class' => 'control-label', 'title' => 'Father Name in English']) }}
                <div class="">
                    {{ Form::text('father_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father Name in English', 'title' => 'Father Name in English','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('father_national_id_no', 'National ID No*', ['class' => 'control-label', 'title' => 'National ID No']) }}
                <div class="">
                    {{ Form::text('father_national_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID No', 'title' => 'National ID No','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('father_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'father_occupation']) }}
                <div class="">
                    {{ Form::text('father_occupation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Occupation', 'title' => 'father_occupation','required'=>'true']) }}
                </div>
            </div>
        </div>

    </div>
    <!-- Fathers Information X -->

    <!-- Mother's Information-->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Mother's Information</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('mother_name_bangla', 'Mother Name in Bangla*', ['class' => 'control-label', 'title' => 'Mother Name in Bangla']) }}
                <div class="">
                    {{ Form::text('mother_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother Name in Bangla', 'title' => 'Mother Name in Bangla','required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('mother_name', 'Mother Name in English*', ['class' => 'control-label', 'title' => 'Mother Name in English']) }}
                <div class="">
                    {{ Form::text('mother_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother Name in English', 'title' => 'Mother Name in English','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('mother_national_id_no', 'National ID No*', ['class' => 'control-label', 'title' => 'National ID No']) }}
                <div class="">
                    {{ Form::text('mother_national_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID No', 'title' => 'National ID No','required'=>'true']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="control-group">
                {{ Form::label('mother_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
                <div class="">
                    {{ Form::text('mother_occupation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Occupation', 'title' => 'Occupation','required'=>'true']) }}
                </div>
            </div>
        </div>

    </div>
    <!-- Mother Information X -->

    <!-- Educational History/Qualifications -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Educational History/Qualifications </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('educational_qualification', 'Educational Qualifications', ['class' => 'control-label', 'title' => 'address']) }}
                <br>
                <p class="inner_heading">
                    <input type="button" class="add_education_history"
                           value="Add Educational Qualifications">
                </p>
                <div class="form-control input_fields_wrap ">
                    <table class="table address">
                        <thead>
                            <tr>
                                <th>Exam Name*</th>
                                <th>Board/<br>University*</th>
                                <th class="others_university" hidden="hidden">University
                                    Name
                                </th>
                                <th>Group*</th>
                                <th>Passing<br> Year*</th>
                                <th>Reg No.*</th>
                                <th>Roll No.*</th>
                                <th>Division/<br>GPA*</th>
                                <th>Attachment<br>(Marksheet)*</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="educational_tbody" id="educational_tbody">
                            <tr class="educational_tr">
                                <td>
                                    <select class="form-control" id="" name="exam_name[]" required >
                                        <option value="" required>-- Select --</option>
                                        @foreach ($exam_name_data as $exam_name)
                                        <option value="{{ $exam_name->name }} ">{{ $exam_name->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="borad[]" class="form-control borads" required>
                                        <option value="" required>--Select--</option>
                                        @foreach ($board_name_data as $board_name_data_list)
                                        <option value="{{ $board_name_data_list->name }}">
                                            {{ $board_name_data_list->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="others_university" hidden='hidden'>
                                    {{ Form::text('university_name[]', '', ['class' => 'form-control university_name', 'id' => '', 'placeholder' => 'University Name', 'title' => 'University Name', 'style' => 'width: 100%']) }}
                                </td>
                                <td>
                                    <select name="group[]" class="form-control borads" required>
                                        <option value="" required>--Select--</option>
                                        @foreach ($group_name_data as $group_name)
                                        <option value="{{ $group_name->name }}">
                                            {{ $group_name->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="passing_year[]" class="form-control borads" required>
                                        <option value="" required>--Select--</option>
                                        @foreach ($year_data as $year)
                                        <option value="{{ $year->name }}">
                                            {{ $year->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{ Form::text('reg_no[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Reg No.', 'title' => 'Reg No.','required'=>'true']) }}
                                </td>
                                <td>
                                    {{ Form::text('roll_no[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Roll No.', 'title' => 'Roll No.','required'=>'true']) }}
                                </td>
                                <td>
                                    {{ Form::text('gpa[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Division/GPA/CGPA', 'title' => 'Division/GPA','required'=>'true']) }}
                                </td>
                                <td>
                                    <div style="width: 80px;">
                                        <div class="control-group">
                                            <!-- {{ Form::label('marksheet', 'Marksheet', ['class' => 'control-label', 'title' => 'Marksheet']) }} -->
                                            <!-- <div class=""> -->
                                            {{ Form::file('image_name[]', ['onchange' => 'readURL(this)','required','required'=>'true']) }}
                                            <!-- </div> -->
                                        </div>
                                        <div class="control-group">
                                            {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                            <div class="">
                                                {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <button id="delete_tr" class="btn-danger"
                                                type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                                           width="16" height="20" fill="currentColor"
                                                           class="bi bi-dash" viewBox="0 0 16 16">
                                            <path
                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                            </svg></button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Educational History/Qualifications X -->

    <!-- Completed Credit -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Completed Credit </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('credit_transfer', 'Credit Transfer*', ['class' => 'control-label', 'title' => 'credit_transfer']) }}
                <!-- <div class="">
                    {{ Form::select('credit_transfer', ['Yes' => 'Yes', 'No' => 'No']) }}
                </div> -->
                <select name="credit_transfer" id="credit_transfer" onchange="credit_transfer_required();" class="form-control" required>
                    <option value="">--select--</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('credit_name_of_university', 'Institute Name', ['class' => 'control-label', 'title' => 'Name of University']) }}
                <div class="">

                    {{ Form::text('credit_name_of_university', '', ['class' => 'form-control', 'id' => 'credit_transfer_institute_name', 'placeholder' => 'Institute Name', 'title' => 'Institute Name']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('year', 'Year', ['class' => 'control-label',  'title' => 'year']) }}

                <select name="year" class="form-control" id="credit_transfer_year">
                    <option>--Select--</option>
                    @foreach ($year_data as $year_data_list)
                    <option value="{{ $year_data_list->name }}">
                        {{ $year_data_list->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('credit_completed_semester', 'Program Attended', ['class' => 'control-label', 'title' => 'Program Attended']) }}

                <select name="semester" class="form-control" id="credit_transfer_semester">
                    <option>--Select--</option>
                    @foreach ($semester_data as $semester_data_list)
                    <option value="{{ $semester_data_list->name }}">
                        {{ $semester_data_list->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('Credit', 'Credit Completed', ['class' => 'control-label', 'title' => 'Credit']) }}
                <div class="">

                    {{ Form::text('credit', '', ['class' => 'form-control', 'id' => 'credit_completed', 'placeholder' => 'Credit Completed', 'title' => 'Credit Completed']) }}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="control-group">
                {{ Form::label('CGPA', 'CGPA', ['class' => 'control-label', 'title' => 'CGPA']) }}
                <div class="">

                    {{ Form::text('cgpa', '', ['class' => 'form-control', 'id' => 'credit_transfer_cgpa', 'placeholder' => 'CGPA', 'title' => 'CGPA']) }}
                </div>
            </div>
        </div>

    </div>
    <!-- Completed Credit X -->

    <!-- Parmanent & Present Address -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Parmanent & Present Address </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('address', 'Permanent Address', ['class' => 'control-label', 'title' => 'address']) }}
                <div class="">
                    <table class="table address p_address_tables">
                        <thead>
                            <tr>
                                <th>Division*</th>
                                <th>District*</th>
                                <th>Upazilla*</th>
                                <th>Union*</th>
                                <th>Village/House No.*</th>
                                <th>Post Code*</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>

                                    <select name="division" class="form-control p_divisions" required>
                                        <option value="" required>--Select--</option>
                                        @foreach ($divisions_data as $divisions_data_list)
                                        <option value="{{ $divisions_data_list->id }}">
                                            {{ $divisions_data_list->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                     <select name="home_district" class="form-control p_district" required>
                                        <option value="" required>--Select--</option>
                                    </select>

                                </td>

                                <td>

                                    <select name="upazilas" class="form-control p_upazilas" required>
                                        <option value="" required>--Select--</option>
                                    </select>

                                </td>
                                <td>
                                    <select name="unions" class="form-control p_unions" required>
                                        <option value="" required>--Select--</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-control village_name" id=""
                                           placeholder="Village/House No."
                                           title="Village/House No." name="village_name"
                                           type="text" value="" required>

                                </td>
                                <td>
                                    <input class="form-control post_office" id=""
                                           placeholder="Post Office Code No."
                                           title="Post Office Code No." name="post_office"
                                           type="text" value="" required>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <input type="checkbox" class="check_permanent_addrs"> Same as Permanent Address
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('address', 'Present Address', ['class' => 'control-label', 'title' => 'address']) }}
                <div class="form-control present_mainDiv">
                    <table class="table address present_table">
                        <thead>
                            <tr>
                                <th>Division*</th>
                                <th>District*</th>
                                <th>Upazilla*</th>
                                <th>Union*</th>
                                <th>Village/House No.*</th>
                                <th>Post Code*</th>
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
                                    <select name="present_division" class="form-control present_divisions" required>
                                        <option value="" required>--Select--</option>
                                        @foreach ($divisions_data as $divisions_data_list)
                                        <option value="{{ $divisions_data_list->id }}">
                                            {{ $divisions_data_list->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <select name="present_home_district" class="form-control present_district" required>
                                        <option value="" required>--Select--</option>
                                    </select>
                                </td>

                                <td>
                                    <select name="present_upazilas" class="form-control present_upazilas" required>
                                        <option value="" required>--Select--</option>
                                    </select>

                                </td>
                                <td>
                                    <select name="present_unions" class="form-control present_unions" required>
                                        <option value="" required>--Select--</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="table_text present_village_name form-control"
                                           id="" placeholder="Village/House No."
                                           title="Village/House No." name="present_village_name"
                                           type="text" value="" required>
                                </td>
                                <td>
                                    <input class="table_text present_post_office form-control"
                                           id="" placeholder="Post Office Code No."
                                           title="Post Office Code No." name="present_post_office"
                                           type="text" value="" required>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Parmanent & Present Address X -->


    <!-- Quota -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="section_title">
                <div class="p-3 mb-2 bg-primary text-white rounded">Quota</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('quota', 'Quota', ['class' => 'control-label', 'title' => 'Quota']) }}

            <select name="physically_challenged" class="form-control">
                <option value="" required>--Select--</option>
                @foreach ($quota_data as $quota_data_list)
                <option value="{{ $quota_data_list->name }}">
                    {{ $quota_data_list->name }}
                </option>
                @endforeach
            </select>
        </div>

    </div>
</div>
<!-- Quota X -->


<!-- Legal Guardian in the Absence of Father(If Any) -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Legal Guardian in the Absence of Father(If Any) </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_name_bangla', 'Name in Bangla*', ['class' => 'control-label', 'title' => 'Name in Bangla']) }}
            <div class="">
                {{ Form::text('legal_gurdian_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in Bangla', 'title' => 'Name in Bangla','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_name', 'Name in English*', ['class' => 'control-label', 'title' => 'Name in Bangla']) }}
            <div class="">
                {{ Form::text('legal_gurdian_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in English', 'title' => 'Name in English','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_relation', 'Relationship*', ['class' => 'control-label', 'title' => 'Relationship']) }}
            <div class="">
                {{ Form::text('legal_gurdian_relation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Relationship', 'title' => 'Relationship','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
            <div class="">
                {{ Form::text('legal_gurdian_occupation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Occupation', 'title' => 'Occupation','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_nid_no', 'National ID No*', ['class' => 'control-label', 'title' => 'National ID No']) }}
            <div class="">
                {{ Form::text('legal_gurdian_nid_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID No', 'title' => 'National ID No','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('legal_gurdian_contact_no', 'Mobile No*', ['class' => 'control-label', 'title' => 'Mobile No']) }}
            <div class="">
                {{ Form::text('legal_gurdian_contact_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No', 'title' => 'Mobile No','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="control-group">
            {{ Form::label('legal_gurdian_address', 'Present Address*', ['class' => 'control-label', 'title' => 'Present Address']) }}
            <div class="">
                {{ Form::text('legal_gurdian_address', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Present Address', 'title' => 'Present Address','required'=>'true']) }}
            </div>
        </div>
    </div>     
</div>
<!-- Legal Guardian X -->

<!-- Local Guardian of the Applicant -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Local Guardian of the Applicant </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_name_bangla', 'Name in Bangla*', ['class' => 'control-label', 'title' => 'Name in Bangla']) }}
            <div class="">
                {{ Form::text('local_gurdian_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in Bangla', 'title' => 'Name in Bangla','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_name', 'Name in English*', ['class' => 'control-label', 'title' => 'Name in Bangla']) }}
            <div class="">
                {{ Form::text('local_gurdian_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name in English', 'title' => 'Name in English','required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_relation', 'Relationship*', ['class' => 'control-label', 'title' => 'Relationship']) }}
            <select name="local_gurdian_relation" class="form-control" required>
                <option value="" required>--Select--</option>
                @foreach ($dependent_relation_data as $dependent_relation_data_list)
                <option value="{{ $dependent_relation_data_list->name }}">
                    {{ $dependent_relation_data_list->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
            <select name="local_gurdian_occupation" class="form-control" required>
                <option value="" required>--Select--</option>
                @foreach ($profession_data as $profession_data_list)
                <option value="{{ $profession_data_list->name }}">
                    {{ $profession_data_list->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_nid_no', 'National ID*', ['class' => 'control-label', 'title' => 'National ID']) }}
            <div class="">
                {{ Form::text('local_gurdian_nid_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID', 'title' => 'National ID', 'required'=>'true']) }}
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="control-group">
            {{ Form::label('local_gurdian_contact_no', 'Mobile No*', ['class' => 'control-label', 'title' => 'Mobile No']) }}
            <div class="">
                {{ Form::text('local_gurdian_contact_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', 'required'=>'true']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="control-group">
            {{ Form::label('local_gurdian_address', 'Present Address*', ['class' => 'control-label', 'title' => 'Present Address']) }}
            <div class="">
                {{ Form::text('local_gurdian_address', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Present Address', 'title' => 'Present Address', 'required'=>'true']) }}
            </div>
        </div>
    </div>
</div>
<!-- Local Guardian of the Applicant X -->

<!-- Reference Guardian -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Reference Information </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <p class="inner_heading">Reference 1</p>
        <hr>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_name', 'Name*', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                <div class="">
                    {{ Form::text('reference_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name', 'title' => 'Reference Name', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_designation', 'Designation*', ['class' => 'control-label', 'title' => 'Designation']) }}
                <div class="">
                    {{ Form::text('reference_designation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Designation', 'title' => 'Designation', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_institute_name', 'Institute Name*', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                <div class="">
                    {{ Form::text('reference_institute_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Institute Name', 'title' => 'Institute Name', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_id_no', 'ID No.*', ['class' => 'control-label', 'title' => 'ID No.']) }}
                <div class="">
                    {{ Form::text('reference_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'ID No.', 'title' => 'ID No.', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_mobile_no', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                <div class="">
                    {{ Form::text('reference_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', 'required'=>'true']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <p class="inner_heading">Reference 2</p>
        <hr>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_name1', 'Name*', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                <div class="">
                    {{ Form::text('reference_name1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name', 'title' => 'Reference Name', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_designation1', 'Designation*', ['class' => 'control-label', 'title' => 'Designation']) }}
                <div class="">
                    {{ Form::text('reference_designation1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Designation', 'title' => 'Designation', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_institute_name1', 'Institute Name*', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                <div class="">
                    {{ Form::text('reference_institute_name1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Institute Name', 'title' => 'Institute Name', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_id_no1', 'ID No.*', ['class' => 'control-label', 'title' => 'ID No.']) }}
                <div class="">
                    {{ Form::text('reference_id_no1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'ID No.', 'title' => 'ID No.', 'required'=>'true']) }}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="control-group">
                {{ Form::label('reference_mobile_no1', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                <div class="">
                    {{ Form::text('reference_mobile_no1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', 'required'=>'true']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reference Information X -->


<!-- Attachments -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Attachments </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="control-group">
            {{ Form::label('photo', 'Photo*', ['class' => 'control-label', 'title' => 'photo']) }}
            <div class="">

                {{ Form::file('attached_photo_name', ['onchange' => 'readURL(this)','required']) }}

            </div>
        </div>
        <div class="control-group">
            {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
            <div class="">
                {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="control-group">
            {{ Form::label('image', 'Signature*', ['class' => 'control-label', 'title' => 'Signature']) }}
            <div class="">

                {{ Form::file('attached_signature_name', ['onchange' => 'readURL(this)','required']) }}

            </div>
        </div>
        <div class="control-group">
            {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
            <div class="">
                {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Signature', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
            </div>
        </div>
    </div>
</div>
<!-- Attachments X -->


<!-- Payment -->
<div class="p-3 mb-2 mt-4 bg-primary text-white rounded">Payment</div>
 <div class="row pd-10">
     <div class="col-lg-12">
         <div class="control-group">
             <h3>Bkash Payment: Please pay 255 BDT at the +880154785468745</h3>
         </div>
     </div>
 </div>
 <div class="row pd-10">
     <div class="col-lg-4">
         <div class="control-group">
             {{ Form::label('payment_transaction_id', 'Transaction ID', ['class' => 'control-label', 'title' => 'Transaction ID']) }}
             <div class="">
                 {{ Form::text('payment_transaction_id', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Transaction ID', 'title' => 'Transaction ID']) }}
             </div>
         </div>
     </div>
     <div class="col-lg-4">
         <div class="control-group">
             {{ Form::label('payment_mobile_no', 'Applicant Mobile No.', ['class' => 'control-label', 'title' => 'Applicant Mobile No.']) }}
             <div class="">
                 {{ Form::text('payment_mobile_no', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Applicant Mobile No.', 'title' => 'Applicant Mobile No.']) }}
             </div>
         </div>
     </div>
 </div>
 <!-- Payment -->

<!-- Declaration By the Applicant -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Declaration By the Applicant</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p>I do hereby declare that:</p>
        <ul style="padding-left: 30px;width: 95%; list-style:none">
            <li>(a) the information provided in this application by me is true, correct and complete;</li>
            <li>(b) if to be acceptable at Z. H. Sikder University of Science and Technology (hereinafter referred to as â€˜the Universityâ€™), I will be bound by all the rules and regulations, and the code of conduct as laid down by the University, the concerned Department, or the Hall of Residence;</li>
            <li>(c) I will abide by the decisions of the authorities of the University in respect of my education and conduct;</li>
            <li>(d) I will pay all my tuition and other fees to the University timely;</li>
            <li>(e) I do hereafter sign understanding that in need of necessary actions University may withdraw, amend or substitute an offer, or cancel my admission, or take other measures if any information provided here are found to be false, incorrect, incomplete.</li>
        </ul>
    </div>
</div>
<!-- Declaration By the Applicant X -->

<!-- The Following Documents are to be Attached -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">The Following Documents are to be Attached</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ul style="padding-left: 30px; list-style: none;">
            <li>1. Three (3) copies of recent passport-sized photographs;</li>
            <li>2. Main copy of SSC or equivalent certificate and mark sheet/transcript;</li>
            <li>3. Main copy of HSC or equivalent certificate and mark sheet/transcript;</li>
            <li>4. Attested copy of the birth registration card;</li>
            <li>5. Attested copies of all NIDs as mentioned in the Admission Form;</li>
            <li>6. All documents related to credit transfer (if any).</li>
        </ul>
    </div>
</div>
<!-- The Following Documents are to be Attached X -->



<!-- Important Information for Students -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="section_title">
            <div class="p-3 mb-2 bg-primary text-white rounded">Important Information for Students</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ul style="padding-left: 30px;width: 95%; list-style:none;">
            <li>1. It is mandatory for all the enrolled students of the University to abide by all the rules and regulations, and the code of conduct laid down by the University.</li>
        </ul>

        <ul style="padding-left: 30px;width: 95%; list-style:none;">
            <li>2.  The following conducts shall be considered to be against the code of conduct of the University:
                <ul style="list-style: none;">
                    <li>(a) To allow or receive any stranger or visitor at the University premises without authorization.</li>
                    <li>(b) To enter into any restricted or secured area at the University premises.</li>
                    <li>(c) To use the name or logo of the University without authorization.</li>
                    <li>(d) To steal, misuse, destroy, deface or damage University property or property belonging to others.</li>
                    <li>(e) To defy any order or violate any law, rule, regulation, or policy of the University, or to abet or instigate any person to defy any order or violate any law, rule, regulation, or policy of the University.</li>
                    <li>(f) To engage in misconduct with any member of the University community.</li>
                    <li>(g) To disrupt the serenity or tranquility of the University.</li>
                    <li>(h) To erect any structure at the University premises without authorization.</li>
                    <li>(i) To possess, distribute, consume or manufacture any tobacco product, alcohol, drug, or other illegal substance at the University premises.</li>
                    <li>(j) To commit any offence punishable under any existing law of Bangladesh. </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Important Information for Students X -->

<!-- Agreement terms and conditions -->
<div class="row mt-3">
    <div class="form-check ml-3">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="" required>I Agree to the above  terms and conditions.
        </label>
    </div>
</div>


<div class="row mt-3">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<!-- {{ Form::close() }} -->
</form>


</div>
<!-- Main content continer X -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
//permanent address script
    $('.p_divisions').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/district_filter/' + id + '',
            type: "get",
            success: function (data) {
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

    $('.p_district').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/upozila_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.p_upazilas').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/unions_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.p_facultys').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/department_filter/' + id + '',
            type: "get",
            success: function (data) {
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

    $('.p_district').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/upozila_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.p_upazilas').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/unions_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.present_divisions').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/district_filter/' + id + '',
            type: "get",
            success: function (data) {
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

    $('.present_district').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/upozila_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.present_upazilas').change(function () {
        var id = $(this).val();
        $.ajax({
            url: '/frontend/unions_filter/' + id + '',
            type: "get",
            success: function (data) {
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
    $('.check_permanent_addrs').click(function () {
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
    $('.add_program').click(function () {
        $('.add_programmain_div').append(add_programDiv_html);
    });

    $('#add_programDiv').on('click', '#delete_divChose', function (eq) {
        $(this).closest('.add_programDiv').remove();
        // alert('dsf');
    });

    $('#add_programDiv').on('click', '.medium', function (eq) {
        var row = $(this).closest(".add_programDiv");
        var medium = $(this).val();
        $.ajax({
            url: '/frontend/faculty_department/' + medium + '',
            type: "get",
            success: function (data) {
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


    $('#add_programDiv').on('click', '.department', function (eq) {
        var row = $(this).closest(".add_programDiv");
        var department = $(this).val();
        $.ajax({
            url: '/frontend/department_program/' + department + '',
            type: "get",
            success: function (data) {
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

    $('#add_programDiv').on('click', '.manage_class', function (eq) {
        var row = $(this).closest(".add_programDiv");
        var section = $(this).val();
        $.ajax({
            url: '/frontend/class_section/' + section + '',
            type: "get",
            success: function (data) {
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
    $('.add_education_history').click(function () {
        $('.educational_tbody').append(educational_tbody);

    });

    $('#educational_tbody').on('click', '#delete_tr', function (eq) {
        $(this).closest('.educational_tr').remove();
        // alert('dsf');
    });



    $('.borads').change(function () {
        var name = $(this).val();
        if (name == 'Others') {
            $(".others_university").show();
        } else {
            $(".others_university").hide();
            $(".university_name").val('');
        }
    });
});
</script>

<!-- Cradit Transfer if Yes then Required -->
<script type="text/javascript">
    function credit_transfer_required(){
        var credit_transfer = document.getElementById('credit_transfer').value;
        // alert(credit_transfer);
        if(credit_transfer == 'Yes'){
            document.getElementById('credit_transfer_institute_name').required = true;
            document.getElementById('credit_transfer_year').required = true;
            document.getElementById('credit_transfer_semester').required = true;
            document.getElementById('credit_completed').required = true;
            document.getElementById('credit_transfer_cgpa').required = true;
        }

        if(credit_transfer == 'No'){
            document.getElementById('credit_transfer_institute_name').required = false;
            document.getElementById('credit_transfer_year').required = false;
            document.getElementById('credit_transfer_semester').required = false;
            document.getElementById('credit_completed').required = false;
            document.getElementById('credit_transfer_cgpa').required = false;
        }

    }
</script>
<!-- Cradit Transfer if Yes then Required X -->

@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/applicant_student.js') }}"></script>
<script type="text/javascript">

</script> 

@endpush
@stop
