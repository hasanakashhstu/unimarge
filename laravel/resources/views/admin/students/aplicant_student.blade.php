@extends('admin.index')
@section('Title', 'Applicant Student')
@section('breadcrumbs', 'Applicant Student')
@section('breadcrumbs_link', '/aplicant_student')
@section('breadcrumbs_title', 'Applicant Student')
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
    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Aplicant Student</h2> <!-- Tab Heading  -->
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
            <h5>New Student</h5>
        </div>
        <div class="widget-content nopadding">
            <!-- {{ Form::open(['url' => 'aplicant_student', 'class' => 'admin_student form-horizontal', 'method' => 'post', 'files' => true, 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }} -->
            <div class="control-group" hidden>
                {{ Form::label('hidden_field', 'Hidden', ['class' => 'control-label', 'title' => 'hidden_field']) }}
                <div class="controls">
                    {{ Form::text('applicant_id', time(), ['id' => '', 'hidden' => 'hidden', 'title' => 'student_name'],['']) }}

                </div>
            </div>
            {{-- <div class="control-group" hidden>
            {{Form::label('hidden_field','Hidden',['class'=>'control-label','title'=>'hidden_field'])}}
            <div class="controls">
                {{Form::text('parent',time(),['id'=>'','title'=>'parent'])}}

            </div>
        </div> --}}


        <div>
            <div class="applicant_student_block">
                <div class="widget-content nopadding">

                    <div class="inner_block">
                        {{ Form::open(['url' => '/aplicant_student', 'files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'method' => 'post']) }}
                        <div class="applicant_student_block_heading">Semester & Degree</div>
                        <div class="applicant_student_block">
                            <div class="col-lg-12">
                                <div class="col-md-3">
                                    <div class="control-group">
                                        {{ Form::label('degree_name ', 'Degree Name*', ['class' => 'control-label', 'title' => 'degree_name']) }}
                                        <div class="controls">
                                           <!--  @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($degree_name_data as $degree_name_data_list)
                                            @php $degree_name_data_list_array[$degree_name_data_list->name]=$degree_name_data_list->name @endphp
                                            @endforeach


                                            {!! Form::select('degree_name',  $degree_name_data_list_array, null, ['']) !!} -->

                                            <select class="form-control" id="degree_name" name="degree_name" >
                                                <option value="">--select--</option>
                                                @foreach ($degree_name_data as $degree_name_data_list)
                                                <option>{{ $degree_name_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    {{ Form::label('session_choose', 'Semester Name*', ['class' => 'control-label', 'title' => 'Session Name']) }}
                                    <div class="controls">
                                        <!-- @php $session_choose_data_list_array=[''=>'--select--'] @endphp
                                        @foreach ($session_choose_data as $session_choose_data_list)
                                        @php $session_choose_data_list_array[$session_choose_data_list->name]=$session_choose_data_list->name @endphp
                                        @endforeach

                                        {{ Form::select('session_choose', $session_choose_data_list_array,['id'=>'',''=>'true']) }} -->

                                        <select class="form-control" id="session_choose" name="session_choose" >
                                            <option value="">--select--</option>
                                            @foreach ($session_choose_data as $session_choose_data_list)
                                            <option>{{ $session_choose_data_list->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="control-group">
                                        <div class="control-group">
                                            {{ Form::label('session', 'Semester Year*', ['class' => 'control-label', 'title' => 'Session Choose']) }}
                                            <div class="controls">
                                                <select class="form-control" id="session" name="session" >
                                                    <option value="">--select--</option>
                                                    @foreach ($session as $value)
                                                    <option>{{ $value->type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Department & Hall of Residence  -->
                        <div class="applicant_student_block_heading">Department & Hall of Residence </div>
                        <div class="applicant_student_block">
                            <div class="col-lg-12">

                                <div class="col-md-3">
                                    {{ Form::label('session_choose', 'Department name*', ['class' => 'control-label', 'title' => 'Department name']) }}
                                    <div class="controls">
                                      <select class="form-control" id="" name="department"  >
                                        <option value="" >--select--</option>
                                        @foreach ($department_name as $department_name_list)
                                        <option value="{{ $department_name_list->id }}">{{ $department_name_list->department_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="control-group">
                                        <div class="control-group">
                                            {{ Form::label('session', 'Hall of Residence*', ['class' => 'control-label', 'title' => 'Hall of Residence']) }}
                                            <div class="controls">
                                                <select class="form-control" id="" name="hall_of_residence"  >
                                                    <option value="" >--Select--</option>
                                                    @foreach ($dormitory_name as $dormitory_name_list)
                                                    <option value="{{ $dormitory_name_list->manage_dormitory_id }} ">{{ $dormitory_name_list->dormitory_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Department & Hall of Residence X -->



                        <!-- Applicant's Information -->
                        <div class="applicant_student_block_heading">Applicant's Information</div>
                        <div class="applicant_student_block basic_information_block">

                            <div class="col-lg-6">
                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('student_name_bangla', 'Student Name(bangla)*', ['class' => 'control-label', 'title' => 'student_name_bangla']) }}
                                        <div class="controls">
                                            {{ Form::text('student_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Student Name(bangla)', 'title' => 'student_name_bangla',''=>'true']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('student_name', 'Student Name(English)*', ['class' => 'control-label', 'title' => 'student_name']) }}
                                        <div class="controls">
                                            {{ Form::text('student_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Student Name(English)', 'title' => 'student_name',''=>'true']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('NID_/_Birth_ID', 'National ID(If any)*', ['class' => 'control-label', 'title' => 'National ID(If any)']) }}
                                        <div class="controls">

                                            {{ Form::text('nid_birth', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID(If any)', 'title' => 'National ID(If any)',''=>'true']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="control-group">
                                         {{ Form::label('birth_date', 'Date of Birth No*', ['class' => 'control-label', 'title' => 'Date of Birth']) }}
                                        <div class="controls">
                                     
                                            {{ Form::date('birth_date', '', ['data-date-format' => 'mm-dd-yyyy','class' => 'form-control', 'id' => '', 'placeholder' => 'National ID', 'title' => 'National ID',''=>'true']) }}
               
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                     <div class="control-group">
                                         {{ Form::label('birth_registration', 'Birth Registration No*', ['class' => 'control-label', 'title' => 'std_birth_reg']) }}
                                         <div class="controls">
                                             {{ Form::text('birth_registration', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Birth Registration No', 'title' => 'Birth Registration No',''=>'true']) }}
                                         </div>
                                     </div>
                                </div>

                                <div class="col-lg-6">
                                 <div class="control-group">
                                    {{ Form::label('religion', 'Religion*', ['class' => 'control-label', 'title' => 'Religion']) }}
                                    <div class="controls">
                                        <select class="form-control" id="" name="religion" >
                                            <option value="" >-- Select Religion --</option>
                                            @foreach ($religion_data as $religion)
                                            <option value="{{ $religion->id }} ">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                             </div>

                             <div class="col-lg-6">
                                <div class="control-group">
                                    {{ Form::label('nationality', 'Nationality*', ['class' => 'control-label', 'title' => 'nationality']) }}
                                    <div class="controls">
                                       <!--  @php $nationality_data_list_array=[''=>'--select--'] @endphp
                                        @foreach ($nationality_data as $nationality_data_list)
                                        @php $nationality_data_list_array[$nationality_data_list->name]=$nationality_data_list->name @endphp
                                        @endforeach
                                        {{ Form::select('nationality', $nationality_data_list_array) }} -->

                                        <select class="form-control" id="" name="nationality" >
                                            <option value="" >--Select--</option>
                                            @foreach ($nationality_data as $nationality_data_list)
                                            <option value="{{ $nationality_data_list->id }} ">{{ $nationality_data_list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="control-group">
                                    {{ Form::label('maritial', 'Marital Status*', ['class' => 'control-label', 'title' => 'marital']) }}
                                    <div class="controls">
                                       <!--  @php $maritial_data_list_array=[''=>'--select--'] @endphp
                                        @foreach ($maritial_data as $maritial_data_list)
                                        @php $maritial_data_list_array[$maritial_data_list->name]=$maritial_data_list->name @endphp
                                        @endforeach

                                        {{ Form::select('maritial', $maritial_data_list_array) }} -->

                                        <select class="form-control" id="" name="maritial" >
                                            <option value="" >--Select--</option>
                                            @foreach ($maritial_data as $maritial_data_list)
                                            <option value="{{ $maritial_data_list->id }} ">{{ $maritial_data_list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('blood_group', 'Blood Group*', ['class' => 'control-label', 'title' => 'blood_group']) }}
                                        <div class="controls">
                                           <!--  @php $blood_group_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($blood_group_data as $blood_group_data_list)
                                            @php $blood_group_data_list_array[$blood_group_data_list->name]=$blood_group_data_list->name @endphp
                                            @endforeach
                                            {{ Form::select('blood_group', $blood_group_data_list_array) }} -->

                                            <select class="form-control" id="" name="blood_group" >
                                                <option value="" >--Select--</option>
                                                @foreach ($blood_group_data as $blood_group_data_list)
                                                <option value="{{ $blood_group_data_list->id }} ">{{ $blood_group_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('income_guardian', 'Income of the Guardian*', ['class' => 'control-label', 'title' => 'Income of the Guardian']) }}
                                     <div class="controls">
                                         {{ Form::text('income_guardian', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Income of the Guardian', 'title' => 'Income of the Guardian',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('email', 'E-mail*', ['class' => 'control-label', 'title' => 'E-mail']) }}
                                     <div class="controls">
                                         {{ Form::text('email', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'E-mail', 'title' => 'E-mail',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('phone', 'Student’s Contact No*', ['class' => 'control-label', 'title' => 'Student’s Contact No']) }}
                                     <div class="controls">
                                         {{ Form::text('phone', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Student’s Contact No', 'title' => 'Student’s Contact No',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('father_mobile_no', 'Father’s Contact No', ['class' => 'control-label', 'title' => 'Father’s Contact No']) }}
                                     <div class="controls">
                                         {{ Form::text('father_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father’s Contact No', 'title' => 'Father’s Contact No',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('mother_mobile_no', 'Mother’s Contact No', ['class' => 'control-label', 'title' => 'Mother’s Contact No']) }}
                                     <div class="controls">
                                         {{ Form::text('mother_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother’s Contact No', 'title' => 'Mother’s Contact No']) }}
                                     </div>
                                 </div>
                             </div>
                        </div>
                        <!-- Applicant's Information X -->


                        <!-- Father information -->
                         <div class="applicant_student_block_heading">Father's Information</div>
                        <div class="applicant_student_block">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('father_name_bangla', 'Father Name in Bangla*', ['class' => 'control-label', 'title' => 'Father Name in Bangla']) }}
                                     <div class="controls">
                                         {{ Form::text('father_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father Name in Bangla', 'title' => 'Father Name in Bangla',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('father_name', 'Father Name in English*', ['class' => 'control-label', 'title' => 'Father Name in English']) }}
                                     <div class="controls">
                                         {{ Form::text('father_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Father Name in English', 'title' => 'Father Name in English',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('father_national_id_no', 'National ID No*', ['class' => 'control-label', 'title' => 'National ID No']) }}
                                     <div class="controls">
                                         {{ Form::text('father_national_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID No', 'title' => 'National ID No',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="control-group">
                                     {{ Form::label('father_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'father_occupation']) }}
                                     <div class="controls">
                                         {{ Form::text('father_occupation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Occupation', 'title' => 'father_occupation',''=>'true']) }}
                                     </div>
                                 </div>
                             </div>
                            </div>
                        </div>
                        <!-- Father information X -->


                        <!-- Mother's information -->
                         <div class="applicant_student_block_heading">Mother's Information</div>
                        <div class="applicant_student_block">
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('mother_name_bangla', 'Mother Name in Bangla*', ['class' => 'control-label', 'title' => 'Mother Name in Bangla']) }}
                                        <div class="controls">
                                            {{ Form::text('mother_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother Name in Bangla', 'title' => 'Mother Name in Bangla',''=>'true']) }}
                                        </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="control-group">
                                         {{ Form::label('mother_name', 'Mother Name in English*', ['class' => 'control-label', 'title' => 'Mother Name in English']) }}
                                         <div class="controls">
                                             {{ Form::text('mother_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mother Name in English', 'title' => 'Mother Name in English',''=>'true']) }}
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-6">
                                     <div class="control-group">
                                         {{ Form::label('mother_national_id_no', 'National ID No*', ['class' => 'control-label', 'title' => 'National ID No']) }}
                                         <div class="controls">
                                             {{ Form::text('mother_national_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'National ID No', 'title' => 'National ID No',''=>'true']) }}
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-6">
                                     <div class="control-group">
                                         {{ Form::label('mother_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
                                         <div class="controls">
                                             {{ Form::text('mother_occupation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Occupation', 'title' => 'Occupation',''=>'true']) }}
                                         </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                        <!-- Mother's information X -->

                        <!-- Education History -->
                        <div class="applicant_student_block_heading">Educational History/Qualifications</div>
                        <div class="applicant_student_block educational_history">
                            <div class="col-lg-12">
                                <div class="control-group">
                                    <p class="col-lg-12 inner_heading">
                                        <input type="button" class="add_education_history"
                                               value="ADD Educational Qualifications">
                                    </p>
                                    <div class="col-lg-12 input_fields_wrap">
                                        <table class="table education_history">
                                            <thead>
                                                <tr>
                                                    <th>Exam Name*</th>
                                                    <th>Board/University*</th>
                                                    <th>Group*</th>
                                                    <th>Passing Year*</th>
                                                    <th>Reg No.*</th>
                                                    <th>Roll No.*</th>
                                                    <th>Division/GPA*</th>
                                                    <th>Attachment(Marksheet)*</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody class="educational_tbody" id="educational_tbody">
                                                <tr class="educational_tr">
                                                    <td>
                                                       <!--  @php $exam_name_data_list_array=[''=>'--select--'] @endphp
                                                        @foreach ($exam_name_data as $exam_name_data_list)
                                                        @php $exam_name_data_list_array[$exam_name_data_list->name]=$exam_name_data_list->name @endphp
                                                        @endforeach

                                                        {{ Form::select('exam_name[]', $exam_name_data_list_array, ['class' => 'form-control', 'id' => '', 'class' => 'table_text', 'placeholder' => 'Exam Name', 'title' => 'exam_name', 'style' => 'width: 100%']) }} -->

                                                        <select class="form-control table_text" id="" name="exam_name[]"  >
                                                            <option value="" >-- Select --</option>
                                                            @foreach ($exam_name_data as $exam_name)
                                                            <option value="{{ $exam_name->name }} ">{{ $exam_name->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                       <!--  @php $board_name_data_list_array=[''=>'--select--'] @endphp
                                                        @foreach ($board_name_data as $board_name_data_list)
                                                        @php $board_name_data_list_array[$board_name_data_list->name]=$board_name_data_list->name @endphp
                                                        @endforeach -->

                                                        <select name="borad[]" class="form-control borads" >
                                                            <option value="" >--Select--</option>
                                                            @foreach ($board_name_data as $board_name_data_list)
                                                            <option value="{{ $board_name_data_list->name }}">
                                                                {{ $board_name_data_list->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>
                                                    <td class="others_university" hidden='hidden'>
                                                        {{ Form::text('university_name[]', '', ['class' => 'form-control university_name', 'id' => '', 'placeholder' => 'University Name', 'title' => 'University Name', 'style' => 'width: 100%']) }}
                                                    </td>
                                                    <td>
                                                        <!-- @php $group_name_data_list_array=[''=>'--select--'] @endphp
                                                        @foreach ($group_name_data as $group_name_data_list)
                                                        @php $group_name_data_list_array[$group_name_data_list->name]=$group_name_data_list->name @endphp
                                                        @endforeach
                                                        {{ Form::select('group[]', $group_name_data_list_array, ['class' => 'form-control', 'id' => '', 'placeholder' => 'Group', 'title' => 'group', 'class' => 'table_text', 'style' => 'width: 100%',''=>'true']) }} -->

                                                        <select name="group[]" class="form-control " >
                                                            <option value="" >--Select--</option>
                                                            @foreach ($group_name_data as $group_name)
                                                            <option value="{{ $group_name->name }}">
                                                                {{ $group_name->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                       <!--  @php $year_data_list_array=[''=>'--select--'] @endphp
                                                        @foreach ($year_data as $year_data_list)
                                                        @php $year_data_list_array[$year_data_list->name]=$year_data_list->name @endphp
                                                        @endforeach
                                                        {{ Form::select('passing_year[]', $year_data_list_array, ['class' => 'form-control', 'id' => '', 'placeholder' => 'Passing Year', 'title' => 'passing_year', 'class' => 'table_text', 'style' => 'width: 100%',''=>'true']) }} -->
                                                        <select name="passing_year[]" class="form-control" >
                                                            <option value="" >--Select--</option>
                                                            @foreach ($year_data as $year)
                                                            <option value="{{ $year->name }}">
                                                                {{ $year->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td>{{ Form::text('reg_no[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Reg No.', 'title' => 'Reg No.', 'class' => 'table_text', 'style' => 'width:',''=>'true']) }}
                                                    </td>
                                                    <td>{{ Form::text('roll_no[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Roll No.', 'title' => 'roll_no', 'class' => 'table_text', 'style' => 'width:',''=>'true']) }}
                                                    </td>

                                                    <td>{{ Form::text('gpa[]', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Division/GPA', 'title' => 'Division/GPA', 'class' => 'table_text', 'style' => 'width:',''=>'true']) }}
                                                    </td>
                                                    <td>
                                                        <div style="width: 170px;">
                                                            <div class="control-group">
                                                                <div class="floatright">
                                                                    {{ Form::file('image_name[]', ['onchange' => 'readURL(this)',''=>'true']) }}
                                                                </div>
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
                                                                    type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                     <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"></path>
                                                 </svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Education History X -->
                        
                    <!-- Complete Credit -->
                    <div class="applicant_student_block_heading">Completed Credit</div>
                    <div class="applicant_student_block">
                        <div class="completed_credit">
                            <div class="col-md-12">
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('credit_transfer', 'Credit Transfer*', ['class' => 'control-label', 'title' => 'credit_transfer']) }}
                                        <div class="controls">
                                            <!-- {{ Form::select('credit_transfer', ['Yes' => 'Yes', 'No' => 'No']) }} -->
                                            <select name="credit_transfer" id="credit_transfer" onchange="credit_transfer_();" class="form-control" >
                                                <option value="" >--select--</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('credit_name_of_university', 'Institute Name*', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                                        <div class="controls">

                                            {{ Form::text('credit_name_of_university', '', ['class' => 'form-control', 'id' => 'credit_transfer_institute_name', 'placeholder' => 'Institute Name', 'title' => 'Institute Name']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="control-group">
                                         {{ Form::label('year', 'Year*', ['class' => 'control-label', 'title' => 'year']) }}
                                         <div class="controls">
                                             <select name="year" class="form-control" id="credit_transfer_year" >
                                                <option value="">--Select--</option>
                                                @foreach ($year_data as $year_data_list)
                                                <option value="{{ $year_data_list->name }}">
                                                    {{ $year_data_list->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                         </div>
                                    </div>
                                 </div>

                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('credit_completed_semester', 'Program Attended*', ['class' => 'control-label', 'title' => 'Program Attended']) }}
                                        <div class="controls">
                                            <select name="semester" class="form-control" id="credit_transfer_semester" >
                                                <option value="">--Select--</option>
                                                @foreach ($semester_data as $semester_data_list)
                                                <option value="{{ $semester_data_list->name }}">
                                                    {{ $semester_data_list->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('credit', 'Credit Completed*', ['class' => 'control-label', 'title' => 'Credit Completed']) }}
                                        <div class="controls">

                                            {{ Form::text('credit', '', ['class' => 'form-control', 'id' => 'credit_completed', 'placeholder' => 'Credit Completed', 'title' => 'Credit Completed', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group">
                                        {{ Form::label('CGPA', 'CGPA*', ['class' => 'control-label', 'title' => 'CGPA']) }}
                                        <div class="controls">

                                            {{ Form::text('cgpa', '', ['class' => 'form-control', 'id' => 'credit_transfer_cgpa', 'placeholder' => 'CGPA', 'title' => 'CGPA','' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Completed Credit X -->

                    <!-- Parmanent & Present Address -->
                    <div class="applicant_student_block_heading">Parmanent & Present Address</div>
                    <div class="col-lg-12">
                        <div class="control-group">
                            {{ Form::label('address', 'Permanent Address*', ['class' => 'control-label', 'title' => 'address']) }}
                            <div class="controls">
                                <table class="table address p_address_tables">
                                    <thead>
                                        <tr>
                                            <th>Division*</th>
                                            <th>District*</th>
                                            <th>Upazilla*</th>
                                            <th>Union*</th>
                                            <th>Village/House No.*</th>
                                            <th>Post Office Code No.*</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                              <!--   @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                                @foreach ($divisions_data as $divisions_data_list)
                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                                @endforeach -->
                                                <!--      {{ Form::select('division', $divisions_data_list_array, ['class' => 'p_divisions', 'id' => '']) }} -->
                                                <select name="division" class="p_divisions" >
                                                    <option>--Select--</option>
                                                    @foreach ($divisions_data as $divisions_data_list)
                                                    <option value="{{ $divisions_data_list->id }}">
                                                        {{ $divisions_data_list->name }}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td>
                                                <select name="home_district" class="p_district" >
                                                    <option>--Select--</option>
                                                </select>
                                            </td>

                                            <td>

                                                <select name="upazilas" class="p_upazilas" >
                                                    <option>--Select--</option>
                                                </select>

                                            </td>
                                            <td>
                                                <select name="unions" class="p_unions" >
                                                    <option>--Select--</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input class="form-control village_name" id=""
                                                       placeholder="Village/House No."
                                                       title="Village/House No." name="village_name"
                                                       type="text" value="" >

                                            </td>
                                            <td>
                                                <input class="form-control post_office" id=""
                                                       placeholder="Post Office Code No."
                                                       title="Post Office Code No." name="post_office"
                                                       type="text" value="" >

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="control-group">
                            {{ Form::label('', '', ['class' => 'control-label', 'title' => 'address']) }}
                            <div class="controls">
                                <input type="checkbox" class="check_permanent_addrs"> Same as Permanent
                                Address
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="control-group">
                            {{ Form::label('address', 'Present Address*', ['class' => 'control-label', 'title' => 'address']) }}
                            <div class="controls present_mainDiv">
                                <table class="table address present_table">
                                    <thead>
                                        <tr>
                                            <th>Division*</th>
                                            <th>District*</th>
                                            <th>Upazilla*</th>
                                            <th>Union*</th>
                                            <th>Village/House No.*</th>
                                            <th>Post Office Code No.*</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                               <!--  @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                                @foreach ($divisions_data as $divisions_data_list)
                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                                @endforeach -->
                                                <!--      {{ Form::select('division', $divisions_data_list_array, ['class' => 'p_divisions', 'id' => '']) }} -->
                                                <select name="present_division" class="present_divisions" >
                                                    <option>--Select--</option>
                                                    @foreach ($divisions_data as $divisions_data_list)
                                                    <option value="{{ $divisions_data_list->id }}">
                                                        {{ $divisions_data_list->name }}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td>
                                                <select name="present_home_district"
                                                        class="present_district" >
                                                    <option>--Select--</option>
                                                </select>
                                            </td>

                                            <td>

                                                <select name="present_upazilas" class="present_upazilas" >
                                                    <option>--Select--</option>
                                                </select>

                                            </td>
                                            <td>
                                                <select name="present_unions" class="present_unions" >
                                                    <option>--Select--</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input class="table_text present_village_name"
                                                       id="" placeholder="Village/House No."
                                                       title="Village/House No." name="present_village_name"
                                                       type="text" value="" >

                                            </td>
                                            <td>
                                                <input class="table_text present_post_office" id=""
                                                       placeholder="Post Office Code No."
                                                       title="Post Office Code No." name="present_post_office"
                                                       type="text" value="" >
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Parmanent & Present Address X -->

                    <!-- Quota -->
                    <div class="applicant_student_block_heading">Quota</div>
                        <div class="applicant_student_block">
                            <div class="col-lg-12">
                                <div class="control-group">
                                    {{ Form::label('quota', 'Quota', ['class' => 'control-label', 'title' => 'Quota']) }}
                                    {{-- <div class="controls">
                                            {{Form::select('physically_challenged',['Yes'=>'Yes','No'=>'No'])}}
                                </div> --}}
                                <div class="controls">
                                    @php $quota_data_list_array=[''=>'--select--'] @endphp
                                    @foreach ($quota_data as $quota_data_list)
                                    @php $quota_data_list_array[$quota_data_list->name]=$quota_data_list->name @endphp
                                    @endforeach

                                    {{ Form::select('physically_challenged', $quota_data_list_array) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quota X -->

                    <!-- Legal Guardian -->
                    <div class="applicant_student_block_heading">Legal Guardian in The Absent of Father(If Any)</div>
                    <div class="applicant_student_block reference">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_name_bangla', 'Legal Guardian Name(bangla)*', ['class' => 'control-label', 'title' => 'Legal Guardian Name(bangla)']) }}
                                        <div class="controls">
                                            {{ Form::text('legal_gurdian_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Legal Guardian Name(bangla)', 'title' => 'Legal Guardian Name(bangla)', ''=> 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_name', 'Legal Guardian Name*', ['class' => 'control-label', 'title' => 'Legal Guardian Name']) }}
                                        <div class="controls">
                                            {{ Form::text('legal_gurdian_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Legal Guardian Name', 'title' => 'Legal Guardian Name (English)', ''=> 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-1">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_relation', 'Relation*', ['class' => 'control-label', 'title' => 'legal_gurdian_relation']) }}
                                        <div class="controls">
                                           <!--  @php $dependent_relation_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($dependent_relation_data as $dependent_relation_data_list)
                                            @php $dependent_relation_data_list_array[$dependent_relation_data_list->name]=$dependent_relation_data_list->name @endphp
                                            @endforeach
                                            {{ Form::select('legal_gurdian_relation', $dependent_relation_data_list_array) }} -->

                                            <select class="form-control" id="" name="legal_gurdian_relation"  >
                                                <option value="" >--Select--</option>
                                                @foreach ($dependent_relation_data as $dependent_relation_data_list)
                                                <option value="{{ $dependent_relation_data_list->name }} ">{{ $dependent_relation_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
                                        <div class="controls">
                                           <!--  @php $profession_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($profession_data as $profession_data_list)
                                            @php $profession_data_list_array[$profession_data_list->name]=$profession_data_list->name @endphp
                                            @endforeach

                                            {{ Form::select('legal_gurdian_occupation', $profession_data_list_array) }} -->

                                            <select class="form-control" id="" name="legal_gurdian_occupation"  >
                                                <option value="" >--Select--</option>
                                                @foreach ($profession_data as $profession_data_list)
                                                <option value="{{ $profession_data_list->name }} ">{{ $profession_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_nid_no', 'NID No.*', ['class' => 'control-label', 'title' => 'NID No']) }}
                                        <div class="controls">
                                            {{ Form::text('legal_gurdian_nid_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'NID No.', 'title' => 'NID No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_contact_no', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                        <div class="controls">
                                            {{ Form::text('legal_gurdian_contact_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('legal_gurdian_address', 'Present Address*', ['class' => 'control-label', 'title' => 'Present Address']) }}
                                        <div class="controls">
                                            {{ Form::text('legal_gurdian_address', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Present Address', 'title' => 'Present Address', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Local Guardian X -->

                    <!-- Local Guardian -->
                    <div class="applicant_student_block_heading">Local Guardian in The Absent of Father</div>
                    <div class="applicant_student_block reference">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_name_bangla', 'Local Guardian Name(bangla)*', ['class' => 'control-label', 'title' => 'Local Guardian Name(bangla)']) }}
                                        <div class="controls">
                                            {{ Form::text('local_gurdian_name_bangla', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Local Guardian Name(bangla)', 'title' => 'Local Guardian Name(bangla)', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_name', 'Local Guardian Name(English)*', ['class' => 'control-label', 'title' => 'Local Guardian Name']) }}
                                        <div class="controls">
                                            {{ Form::text('local_gurdian_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Local Guardian Name(English)', 'title' => 'Legal Guardian Name', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-1">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_relation', 'Relation*', ['class' => 'control-label', 'title' => 'local_gurdian_relation']) }}
                                        <div class="controls">
                                           <!--  @php $dependent_relation_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($dependent_relation_data as $dependent_relation_data_list)
                                            @php $dependent_relation_data_list_array[$dependent_relation_data_list->name]=$dependent_relation_data_list->name @endphp
                                            @endforeach
                                            {{ Form::select('local_gurdian_relation', $dependent_relation_data_list_array) }} -->

                                            <select class="form-control" id="" name="local_gurdian_relation"  >
                                                <option value="" >--Select--</option>
                                                @foreach ($dependent_relation_data as $dependent_relation_data_list)
                                                <option value="{{ $dependent_relation_data_list->name }} ">{{ $dependent_relation_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_occupation', 'Occupation*', ['class' => 'control-label', 'title' => 'Occupation']) }}
                                        <div class="controls">
                                            <!-- @php $profession_data_list_array=[''=>'--select--'] @endphp
                                            @foreach ($profession_data as $profession_data_list)
                                            @php $profession_data_list_array[$profession_data_list->name]=$profession_data_list->name @endphp
                                            @endforeach

                                            {{ Form::select('local_gurdian_occupation', $profession_data_list_array) }} -->

                                            <select class="form-control" id="" name="local_gurdian_occupation"  >
                                                <option value="" >--Select--</option>
                                                @foreach ($profession_data as $profession_data_list)
                                                <option value="{{ $profession_data_list->name }} ">{{ $profession_data_list->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_nid_no', 'NID No.*', ['class' => 'control-label', 'title' => 'NID No']) }}
                                        <div class="controls">
                                            {{ Form::text('local_gurdian_nid_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'NID No.', 'title' => 'NID No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_contact_no', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Contact No.']) }}
                                        <div class="controls">
                                            {{ Form::text('local_gurdian_contact_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Contact No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('local_gurdian_address', 'Present Address*', ['class' => 'control-label', 'title' => 'Present Address']) }}
                                        <div class="controls">
                                            {{ Form::text('local_gurdian_address', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Present Address', 'title' => 'Present Address', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Local Guardian -->

                    <!-- Reference Information -->
                    <div class="applicant_student_block_heading">Reference Information</div>
                    <div class="applicant_student_block reference">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <p class="inner_heading">Reference 1</p>
                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('reference_name', 'Name*', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name', 'title' => 'Reference Name', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_designation', 'Designation*', ['class' => 'control-label', 'title' => 'Designation']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_designation', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Designation', 'title' => 'Designation', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_institute_name', 'Institute Name*', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_institute_name', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Institute Name', 'title' => 'Institute Name', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_id_no', 'NID No.*', ['class' => 'control-label', 'title' => 'NID No']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_id_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'NID No.', 'title' => 'NID No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_mobile_no', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="inner_heading">Reference 2</p>
                                <div class="col-lg-12 clear_both">
                                    <div class="control-group">
                                        {{ Form::label('reference_name1', 'Name*', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_name1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Name', 'title' => 'Reference Name', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_designation1', 'Designation*', ['class' => 'control-label', 'title' => 'Designation']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_designation1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Designation', 'title' => 'Designation', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_institute_name1', 'Institute Name*', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_institute_name1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Institute Name', 'title' => 'Institute Name', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_id_no1', 'NID No.*', ['class' => 'control-label', 'title' => 'NID No.']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_id_no1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'NID No.', 'title' => 'NID No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        {{ Form::label('reference_mobile_no1', 'Mobile No.*', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                        <div class="controls">
                                            {{ Form::text('reference_mobile_no1', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.', '' => 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reference Information X -->

                    <!-- Attachments -->
                    <div class="applicant_student_block_heading">Attachments</div>
                    <div class="applicant_student_block reference">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('photo', 'Photo*', ['class' => 'control-label', 'title' => 'photo']) }}
                                        <div class="controls">

                                            {{ Form::file('attached_photo_name', ['onchange' => 'readURL(this)','']) }}

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {{ Form::label('', '', ['class' => 'control-label*', 'title' => '']) }}
                                        <div class="controls">
                                            {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('image', 'Signature*', ['class' => 'control-label', 'title' => 'Signature']) }}
                                        <div class="controls">

                                            {{ Form::file('attached_signature_name', ['onchange' => 'readURL(this)','']) }}

                                        </div>
                                    </div>
                                    <div class="control-group">
                                        {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                        <div class="controls">
                                            {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Signature', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Attachments X -->

                    <!-- Payment -->
                    <div class="applicant_student_block_heading">Payment</div>
                        <div class="applicant_student_block reference">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="control-group">
                                        <h3>Bkash Payment: Please pay 255 BDT at the +880154785468745</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('payment_transaction_id', 'Transaction ID*', ['class' => 'control-label', 'title' => 'Transaction ID']) }}
                                        <div class="controls">
                                            {{ Form::text('payment_transaction_id', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Transaction ID', 'title' => 'Transaction ID', ''=> 'true']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="control-group">
                                        {{ Form::label('payment_mobile_no', 'Applicant Mobile No.*', ['class' => 'control-label', 'title' => 'Applicant Mobile No.']) }}
                                        <div class="controls">
                                            {{ Form::text('payment_mobile_no', '', ['class' => 'form-control', 'id' => '', 'placeholder' => 'Applicant Mobile No.', 'title' => 'Applicant Mobile No.', ''=> 'true']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!-- Payment X -->

                    <div class="col-lg-12">
                        <input type="checkbox" class="form-check-input" >I Agree to the above Terms and Conditions.
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                <!-- {{Form::close()}}  -->
                </form> 
            </div>
        </div>
    </div>
</div>


<div class="form-actions">
    <!-- @can('create student')
    {{ Form::submit('Submit', ['value' => 'Submit----', 'class' => 'btn btn-success']) }}
    @endcan -->
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</div>
<!-- {{ Form::close() }} -->
<!-- </form> -->
</div>
</div>
</div>
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
var p_unions_val = $('.p_unions').val();
var p_unions_text = $('.p_unions option:selected').text();
var village_name = $('.village_name').val();
var post_office = $('.post_office').val();
// console.log(p_address_table);
$(".present_divisions").html('<option value=' + p_divisions_val + ' >' +
p_divisions_text + '</option>');
$(".present_district").html('<option value=' + p_district_val + ' >' + p_district_text +
'</option>');
$(".present_upazilas").html('<option value=' + p_upazilas_val + ' >' + p_upazilas_text +
'</option>');
$(".present_unions").html('<option value=' + p_unions_val + ' >' + p_unions_text +
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
$('#add_programDiv').on('change', '.medium', function (eq) {

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
$('#add_programDiv').on('change', '.department', function (eq) {

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

<!-- Cradit Transfer if Yes then  -->
<script type="text/javascript">
    function credit_transfer_(){
        var credit_transfer = document.getElementById('credit_transfer').value;
        // alert(credit_transfer);
        if(credit_transfer == 'Yes'){
            document.getElementById('credit_transfer_institute_name'). = true;
            document.getElementById('credit_transfer_year'). = true;
            document.getElementById('credit_transfer_semester'). = true;
            document.getElementById('credit_completed'). = true;
            document.getElementById('credit_transfer_cgpa'). = true;
        }

        if(credit_transfer == 'No'){
            document.getElementById('credit_transfer_institute_name'). = false;
            document.getElementById('credit_transfer_year'). = false;
            document.getElementById('credit_transfer_semester'). = false;
            document.getElementById('credit_completed'). = false;
            document.getElementById('credit_transfer_cgpa'). = false;
        }

    }
</script>
<!-- Cradit Transfer if Yes then  X -->


@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/applicant_student.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
var max_fields = 5; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function (e) { //on add input button click
e.preventDefault();
if (x <= max_fields) { //max input box allowed
x++; //text box increment
$(wrapper).append(
'<div><table class="table address"><tr>\
                              <td><input id="" class="table_text" placeholder="Exam Name" title="exam_name" style="width: 95%" name="exam_name[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Board" title="borad" class="table_text" style="margin-left: -6%;width: 95%" name="borad[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Reg No." title="Reg No." class="table_text" style="margin-left: -12%;width: 95%" name="reg_no[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Roll No." title="roll_no" class="table_text" style="margin-left: -18%;width: 95%" name="roll_no[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Group" title="group" class="table_text" style="margin-left: -22%;width: 95%" name="group[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Passing Year" title="passing_year" class="table_text" style="margin-left: -26%;width: 95%" name="passing_year[]" type="text" value=""></td>\
                              <td><input id="" placeholder="Gpa" title="gpa" class="table_text" style="margin-left: -30%;width: 78%" name="gpa[]" type="text" value=""></td>\
                          </tr></table><button href="#" class="btn btn-danger remove_field" style="float: right;margin-top: -4.3%;margin-right: 20%;"><i class="fa fa-trash"></i></button></div>'
); //add input box
} else {
toastr.warning('Only 5 Fileds Are Allowed');
return false;
}
});
$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
e.preventDefault();
$(this).parent('div').remove();
x--;
})
})
;

</script>
@endpush
@stop
