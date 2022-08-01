@extends('website.index')
@section('website_main_section')

    <div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
                <div class="panel-heading">Online Admission</div>
                {{--
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;
                                Success!</strong> {{ Session::get('success') }}
                        </div>

                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul style='list-style:none'>
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="padding: 10px;" class="row">
                        {{Form::open(['url'=>'/frontend/online-admission','class'=>'form-horizontal','method'=>'post'])}}
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="student_name">Name:</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name"
                                           style="width: 95%;" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="parent_name">Guardian Name:</label>
                                    <input type="text" class="form-control" id="parent_name" name="parent_name"
                                           placeholder="Guardian Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="postal_code">Postal Code</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                           style="width: 95%;" placeholder="Postal Code">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" style="width: 95%;"
                                           placeholder="Email">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="session">Session:</label>
                                    <select class="form-control" id="session" name="session">
                                        <option value="">--select--</option>
                                        @foreach($session as $value)
                                            <option>{{$value->type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="department">Department Name</label>
                                    <select class="form-control" id="department" name="department" style="width: 95%;">
                                        <option value="">--select--</option>
                                        @foreach($department as $value)
                                            <option>{{$value->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="shift">Shift</label>
                                    <select class="form-control" id="shift" name="shift">
                                        <option value="">--select--</option>
                                        @foreach($shift as $value)
                                            <option>{{$value->type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="birth_date">Birth Date</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                                           style="width: 95%;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">--select--</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        {{Form::close()}}
                    </div>


                </div>

--}}
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;
                                Success!</strong> {{ Session::get('success') }}
                        </div>

                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul style='list-style:none'>
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style="padding: 10px;" class="row">
                        <div class="widget-box online_admission">
                            <div class="widget-content nopadding">
                                {{Form::open(['url'=>'/frontend/online-admission','class'=>'form-horizontal','method'=>'post'])}}

                                <div class="applicant_student_block_heading">Semester & Degree</div>
                                <div class="applicant_student_block">
                                    <div class="col-lg-12">
                                        <div class="col-md-3">
                                            <div class="control-group">
                                                {{Form::label('degree_name','Degree Name',['class'=>'control-label','title'=>'degree_name'])}}
                                                <div class="controls">
                                                    @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($degree_name_data as $degree_name_data_list)
                                                        @php $degree_name_data_list_array[$degree_name_data_list->name]=$degree_name_data_list->name @endphp
                                                    @endforeach

                                                    {{Form::select('degree_name',$degree_name_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            {{Form::label('session_choose','Semester Name',['class'=>'control-label','title'=>'Session Name'])}}
                                            <div class="controls">
                                                @php $session_choose_data_list_array=[''=>'--select--'] @endphp
                                                @foreach($session_choose_data as $session_choose_data_list)
                                                    @php $session_choose_data_list_array[$session_choose_data_list->name]=$session_choose_data_list->name @endphp
                                                @endforeach

                                                {{Form::select('session_choose',$session_choose_data_list_array)}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="control-group">
                                                <div class="control-group">
                                                    {{Form::label('session','Semester Year',['class'=>'control-label','title'=>'Session Choose'])}}

                                                    <select class="form-control" id="session" name="session">
                                                        <option value="">--select--</option>
                                                        @foreach($session as $value)
                                                            <option>{{$value->type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="applicant_student_block_heading">Basic Information</div>
                                <div class="applicant_student_block basic_information_block">

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('student_name','Student Name',['class'=>'control-label','title'=>'student_name'])}}
                                                <div class="controls">
                                                    {{Form::text('student_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Student Name','title'=>'student_name'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('father_name','Father Name',['class'=>'control-label','title'=>'father_name'])}}
                                                <div class="controls">

                                                    {{Form::text('father_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Father Name','title'=>'father_name'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('mother_name','Mother Name',['class'=>'control-label','title'=>'mother_name'])}}
                                                <div class="controls">

                                                    {{Form::text('mother_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Mother Name','title'=>'mother_name'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('marital','Marital Status',['class'=>'control-label','title'=>'marital'])}}
                                                <div class="controls">
                                                    @php $maritial_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($maritial_data as $maritial_data_list)
                                                        @php $maritial_data_list_array[$maritial_data_list->name]=$maritial_data_list->name @endphp
                                                    @endforeach

                                                    {{Form::select('maritial',$maritial_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('spouse_name','Spouse Name',['class'=>'control-label','title'=>'spouse_name'])}}
                                                <div class="controls">

                                                    {{Form::text('spouse_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Spouse Name','title'=>'spouse_name'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('nationality','Nationality',['class'=>'control-label','title'=>'nationality'])}}
                                                <div class="controls">
                                                    @php $nationality_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($nationality_data as $nationality_data_list)
                                                        @php $nationality_data_list_array[$nationality_data_list->name]=$nationality_data_list->name @endphp
                                                    @endforeach

                                                    {{Form::select('nationality',$nationality_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('blood_group','Blood Group',['class'=>'control-label','title'=>'blood_group'])}}
                                                <div class="controls">
                                                    @php $blood_group_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($blood_group_data as $blood_group_data_list)
                                                        @php $blood_group_data_list_array[$blood_group_data_list->name]=$blood_group_data_list->name @endphp
                                                    @endforeach
                                                    {{Form::select('blood_group',$blood_group_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('gender','Gender',['class'=>'control-label','title'=>'gender'])}}
                                                <div class="controls">
                                                    {{Form::select('gender',['Male'=>'Male','Female'=>'Female','Others'=>'Others'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{Form::label('religion','Religion',['class'=>'control-label','title'=>'Religion'])}}
                                            <div class="controls">
                                                @php $religion_data_list_array=[''=>'--select--'] @endphp
                                                @foreach($religion_data as $religion_data_list)
                                                    @php $religion_data_list_array[$religion_data_list->name]=$religion_data_list->name @endphp
                                                @endforeach

                                                {{Form::select('religion',$religion_data_list_array)}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('NID_/_Birth_ID','NID/Birth Registration No',['class'=>'control-label','title'=>'N./Birth ID'])}}
                                                <div class="controls">

                                                    {{Form::text('nid_birth','',['class'=>'form-control', 'id'=>'required','placeholder'=>'NID/Birth Registration No','title'=>'N./Birth ID'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('phone','Contact ( Self )',['class'=>'control-label','title'=>'Contact ( Self )'])}}
                                                <div class="controls">
                                                    {{Form::text('phone','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Contact ( Self )','title'=>'Contact ( Self )'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('phone','Contact ( Family  )',['class'=>'control-label','title'=>'Contact ( Family  )'])}}
                                                <div class="controls">
                                                    {{Form::text('phone_family','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Contact ( Family  )','title'=>'Contact ( Family  )'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                                                <div class="controls">
                                                    {{Form::email('email','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Email','title'=>'email'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="control-group">
                                                {{Form::label('birth_date','Date Of Birth(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                                                <div class="controls">
                                                    <div data-date="12-02-2012" class="input-append date datepicker">
                                                        {{Form::date('birth_date',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%'])}}

                                                        <span class="add-on"><i class="icon-th"></i></span>
                                                        <!-- <input type="date">  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('address','Permanent Address',['class'=>'control-label','title'=>'address'])}}
                                            <div class="controls">
                                                <table class="table address">
                                                    <thead>
                                                    <tr>
                                                        <th>Division</th>
                                                        <th>District</th>
                                                        <th>Upazilla</th>
                                                        <th>Union</th>
                                                        <th>Village/House No</th>
                                                        <th>Post Office Code</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($divisions_data as $divisions_data_list)
                                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('division',$divisions_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            @php $districts_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($districts_data as $districts_data_list)
                                                                @php $districts_data_list_array[$districts_data_list->name]=$districts_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('home_district',$districts_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}
                                                        </td>

                                                        <td>
                                                            @php $upazilas_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($upazilas_data as $upazilas_data_list)
                                                                @php $upazilas_data_list_array[$upazilas_data_list->name]=$upazilas_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('upazilas',$upazilas_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            @php $unions_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($unions_data as $unions_data_list)
                                                                @php $unions_data_list_array[$unions_data_list->name]=$unions_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('unions',$unions_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            {{Form::text('village_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Address','title'=>'address','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            {{Form::text('post_office','',['class'=>'form-control', 'id'=>'required','class'=>'table_text','placeholder'=>'Post Office Code','title'=>'post_office_code'])}}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="checkbox"> Same as Permanent Address
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('address','Present Address',['class'=>'control-label','title'=>'address'])}}
                                            <div class="controls">
                                                <table class="table address">
                                                    <thead>
                                                    <tr>
                                                        <th>Division</th>
                                                        <th>District</th>
                                                        <th>Upazilla</th>
                                                        <th>Union</th>
                                                        <th>Village/House No</th>
                                                        <th>Post Office Code</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            @php $divisions_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($divisions_data as $divisions_data_list)
                                                                @php $divisions_data_list_array[$divisions_data_list->name]=$divisions_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('present_division',$divisions_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            @php $districts_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($districts_data as $districts_data_list)
                                                                @php $districts_data_list_array[$districts_data_list->name]=$districts_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('present_home_district',$districts_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}
                                                        </td>

                                                        <td>
                                                            @php $upazilas_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($upazilas_data as $upazilas_data_list)
                                                                @php $upazilas_data_list_array[$upazilas_data_list->name]=$upazilas_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('present_upazilas',$upazilas_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            @php $unions_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($unions_data as $unions_data_list)
                                                                @php $unions_data_list_array[$unions_data_list->name]=$unions_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('present_unions',$unions_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            {{Form::text('present_village_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Address','title'=>'address','class'=>'table_text'])}}
                                                        </td>
                                                        <td>
                                                            {{Form::text('present_post_office','',['class'=>'form-control', 'id'=>'required','class'=>'table_text','placeholder'=>'Post Office Code','title'=>'post_office_code'])}}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    {{--<div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('address','Present Address',['class'=>'control-label','title'=>'address'])}}
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
                                                        <td>{{Form::text('present_post_office','',['class'=>'form-control', 'id'=>'required','class'=>'table_text','placeholder'=>'Post Office','title'=>'post_office'])}}</td>
                                                        <td>{{Form::text('present_home_district','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}</td>
                                                        <td>{{Form::text('present_division','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}</td>
                                                        <td>{{Form::text('present_village_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Village Name','title'=>'village_name','class'=>'table_text'])}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>--}}

                                </div>
                                <div class="applicant_student_block_heading">Educational History</div>
                                <div class="applicant_student_block educational_history">
                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('educational_qualification','Educational Qualifications',['class'=>'control-label','title'=>'address'])}}
                                            <br>
                                            <div class="controls input_fields_wrap">
                                                <table class="table address">
                                                    <thead>
                                                    <tr>
                                                        <th>Exam Name</th>
                                                        <th>Board/University</th>
                                                        <th>University Name</th>
                                                        <th>Group</th>
                                                        <th>Passing Year</th>
                                                        <th>Reg No</th>
                                                        <th>Roll No</th>
                                                        <th>Division/GPA</th>
                                                        <th>Attachment(Marksheet)</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            @php $exam_name_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($exam_name_data as $exam_name_data_list)
                                                                @php $exam_name_data_list_array[$exam_name_data_list->name]=$exam_name_data_list->name @endphp
                                                            @endforeach

                                                            {{Form::select('exam_name[]',$exam_name_data_list_array,['class'=>'form-control', 'id'=>'required','class'=>'table_text','placeholder'=>'Exam Name','title'=>'exam_name','style'=>'width: 100%'])}}</td>
                                                        <td>
                                                            @php $board_name_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($board_name_data as $board_name_data_list)
                                                                @php $board_name_data_list_array[$board_name_data_list->name]=$board_name_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('borad[]',$board_name_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Board','title'=>'borad','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                                        <td>{{Form::text('university_name[]','',['class'=>'form-control', 'id'=>'required','placeholder'=>'University Name','title'=>'University Name','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                                        <td>
                                                            @php $group_name_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($group_name_data as $group_name_data_list)
                                                                @php $group_name_data_list_array[$group_name_data_list->name]=$group_name_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('group[]',$group_name_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Group','title'=>'group','class'=>'table_text','style'=>'width: 100%'])}}
                                                        </td>
                                                        <td>
                                                            @php $year_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($year_data as $year_data_list)
                                                                @php $year_data_list_array[$year_data_list->name]=$year_data_list->name @endphp
                                                            @endforeach
                                                            {{Form::select('passing_year[]',$year_data_list_array,['class'=>'form-control', 'id'=>'required','placeholder'=>'Passing Year','title'=>'passing_year','class'=>'table_text','style'=>'width: 100%'])}}
                                                        </td>

                                                        <td>{{Form::text('reg_no[]','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Reg No','title'=>'Reg No','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                                        <td>{{Form::text('roll_no[]','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Roll No','title'=>'roll_no','class'=>'table_text','style'=>'width: 100%'])}}</td>

                                                        <td>{{Form::text('gpa[]','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Division/GPA','title'=>'Division/GPA','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                                        <td>
                                                            <div style="width: 101px;">
                                                                <div class="control-group">
                                                                    {{Form::label('marksheet','Marksheet',['class'=>'control-label','title'=>'Marksheet'])}}
                                                                    <div class="controls">

                                                                        {{Form::file('marksheet',['onchange'=>'readURL(this)'])}}

                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    {{Form::label('','',['class'=>'control-label','title'=>''])}}
                                                                    <div class="controls">
                                                                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success add_field_button"
                                                                    type="button">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="applicant_student_block_heading">Quota</div>
                                <div class="applicant_student_block">
                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('quota','Quota',['class'=>'control-label','title'=>'Quota'])}}
                                            {{--<div class="controls">
                                                {{Form::select('physically_challenged',['Yes'=>'Yes','No'=>'No'])}}
                                            </div>--}}
                                            <div class="controls">
                                                @php $quota_data_list_array=[''=>'--select--'] @endphp
                                                @foreach($quota_data as $quota_data_list)
                                                    @php $quota_data_list_array[$quota_data_list->name]=$quota_data_list->name @endphp
                                                @endforeach

                                                {{Form::select('quota',$quota_data_list_array)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="applicant_student_block_heading">Apply Programs</div>
                                <div class="applicant_student_block academic_information">
                                    <p class="inner_heading">First Choose</p>
                                    <div class="col-lg-12">
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Faculty','Faculty',['class'=>'control-label','title'=>'Faculty'])}}
                                                <div class="controls">
                                                    @php $medium_array=[''=>'--select--'] @endphp
                                                    @foreach($medium as $medium_list)
                                                        @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('medium',$medium_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $department_data["Please Frist Fill Program"]="Please Frist Fill Program" @endphp

                                                    {{Form::select('department',$department_data,null,['id'=>'Manage_department'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('program','Program',['class'=>'control-label','title'=>'program'])}}
                                                <div class="controls">
                                                    @php $class=[''=>'--select--'] @endphp
                                                    @foreach($manage_class as $manage_class_list)
                                                        @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                                    @endforeach
                                                    {{Form::select('class',$class,null,['class'=>'manage_class','id'=>'manage_class'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $section["Please Frist Fill Program"]="Please Frist Fill Program" @endphp


                                                    {{Form::select('section',$section,null,['id'=>'student_section'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Shift','Shift',['class'=>'control-label','title'=>'batcg'])}}
                                                <div class="controls">
                                                    @php $shift_list_array=[''=>'--select--'] @endphp
                                                    @foreach($shift as $shift_list)
                                                        @php $shift_list_array[$shift_list->type_name]=$shift_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('shift',$shift_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="inner_heading">Second Choose</p>
                                    <div class="col-lg-12">
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Faculty','Faculty',['class'=>'control-label','title'=>'Faculty'])}}
                                                <div class="controls">
                                                    @php $medium_array=[''=>'--select--'] @endphp
                                                    @foreach($medium as $medium_list)
                                                        @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('medium2',$medium_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $department_data["Please Frist Fill Program"]="Please Frist Fill Program" @endphp

                                                    {{Form::select('department2',$department_data,null,['id'=>'Manage_department'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('program','Program',['class'=>'control-label','title'=>'program'])}}
                                                <div class="controls">
                                                    @php $class=[''=>'--select--'] @endphp
                                                    @foreach($manage_class as $manage_class_list)
                                                        @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                                    @endforeach
                                                    {{Form::select('class2',$class,null,['class'=>'manage_class','id'=>'manage_class'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $section["Please Frist Fill Program"]="Please Frist Fill Program" @endphp


                                                    {{Form::select('section2',$section,null,['id'=>'student_section'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Shift','Shift',['class'=>'control-label','title'=>'batcg'])}}
                                                <div class="controls">
                                                    @php $shift_list_array=[''=>'--select--'] @endphp
                                                    @foreach($shift as $shift_list)
                                                        @php $shift_list_array[$shift_list->type_name]=$shift_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('shift2',$shift_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="inner_heading">Third Choose</p>
                                    <div class="col-lg-12">
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Faculty','Faculty',['class'=>'control-label','title'=>'Faculty'])}}
                                                <div class="controls">
                                                    @php $medium_array=[''=>'--select--'] @endphp
                                                    @foreach($medium as $medium_list)
                                                        @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('medium3',$medium_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $department_data["Please Frist Fill Program"]="Please Frist Fill Program" @endphp

                                                    {{Form::select('department3',$department_data,null,['id'=>'Manage_department'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('program','Program',['class'=>'control-label','title'=>'program'])}}
                                                <div class="controls">
                                                    @php $class=[''=>'--select--'] @endphp
                                                    @foreach($manage_class as $manage_class_list)
                                                        @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                                    @endforeach
                                                    {{Form::select('class3',$class,null,['class'=>'manage_class','id'=>'manage_class'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $section["Please Frist Fill Program"]="Please Frist Fill Program" @endphp


                                                    {{Form::select('section3',$section,null,['id'=>'student_section'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Shift','Shift',['class'=>'control-label','title'=>'batcg'])}}
                                                <div class="controls">
                                                    @php $shift_list_array=[''=>'--select--'] @endphp
                                                    @foreach($shift as $shift_list)
                                                        @php $shift_list_array[$shift_list->type_name]=$shift_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('shift3',$shift_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="inner_heading">Fourth Choose</p>
                                    <div class="col-lg-12">
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Faculty','Faculty',['class'=>'control-label','title'=>'Faculty'])}}
                                                <div class="controls">
                                                    @php $medium_array=[''=>'--select--'] @endphp
                                                    @foreach($medium as $medium_list)
                                                        @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('medium4',$medium_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $department_data["Please Frist Fill Program"]="Please Frist Fill Program" @endphp

                                                    {{Form::select('department4',$department_data,null,['id'=>'Manage_department'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('program','Program',['class'=>'control-label','title'=>'program'])}}
                                                <div class="controls">
                                                    @php $class=[''=>'--select--'] @endphp
                                                    @foreach($manage_class as $manage_class_list)
                                                        @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                                    @endforeach
                                                    {{Form::select('class4',$class,null,['class'=>'manage_class','id'=>'manage_class'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}

                                                <div class="controls">
                                                    @php $section["Please Frist Fill Program"]="Please Frist Fill Program" @endphp


                                                    {{Form::select('section4',$section,null,['id'=>'student_section'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('Shift','Shift',['class'=>'control-label','title'=>'batcg'])}}
                                                <div class="controls">
                                                    @php $shift_list_array=[''=>'--select--'] @endphp
                                                    @foreach($shift as $shift_list)
                                                        @php $shift_list_array[$shift_list->type_name]=$shift_list->type_name @endphp
                                                    @endforeach

                                                    {{Form::select('shift4',$shift_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="applicant_student_block_heading">Completed Credit</div>
                                <div class="applicant_student_block">
                                    <div class="completed_credit">
                                        <div class="col-md-12">
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    {{Form::label('credit_transfer','Credit Transfer',['class'=>'control-label','title'=>'credit_transfer'])}}
                                                    <div class="controls">
                                                        {{Form::select('credit_transfer',['Yes'=>'Yes','No'=>'No'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    {{Form::label('credit_name_of_university','Name of University',['class'=>'control-label','title'=>'Name of University'])}}
                                                    <div class="controls">

                                                        {{Form::text('credit_name_of_university','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Name of University','title'=>'Name of University'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    {{Form::label('credit_completed_semester','Completed Semester',['class'=>'control-label','title'=>'Completed Semester'])}}
                                                    <div class="controls">
                                                        <div class="controls">
                                                            @php $semester_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($semester_data as $semester_data_list)
                                                                @php $semester_data_list_array[$semester_data_list->name]=$semester_data_list->name @endphp
                                                            @endforeach

                                                            {{Form::select('semester',$semester_data_list_array)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    {{Form::label('Credit','Credit',['class'=>'control-label','title'=>'Credit'])}}
                                                    <div class="controls">

                                                        {{Form::text('credit','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Credit','title'=>'Credit'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    {{Form::label('CGPA','CGPA',['class'=>'control-label','title'=>'CGPA'])}}
                                                    <div class="controls">

                                                        {{Form::text('cgpa','',['class'=>'form-control', 'id'=>'required','placeholder'=>'CGPA','title'=>'CGPA'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    {{Form::label('date_application','Date Of Application',['class'=>'control-label','title'=>'Date Of Application'])}}
                                                    <div class="controls">
                                                        <div data-date="12-02-2012"
                                                             class="input-append date datepicker">
                                                            {{Form::date('date_application',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'form-control'])}}

                                                            <span class="add-on"><i class="icon-th"></i></span>
                                                            <!-- <input type="date">  -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    {{Form::label('admission_status','Admission Status',['class'=>'control-label','title'=>'admission_status'])}}
                                                    <div class="controls">
                                                        {{Form::select('admission_status',['Active'=>'Active','Cancelled'=>'Cancelled'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="applicant_student_block_heading">Dependent Information</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-md-12">
                                        <div class="col-lg-1">
                                            <div class="control-group">
                                                {{Form::label('dependent_relation','Relation',['class'=>'control-label','title'=>'Relation'])}}
                                                <div class="controls">
                                                    @php $dependent_relation_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($dependent_relation_data as $dependent_relation_data_list)
                                                        @php $dependent_relation_data_list_array[$dependent_relation_data_list->name]=$dependent_relation_data_list->name @endphp
                                                    @endforeach

                                                    {{Form::select('dependent_relation',$dependent_relation_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="control-group">
                                                {{Form::label('reference_name','Profession',['class'=>'control-label','title'=>'Profession'])}}
                                                <div class="controls">
                                                    @php $profession_data_list_array=[''=>'--select--'] @endphp
                                                    @foreach($profession_data as $profession_data_list)
                                                        @php $profession_data_list_array[$profession_data_list->name]=$profession_data_list->name @endphp
                                                    @endforeach

                                                    {{Form::select('dependent_profession',$profession_data_list_array)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="control-group">
                                                {{Form::label('dependent_mobile_no','Mobile No',['class'=>'control-label','title'=>'Mobile No'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_mobile_no','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Mobile No','title'=>'Mobile No'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div style="width: 101px;">
                                                <div class="control-group">
                                                    {{Form::label('dependent_nid','NID',['class'=>'control-label','title'=>'Marksheet'])}}
                                                    <div class="controls">

                                                        {{Form::file('dependent_nid',['onchange'=>'readURL(this)'])}}

                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    {{Form::label('','',['class'=>'control-label','title'=>''])}}
                                                    <div class="controls">
                                                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'NID','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('dependent_monthly_income','Monthly Income',['class'=>'control-label','title'=>'Monthly Income'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_monthly_income','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Monthly Income','title'=>'Monthly Income'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('dependent_no_of_brothers','No of Brothers',['class'=>'control-label','title'=>'No of Brothers'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_no_of_brothers','',['class'=>'form-control', 'id'=>'required','placeholder'=>'No of Brothers','title'=>'No of Brothers'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('dependent_no_of_sisters','No of Sisters',['class'=>'control-label','title'=>'No of Sisters'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_no_of_sisters','',['class'=>'form-control', 'id'=>'required','placeholder'=>'No of Sisters','title'=>'No of Sisters'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('dependent_no_of_edu_brothers','No of Education Running Brothers',['class'=>'control-label','title'=>'No of Education Running Brothers'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_no_of_edu_brothers','',['class'=>'form-control', 'id'=>'required','placeholder'=>'No of Education Running Brothers','title'=>'No of Education Running Brothers'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="control-group">
                                                {{Form::label('dependent_no_of_edu_sisters','No of Education Running Sisters',['class'=>'control-label','title'=>'No of Education Running Sisters'])}}
                                                <div class="controls">
                                                    {{Form::text('dependent_no_of_edu_sisters','',['class'=>'form-control', 'id'=>'required','placeholder'=>'No of Education Running Sisters','title'=>'No of Education Running Sisters'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="applicant_student_block_heading">Reference Information</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <p class="inner_heading">Reference 1</p>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_name','Name',['class'=>'control-label','title'=>'Reference Name'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Name','title'=>'Reference Name'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_designation','Designation',['class'=>'control-label','title'=>'Designation'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_designation','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Designation','title'=>'Designation'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_institute_name','Institute Name',['class'=>'control-label','title'=>'Institute Name'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_institute_name','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Institute Name','title'=>'Institute Name'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_id_no','ID No',['class'=>'control-label','title'=>'ID No'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_id_no','',['class'=>'form-control', 'id'=>'required','placeholder'=>'ID No','title'=>'ID No'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_mobile_no','Mobile No',['class'=>'control-label','title'=>'Mobile No'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_mobile_no','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Mobile No','title'=>'Mobile No'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="inner_heading">Reference 2</p>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_name1','Name',['class'=>'control-label','title'=>'Reference Name'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_name1','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Name','title'=>'Reference Name'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_designation1','Designation',['class'=>'control-label','title'=>'Designation'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_designation1','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Designation','title'=>'Designation'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_institute_name1','Institute Name',['class'=>'control-label','title'=>'Institute Name'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_institute_name1','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Institute Name','title'=>'Institute Name'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_id_no1','ID No',['class'=>'control-label','title'=>'ID No'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_id_no1','',['class'=>'form-control', 'id'=>'required','placeholder'=>'ID No','title'=>'ID No'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="control-group">
                                                    {{Form::label('reference_mobile_no1','Mobile No',['class'=>'control-label','title'=>'Mobile No'])}}
                                                    <div class="controls">
                                                        {{Form::text('reference_mobile_no1','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Mobile No','title'=>'Mobile No'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
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
                                                {{Form::label('payment_transaction_id','Transaction ID',['class'=>'control-label','title'=>'Transaction ID'])}}
                                                <div class="controls">
                                                    {{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Transaction ID','title'=>'Transaction ID'])}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="control-group">
                                                {{Form::label('payment_mobile_no','Applicant Mobile Number',['class'=>'control-label','title'=>'Applicant Mobile Number'])}}
                                                <div class="controls">
                                                    {{Form::text('payment_mobile_no','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Applicant Mobile Number','title'=>'Applicant Mobile Number'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="applicant_student_block_heading">Attachments</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    {{Form::label('photo','Photo',['class'=>'control-label','title'=>'photo'])}}
                                                    <div class="controls">

                                                        {{Form::file('image',['onchange'=>'readURL(this)'])}}

                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    {{Form::label('','',['class'=>'control-label','title'=>''])}}
                                                    <div class="controls">
                                                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    {{Form::label('image','Signature',['class'=>'control-label','title'=>'Signature'])}}
                                                    <div class="controls">

                                                        {{Form::file('image',['onchange'=>'readURL(this)'])}}

                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    {{Form::label('','',['class'=>'control-label','title'=>''])}}
                                                    <div class="controls">
                                                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Signature','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="applicant_student_block_heading">Waiver</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="control-group">
                                                <table>
                                                    <thead>
                                                    <th>Particulars</th>
                                                    <th>Amount</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr><td>Credit Fee</td><td>{{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'','title'=>'Transaction ID'])}}</td></tr>
                                                    <tr><td>Admission Fee</td><td>{{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'','title'=>'Transaction ID'])}}</td></tr>
                                                    <tr><td>Semester Fee</td><td>{{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'','title'=>'Transaction ID'])}}</td></tr>
                                                    <tr><td>Hall Seat Charge</td><td>{{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'','title'=>'Transaction ID'])}}</td></tr>
                                                    <tr><td>Others</td><td>{{Form::text('payment_transaction_id','',['class'=>'form-control', 'id'=>'required','placeholder'=>'','title'=>'Transaction ID'])}}</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="applicant_student_block_heading">The Following Documents are to be attached</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Money Receipt of Application Registration Form</li>
                                            <li>Testimonials from the Heads of Institutions from where the candidate has passed S.S.C & H.S.C/Equivalent Examinations</li>
                                            <li>Citizendhip certificate from any Gazetted Officer in respect of
                                                your character.</li>
                                            <li>3 (Three) Copies of recent passport size photographs duly attested.</li>
                                            <li>Attested copies of mark sheets/Candidates of S.S.C & H.S.C/Equivalent Examination.</li>
                                            <li>Certificate regarding financial solvency of father/guardian</li>
                                        </ul>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="applicant_student_block_heading">Declaration</div>
                                <div class="applicant_student_block reference">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>I, hereby solemnly declare and legally bind myself to confirm to the Rules and Regulations of the University at present in force or
                                                may hereafter be made and i undertake the so long as I am a Student of the Universty i will do nothing either inside of outside the
                                                University that will unterfere with the discipline and the other of Ordinances of University Grant Commission relating Course, Syllabus and Examination at present on force or that may hereafter be made to this effect.</li>

                                            <li>I shall be liable to tbe expelled from the University if any of the above information each found to be false or fabricated, all fees and
                                                other dues paid by me to the University up to that time shall be forefeited. I and my father/legal guardian would also be liable to any
                                                further departmental or legal action that the authorities may deem necessary.</li>
                                            <li>
                                                I further solemnly declare that there is no personal, domestic or financial circumnstances which may prevent me from continuing my studies in this University until the completion of the entire course of studies.
                                            </li>

                                            <li>I further declare that i shall not do any activities subversive to the discipline of the institution and/or of the State (Such as Strike, Hartal & Boycott etc.)</li>

                                            <li>I hereby certify that the above statement of Particulars are tru and correct.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="checkbox">I Agree to the above Terms and Conditions.
                                </div>
                                <p>&nbsp;</p>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/applicant_student.js')}}"></script>
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
                        $(wrapper).append('<div><table class="table address"><tr>\
                              <td><input id="required" class="table_text" placeholder="Exam Name" title="exam_name" style="width: 95%" name="exam_name[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Board" title="borad" class="table_text" style="margin-left: -6%;width: 95%" name="borad[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Reg No" title="Reg No" class="table_text" style="margin-left: -12%;width: 95%" name="reg_no[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Roll No" title="roll_no" class="table_text" style="margin-left: -18%;width: 95%" name="roll_no[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Group" title="group" class="table_text" style="margin-left: -22%;width: 95%" name="group[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Passing Year" title="passing_year" class="table_text" style="margin-left: -26%;width: 95%" name="passing_year[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Gpa" title="gpa" class="table_text" style="margin-left: -30%;width: 78%" name="gpa[]" type="text" value=""></td>\
                          </tr></table><button href="#" class="btn btn-danger remove_field" style="float: right;margin-top: -4.3%;margin-right: 20%;"><i class="fa fa-trash"></i></button></div>'); //add input box
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
            });
        </script>
    @endpush
@stop