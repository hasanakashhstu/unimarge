@extends('website.index')
@section('website_main_section')
    <div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper" id="Vue_component_wrapper">
            <div class="panel panel-primary">
                <div class="panel-heading">Online Admission</div>
<<<<<<< HEAD
=======
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
                        <!-- {{Form::open(['url'=>'/frontend/online-admission','files' => 'true','enctype'=>'multipart/form-data','class'=>'','method'=>'post'])}} -->
                        <form action="/frontend/online-admission" method="post" enctype="multipart/form-data" class="form-horizontal">
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
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
                <div class="panel-body">
                    <div style="padding: 10px;" class="row">
                        <div class="widget-box online_admission">
                            <div class="widget-content nopadding">
<<<<<<< HEAD
                                <form method="POST" action="http://software.zhsust.edu.bd/frontend/online-admission" accept-charset="UTF-8" class="form-horizontal">
                                    <input name="_token" type="hidden" value="maLLQWI48QxzIMLA39ol39sgAg7vP2fbqC7RqJ88">
                                    <div class="applicant_student_block_heading">Semester &amp; Degree</div>
                                    <div class="applicant_student_block">
                                        <div class="col-lg-12">
                                            <div class="col-md-3">
=======
                                {{Form::open(['url'=>'/frontend/online-admission','files' => 'true','enctype'=>'multipart/form-data','class'=>'form-horizontal','method'=>'post'])}}

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
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
                                                <div class="control-group">
                                                    <label for="degree_name" title="degree_name">Degree Name</label>
                                                    <div class="controls">
                                                        <select v-model="formData.degree_name" id="degree_name" name="degree_name">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Graduate">Graduate</option>
                                                            <option value="Undergraduate">Undergraduate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD
                                            <div class="col-md-3">
                                                <label for="session_choose" title="Session Name">Semester Name</label>
                                                <div class="controls">
                                                    <select id="session_choose" name="session_choose" v-model="formData.session_choose">
                                                        <option selected="selected">--select--</option>
                                                        <option value="Spring">Spring</option>
                                                        <option value="Summer">Summer</option>
                                                        <option value="Fall">Fall</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <div class="control-group">
                                                        <label for="session" title="Session Choose">Semester Year</label>
                                                        <select class="form-control" id="session" name="session" v-model="formData.session">
                                                            <option>--select--</option>
                                                            <option>2012</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Basic Information</div>
                                    <div class="applicant_student_block basic_information_block">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="student_name" title="student_name">Student Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Student Name" title="student_name" name="student_name" type="text" v-model="formData.student_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="father_name" title="father_name">Father Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Father Name" title="father_name" name="father_name" type="text" v-model="formData.father_name">
                                                        </div>
=======
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="control-group">
                                            {{Form::label('address','Permanent Address',['class'=>'control-label','title'=>'address'])}}
                                            <div class="controls">
                                                <table class="table address p_address_tables">
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
                                                       <!--      {{Form::select('division',$divisions_data_list_array,['class'=>'p_divisions','id'=>''])}} -->
                                                        <select name="division" class="p_divisions">
                                                            <option >--Select--</option>
                                                            @foreach($divisions_data as $divisions_data_list)
                                                                <option value="{{$divisions_data_list->id}}">{{$divisions_data_list->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        </td>
                                                        <td>
                                                            <select name="home_district" class="p_district">
                                                                <option >--Select--</option>
                                                            </select>
                                                        </td>

                                                        <td>

                                                            <select name="upazilas" class="p_upazilas">
                                                                <option >--Select--</option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="unions" class="p_unions">
                                                                <option >--Select--</option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <input class="form-control village_name" id="required" placeholder="Address" title="address" name="village_name" type="text" value="">

                                                        </td>
                                                        <td>
                                                            <input class="form-control post_office" id="required" placeholder="Address" title="address" name="village_name" type="text" value="">

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
                                            {{Form::label('address','Present Address',['class'=>'control-label','title'=>'address'])}}
                                            <div class="controls present_mainDiv">
                                                <table class="table address present_table">
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
                                                       <!--      {{Form::select('division',$divisions_data_list_array,['class'=>'p_divisions','id'=>''])}} -->
                                                            <select name="present_division" class="present_divisions">
                                                                <option >--Select--</option>
                                                                @foreach($divisions_data as $divisions_data_list)
                                                                    <option value="{{$divisions_data_list->id}}">{{$divisions_data_list->name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="present_home_district" class="present_district">
                                                                <option >--Select--</option>
                                                            </select>
                                                        </td>

                                                        <td>

                                                            <select name="present_upazilas" class="present_upazilas">
                                                                <option >--Select--</option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="present_unions" class="present_unions">
                                                                <option >--Select--</option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <input class="table_text present_village_name" id="required" placeholder="Address" title="address" name="present_village_name" type="text" value="">

                                                        </td>
                                                        <td>
                                                            <input class="table_text present_post_office" id="required" placeholder="Post Office Code" title="post_office_code" name="present_post_office" type="text" value="">
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
                                                        <td>{{Form::text('present_post_office','',['class'=>'form-control present_post_office', 'id'=>'required','class'=>'table_text','placeholder'=>'Post Office','title'=>'post_office'])}}</td>
                                                        <td>{{Form::text('present_home_district','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Home District','title'=>'home_district','class'=>'table_text'])}}</td>
                                                        <td>{{Form::text('present_division','',['class'=>'form-control', 'id'=>'required','placeholder'=>'Division','title'=>'division','class'=>'table_text'])}}</td>
                                                        <td>{{Form::text('present_village_name','',['class'=>'form-control present_village_name', 'id'=>'required','placeholder'=>'Village Name','title'=>'village_name','class'=>'table_text'])}}</td>
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
                                            <p class="inner_heading"> 
                                                <input type="button" class="add_education_history" value="ADD Educational Qualifications">
                                            </p>

                                            <div class="controls input_fields_wrap">
                                                <table class="table address">
                                                    <thead>
                                                    <tr>
                                                        <th>Exam Name</th>
                                                        <th>Board/University</th>
                                                        <th class="others_university" hidden="hidden">University Name</th>
                                                        <th>Group</th>
                                                        <th>Passing Year</th>
                                                        <th>Reg No</th>
                                                        <th>Roll No</th>
                                                        <th>Division/GPA</th>
                                                        <th>Attachment(Marksheet)</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody class="educational_tbody" id="educational_tbody">
                                                    <tr class="educational_tr">
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

                                                            <select name="borad[]" class="form-control borads">
                                                                <option >--Select--</option>
                                                                @foreach($board_name_data as $board_name_data_list)
                                                                    <option value="{{$board_name_data_list->name}}">{{$board_name_data_list->name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </td>
                                                        <td class="others_university" hidden='hidden'>{{Form::text('university_name[]','',['class'=>'form-control university_name', 'id'=>'required','placeholder'=>'University Name','title'=>'University Name','style'=>'width: 100%'])}}</td>
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

                                                                        {{Form::file('marksheet[]',['onchange'=>'readURL(this)'])}}

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
                                                            <div class="controls">
                                                                <button id="delete_tr" class="btn-danger" type="button"><i class="fas fa-minus"></i></button>
                                                            
                                                            </div>
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
                                    <p class="inner_heading"> 
                                        <input type="button" class="add_program" value="ADD Choose">
                                    </p>
                                    <div class="add_programmain_div" id="add_programDiv">
                                        <div class="add_programDiv">
                                            <div class="col-lg-12">
                                                <div class="col-lg-2">
                                                    <div class="control-group">
                                                        {{Form::label('Faculty','Faculty',['class'=>'control-label','title'=>'Faculty'])}}
                                                        <div class="controls">
                                                            @php $medium_array=[''=>'--select--'] @endphp
                                                            @foreach($medium as $medium_list)
                                                                @php $medium_array[$medium_list->id]=$medium_list->type_name @endphp
                                                            @endforeach

                                                            <select name="medium[]" class="medium" id="medium">
                                                                <option >--Select--</option>
                                                                @foreach($medium as $medium_list)
                                                                    <option value="{{$medium_list->id}}">{{$medium_list->type_name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="control-group">
                                                        {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}

                                                        <div class="controls">
                                                            <select name="department[]" class="department">
                                                                <option >--Select--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="control-group">
                                                        {{Form::label('program','Program',['class'=>'control-label','title'=>'program'])}}
                                                        <div class="controls">
                                                            <select name="class[]" class="manage_class">
                                                                <option >--Select--</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="control-group">
                                                        {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}

                                                        <div class="controls">
                                                            @php $section_data_list_array=[''=>'--select--'] @endphp
                                                            @foreach($section_data as $section_data_list)
                                                                @php $section_data_list_array[$section_data_list->section_name]=$section_data_list->section_name @endphp
                                                            @endforeach

                                                            <select name="section[]" class="section">
                                                                <option >--Select--</option>
                                                            </select>
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

                                                            {{Form::select('shift[]',$shift_list_array)}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="control-group">
                                                        {{Form::label('Delete Choose','Delete Choose',['class'=>'control-label','title'=>'Choose Delete'])}}
                                                        <div class="controls">
                                                            <button id="delete_divChose" class="btn-danger" type="button"><i class="fas fa-minus"></i></button>
                                                            
                                                        </div>
                                                    </div>
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
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                           <div class="row">
                                               <div class="col-lg-6">
                                                   <div class="control-group">
                                                       <label for="mother_name" title="mother_name">Mother Name</label>
                                                       <div class="controls">
                                                           <input class="form-control" id="required" placeholder="Mother Name" title="mother_name" name="mother_name" type="text" v-model="formData.mother_name">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-lg-6">
                                                   <div class="control-group">
                                                       <label for="marital" title="marital">Marital Status</label>
                                                       <div class="controls">
                                                           <select name="maritial" v-model="formData.maritial">
                                                               <option selected="selected">--select--</option>
                                                               <option value="Married (and not separated)">Married (and not separated)</option>
                                                           </select>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="spouse_name" title="spouse_name">Spouse Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Spouse Name" title="spouse_name" name="spouse_name" type="text" v-model="formData.spouse_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="nationality" title="nationality">Nationality</label>
                                                        <div class="controls">
                                                            <select id="nationality" name="nationality" v-model="formData.nationality">
                                                                <option selected="selected">--select--</option>
                                                                <option value="Afghanistan">Afghanistan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="blood_group" title="blood_group">Blood Group</label>
                                                        <div class="controls">
                                                            <select id="blood_group" name="blood_group" v-model="formData.blood_group">
                                                                <option selected="selected">--select--</option>
                                                                <option value="O+ve">O+ve</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="gender" title="gender">Gender</label>
                                                        <div class="controls">
                                                            <select id="gender" name="gender" v-model="formData.gender">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="religion" title="Religion">Religion</label>
                                                    <div class="controls">
                                                        <select id="religion" name="religion" v-model="formData.religion">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Christianity">Christianity</option>
                                                            <option value="Buddhism">Buddhism</option>
                                                            <option value="Hinduism">Hinduism</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    <label for="NID_/_Birth_ID" title="N./Birth ID">NID/Birth Registration No</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="NID/Birth Registration No" title="N./Birth ID" name="nid_birth" type="text" v-model="formData.nid_birth">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    <label for="phone" title="Contact ( Self )">Contact ( Self )</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Contact ( Self )" title="Contact ( Self )" name="phone" type="text" v-model="formData.phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    <label for="phone" title="Contact ( Family  )">Contact ( Family  )</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Contact ( Family  )" title="Contact ( Family  )" name="phone_family" type="text" v-model="formData.phone_family">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-lg-6">
                                                <div class="control-group">
                                                    <label for="email" title="email">Email</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Email" title="email" name="email" type="email" v-model="formData.email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Date Of Application</label>
                                            <input class="form-control" type="date" name="date" v-model="formData.date">
                                        </div>
                                        <div class="applicant_student_block_heading">Address</div>
                                        <div class="col-lg-12">
                                            <label><strong>Permanent Address</strong></label>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Division</label>
                                                    <select name="division" v-model="formData.division">
                                                        <option>--select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>District</label>
                                                    <select name="home_district" v-model="formData.home_district">
                                                        <option>--select--</option>
                                                        <option value="Comilla">Comilla</option>
                                                        <option value="Feni">Feni</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Upazilla</label>
                                                    <select name="upazilas" v-model="formData.upazilas">
                                                        <option>--select--</option>
                                                        <option value="Debidwar">Debidwar</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Union</label>
                                                    <select name="union" v-model="formData.union">
                                                        <option>--select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Village/House No</label>
                                                    <input id="required" placeholder="Address" title="address" name="village_name" type="text" class="table_text" v-model="formData.village_name">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Village/House No</label>
                                                    <input id="required" placeholder="Post Office Code" title="post_office_code" name="post_office" type="text" class="table_text" v-model="formData.post_office">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 form-group">
                                            <input type="checkbox"> Same as Permanent Address
                                        </div>
                                        <div class="col-lg-12 text-left">
                                            <label><strong>Present Address</strong></label>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Division</label>
                                                    <select name="present_division" v-model="formData.present_division">
                                                        <option>--select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>District</label>
                                                    <select name="present_home_district" v-model="formData.present_home_district">
                                                        <option>--select--</option>
                                                        <option value="Comilla">Comilla</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Upazilla</label>
                                                    <select name="present_upazilas" v-model="formData.present_upazilas">
                                                        <option>--select--</option>
                                                        <option value="Debidwar">Debidwar</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Union</label>
                                                    <select name="present_unions" v-model="formData.present_unions">
                                                        <option>--select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Post Office</label>
                                                    <input id="required" placeholder="Address" title="address" name="present_post_office" type="text" class="table_text" v-model="formData.present_post_office">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Village/House No</label>
                                                    <input id="required" placeholder="Post Office Code" title="post_office_code" name="present_village_name" type="text" class="table_text" v-model="formData.present_village_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Educational History</div>
                                    <div class="applicant_student_block educational_history">
                                        <div class="col-lg-12">
                                            <div v-for="(education, index) in formData.educations" class="row">
                                                <div class="col-md-12">
                                                    <hr v-if="index > 0">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Exam Name</label>
                                                            <select name="exam_name" v-model="education.exam_name">
                                                                <option>--select--</option>
                                                                <option value="SSC/Dakhil/Equivalent">SSC/Dakhil/Equivalent</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Board/University</label>
                                                            <select name="borad" v-model="education.borad">
                                                                <option>--select--</option>
                                                                <option value="Dhaka">Dhaka</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Group</label>
                                                            <select name="group" v-model="education.group">
                                                                <option>--select--</option>
                                                                <option value="Science">Science</option>
                                                                <option value="Commerce">Commerce</option>
                                                                <option value="Arts">Arts</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Passing Year</label>
                                                            <select name="passing_year" v-model="education.passing_year">
                                                                <option>--select--</option>
                                                                <option value="2010">2010</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>University Name</label>
                                                            <input class="table_text" id="required" placeholder="University Name" title="University Name" style="width: 100%" name="university_name" type="text" v-model="education.university_name">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Reg No</label><input class="table_text" id="required" placeholder="Reg No" title="Reg No" style="width: 100%" name="reg_no" type="text" v-model="education.reg_no">

                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Roll No</label>
                                                            <input class="table_text" id="required" placeholder="Roll No" title="roll_no" style="width: 100%" name="roll_no" type="text" v-model="education.roll_no">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Division/GPA</label>
                                                            <input class="table_text" id="required" placeholder="Division/GPA" title="Division/GPA" style="width: 100%" name="gpa" type="text" v-model="education.gpa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="margin-top: 4%;">
                                                    <label>Attachment(Marksheet)</label>
                                                    <div class="control-group">
                                                        <input @change="openFile(education.marksheet)" name="marksheet" type="file" id="marksheet">
                                                    </div>
                                                    <div class="control-group">
                                                        <label for="" title=""></label>
                                                        <input alt="Your Image" class="img-responsive img-circle blank_applicant_student_image" id="blah" style="width:19%" :src="showImage(education.marksheet)" type="image">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 text-center" style="margin-top: 4%;">
                                                    <label></label>
                                                    <a @click="AddRow(formData.educations, Education)" class="btn btn-success" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a v-if="formData.educations.length > 1" @click="removeRow(formData.educations, index)" class="btn btn-danger" type="button">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Quota</div>
                                    <div class="applicant_student_block">
                                        <div class="col-lg-12">
                                            <div class="control-group">
                                                <label for="quota" title="Quota">Quota</label>
                                                <div class="controls">
                                                    <select id="quota" name="quota" v-model="formData.quota">
                                                        <option selected="selected">--select--</option>
                                                        <option value="Meritorious (Science: Golder-5, Commerce/Arts: 5, Diploma (SSC:5 &amp; Diploma: 3.80))">Meritorious (Science: Golder-5, Commerce/Arts: 5, Diploma (SSC:5 &amp; Diploma: 3.80))</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Apply Programs</div>
                                    <div class="applicant_student_block academic_information">
                                        <div v-for="(choose, index) in formData.faculty_choose">
                                            <div class="col-md-12">
                                                <p class="inner_heading">Choose :  @{{index+1 }}</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <label for="Faculty" title="Faculty">Faculty</label>
                                                    <div class="controls">
                                                        <select name="medium" v-model="choose.medium">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Humanities and Social Science">Humanities and Social Science</option>
                                                            <option value="Business Studies">Business Studies</option>
                                                            <option value="Engineering &amp; Technology">Engineering &amp; Technology</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <label for="Department" title="class">Department</label>
                                                    <div class="controls">
                                                        <select id="Manage_department" name="department" v-model="choose.department">
                                                            <option value="Please Frist Fill Program">Please Frist Fill Program</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <label for="program" title="program">Program</label>
                                                    <div class="controls">
                                                        <select class="manage_class" id="manage_class" name="class" v-model="choose.class">
                                                            <option selected="selected">--select--</option>
                                                            <option value="First Semester">First Semester</option>
                                                            <option value="Second Semester">Second Semester</option>
                                                            <option value="Third Semester">Third Semester</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <label for="Section" title="class">Section</label>
                                                    <div class="controls">
                                                        <select id="student_section" name="section" v-model="choose.section">
                                                            <option value="Please Frist Fill Program">Please Frist Fill Program</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="">
                                                    <label for="Shift" title="batcg">Shift</label>
                                                    <div class="controls">
                                                        <select name="shift" v-model="choose.shift">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Morning">Morning</option>
                                                            <option value="Evening">Evening</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center" style="margin-top: 20px;">
                                                <label></label>
                                                <a @click="AddRow(formData.faculty_choose, FacultyChoose)" class="btn btn-success" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a v-if="formData.faculty_choose.length > 1" @click="removeRow(formData.faculty_choose, index)" class="btn btn-danger" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Completed Credit</div>
                                    <div class="applicant_student_block">
                                        <div class="completed_credit">
                                            <div class="col-md-12">
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="credit_transfer" title="credit_transfer">Credit Transfer</label>
                                                        <div class="controls">
                                                            <select id="credit_transfer" name="credit_transfer">
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="credit_name_of_university" title="Name of University">Name of University</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Name of University" title="Name of University" name="credit_name_of_university" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="credit_completed_semester" title="Completed Semester">Completed Semester</label>
                                                        <div class="controls">
                                                            <div class="controls">
                                                                <select name="semester">
                                                                    <option selected="selected">--select--</option>
                                                                    <option value="First">First</option>
                                                                    <option value="Second">Second</option>
                                                                    <option value="Third">Third</option>
                                                                    <option value="Fourth">Fourth</option>
                                                                    <option value="Fifth">Fifth</option>
                                                                    <option value="Sixth">Sixth</option>
                                                                    <option value="Seventh">Seventh</option>
                                                                    <option value="Eightth">Eightth</option>
                                                                    <option value="Nineth">Nineth</option>
                                                                    <option value="Tenth">Tenth</option>
                                                                    <option value="Eleventh">Eleventh</option>
                                                                    <option value="Twelve">Twelve</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="Credit" title="Credit">Credit</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Credit" title="Credit" name="credit" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="CGPA" title="CGPA">CGPA</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="CGPA" title="CGPA" name="cgpa" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="date_application" title="Date Of Application">Date Of Application</label>
                                                        <div class="controls">
                                                            <div data-date="12-02-2012" class="input-append date datepicker">
                                                                <input data-date-format="mm-dd-yyyy" style="width:85%" class="form-control" name="date_application" type="date" id="date_application">
                                                                <span class="add-on"><i class="icon-th"></i></span>
                                                                <!-- <input type="date">  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="control-group">
                                                        <label for="admission_status" title="admission_status">Admission Status</label>
                                                        <div class="controls">
                                                            <select id="admission_status" name="admission_status">
                                                                <option value="Active">Active</option>
                                                                <option value="Cancelled">Cancelled</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="applicant_student_block_heading">Dependent Information</div>
                                    <div class="applicant_student_block reference">
                                        <div class="">
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_relation" title="Relation">Relation</label>
                                                    <div class="controls">
                                                        <select id="dependent_relation" name="dependent_relation">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Mother">Mother</option>
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Uncle">Uncle</option>
                                                            <option value="Aunt">Aunt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="reference_name" title="Profession">Profession</label>
                                                    <div class="controls">
                                                        <select name="dependent_profession">
                                                            <option selected="selected">--select--</option>
                                                            <option value="Business">Business</option>
                                                            <option value="SME">SME</option>
                                                            <option value="Housewife">Housewife</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_mobile_no" title="Mobile No">Mobile No</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Mobile No" title="Mobile No" name="dependent_mobile_no" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_monthly_income" title="Monthly Income">Monthly Income</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Monthly Income" title="Monthly Income" name="dependent_monthly_income" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_no_of_brothers" title="No of Brothers">No of Brothers</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="No of Brothers" title="No of Brothers" name="dependent_no_of_brothers" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_no_of_sisters" title="No of Sisters">No of Sisters</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="No of Sisters" title="No of Sisters" name="dependent_no_of_sisters" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_no_of_edu_brothers" title="No of Education Running Brothers">No of Education Running Brothers</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="No of Education Running Brothers" title="No of Education Running Brothers" name="dependent_no_of_edu_brothers" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="control-group">
                                                    <label for="dependent_no_of_edu_sisters" title="No of Education Running Sisters">No of Education Running Sisters</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="No of Education Running Sisters" title="No of Education Running Sisters" name="dependent_no_of_edu_sisters" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div style="width: 101px;">
                                                    <div class="control-group">
                                                        <label for="dependent_nid" title="Marksheet">NID</label>
                                                        <div class="controls">
                                                            <input onchange="readURL(this)" name="dependent_nid" type="file" id="dependent_nid">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label for="" title=""></label>
                                                        <div class="controls">
                                                            <input alt="NID" class="img-responsive img-circle blank_applicant_student_image" id="blah" style="width:19%" src="http://software.zhsust.edu.bd/img/blankavatar.png" name="Profile_image" type="image">
                                                        </div>
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
                                                        <label for="reference_name" title="Reference Name">Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Name" title="Reference Name" name="reference_name" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_designation" title="Designation">Designation</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Designation" title="Designation" name="reference_designation" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_institute_name" title="Institute Name">Institute Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Institute Name" title="Institute Name" name="reference_institute_name" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_id_no" title="ID No">ID No</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="ID No" title="ID No" name="reference_id_no" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_mobile_no" title="Mobile No">Mobile No</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Mobile No" title="Mobile No" name="reference_mobile_no" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="inner_heading">Reference 2</p>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_name1" title="Reference Name">Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Name" title="Reference Name" name="reference_name1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_designation1" title="Designation">Designation</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Designation" title="Designation" name="reference_designation1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_institute_name1" title="Institute Name">Institute Name</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Institute Name" title="Institute Name" name="reference_institute_name1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_id_no1" title="ID No">ID No</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="ID No" title="ID No" name="reference_id_no1" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="control-group">
                                                        <label for="reference_mobile_no1" title="Mobile No">Mobile No</label>
                                                        <div class="controls">
                                                            <input class="form-control" id="required" placeholder="Mobile No" title="Mobile No" name="reference_mobile_no1" type="text">
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
<<<<<<< HEAD
                                                    <h3>Bkash Payment: Please pay 255 BDT at the +880154785468745</h3>
=======
                                                    {{Form::label('photo','Photo',['class'=>'control-label','title'=>'photo'])}}
                                                    <div class="controls">

                                                        {{Form::file('attached_photo',['onchange'=>'readURL(this)'])}}

                                                    </div>
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    <label for="payment_transaction_id" title="Transaction ID">Transaction ID</label>
                                                    <div class="controls">
                                                        <input class="form-control" id="required" placeholder="Transaction ID" title="Transaction ID" name="payment_transaction_id" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="control-group">
                                                    <label for="payment_mobile_no" title="Applicant Mobile Number">Applicant Mobile Number</label>
                                                    <div class="controls">
<<<<<<< HEAD
                                                        <input class="form-control" id="required" placeholder="Applicant Mobile Number" title="Applicant Mobile Number" name="payment_mobile_no" type="text">
=======

                                                        {{Form::file('attached_signature',['onchange'=>'readURL(this)'])}}

>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
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
                                                        <label for="photo" title="photo">Photo</label>
                                                        <div class="controls">
                                                            <input onchange="readURL(this)" name="image" type="file">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label for="" title=""></label>
                                                        <div class="controls">
                                                            <input alt="Your Image" class="img-responsive img-circle blank_applicant_student_image" id="blah" style="width:19%" src="http://software.zhsust.edu.bd/img/blankavatar.png" name="Profile_image" type="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="control-group">
                                                        <label for="image" title="Signature">Signature</label>
                                                        <div class="controls">
                                                            <input onchange="readURL(this)" name="image" type="file" id="image">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label for="" title=""></label>
                                                        <div class="controls">
                                                            <input alt="Your Signature" class="img-responsive img-circle blank_applicant_student_image" id="blah" style="width:19%" src="http://software.zhsust.edu.bd/img/blankavatar.png" name="Profile_image" type="image">
                                                        </div>
                                                    </div>
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
                                                <li>Testimonials from the Heads of Institutions from where the candidate has passed S.S.C &amp; H.S.C/Equivalent Examinations</li>
                                                <li>Citizendhip certificate from any Gazetted Officer in respect of
                                                    your character.
                                                </li>
                                                <li>3 (Three) Copies of recent passport size photographs duly attested.</li>
                                                <li>Attested copies of mark sheets/Candidates of S.S.C &amp; H.S.C/Equivalent Examination.</li>
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
                                                    University that will unterfere with the discipline and the other of Ordinances of University Grant Commission relating Course, Syllabus and Examination at present on force or that may hereafter be made to this effect.
                                                </li>
                                                <li>I shall be liable to tbe expelled from the University if any of the above information each found to be false or fabricated, all fees and
                                                    other dues paid by me to the University up to that time shall be forefeited. I and my father/legal guardian would also be liable to any
                                                    further departmental or legal action that the authorities may deem necessary.
                                                </li>
                                                <li>
                                                    I further solemnly declare that there is no personal, domestic or financial circumnstances which may prevent me from continuing my studies in this University until the completion of the entire course of studies.
                                                </li>
                                                <li>I further declare that i shall not do any activities subversive to the discipline of the institution and/or of the State (Such as Strike, Hartal &amp; Boycott etc.)</li>
                                                <li>I hereby certify that the above statement of Particulars are tru and correct.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="checkbox">I Agree to the above Terms and Conditions.
                                    </div>
<<<<<<< HEAD
                                    <p>&nbsp;</p>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
=======
                                </div>
                                <div class="col-lg-12">
                                    <input type="checkbox">I Agree to the above Terms and Conditions.
                                </div>
                                <p>&nbsp;</p>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- {{Form::close()}} -->
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
@stop
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('js/vue/vue.js')}}"></script>
    <script src="{{asset('js/vue/vee-validate.js')}}"></script>
    <script src="{{asset('js/vue/v-tooltip.min.js')}}"></script>
    <script src="{{asset('js/vue/axios.min.js') }}"></script>
    <script>
        Vue.use(VeeValidate);
        Vue.use(VTooltip);
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                app_url: '{{url('/')}}',
                formData : {
                    degree_name : '',
                    session_choose : '',
                    session : '',
                    student_name : '',
                    father_name : '',
                    mother_name : '',
                    maritial : '',
                    spouse_name : '',
                    nationality : '',
                    blood_group : '',
                    gender : '',
                    religion : '',
                    nid_birth : '',
                    phone : '',
                    phone_family : '',
                    email : '',
                    date : '',
                    division : '',
                    home_district : '',
                    upazilas : '',
                    union : '',
                    village_name : '',
                    post_office : '',
                    present_division : '',
                    present_home_district : '',
                    present_upazilas : '',
                    present_unions : '',
                    present_post_office : '',
                    present_village_name : '',
                    educations : [],
                    faculty_choose : [],
                },
                Education : {
                    exam_name : '',
                    borad : '',
                    reg_no : '',
                    roll_no : '',
                    group : '',
                    passing_year : '',
                    gpa : '',
                    university_name : '',
                },
                FacultyChoose : {
                    medium : '',
                    department : '',
                    class : '',
                    section : '',
                    shift : '',
                }

            },
            watch: {
                'detailsData.member_data': {
                    deep: true,
                    handler() {
                        this.calculateAllInfo();
                    }
                }
            },
            methods: {
                showImage : function(){

                },
                loadProcessEditData: function () {
                    const _this = this;
                    software_disabled_check();
                    _this.isDataLoaded = false;
                    axios.get(_this.app_url + '/auto_process_new/' + _this.urlParam('samity_code') + '/edit')
                        .then(function (response) {
                            _this.isDataLoaded = true;
                            software_disabled_uncheck();
                            _this.detailsData = response.data.data;
                            this.isLoaded = true;
                        }).catch(function (error) {
                        console.log(error);
                    })
                },
                AddRow : function (object, array) {
                    const _this = this;
                    object.push(array);
                },
                removeRow : function (object, index) {
                    const _this = this;
                    object.splice(index, 1)
                }
            },
            mounted() {
                const _this = this;
                _this.formData.educations.push(_this.Education);
                _this.formData.faculty_choose.push(_this.FacultyChoose);

            }
        });
    </script>
@endsection
=======

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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

                                $(".p_district").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_district").append('<option selected>----No Data Found----</option>');
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

                                $(".p_upazilas").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_upazilas").append('<option selected>----No Data Found----</option>');
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

                                $(".p_unions").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_unions").append('<option selected>----No Data Found----</option>');
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
                            $(".p_department").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".p_district").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_district").append('<option selected>----No Data Found----</option>');
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

                                $(".p_upazilas").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_upazilas").append('<option selected>----No Data Found----</option>');
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

                                $(".p_unions").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".p_unions").append('<option selected>----No Data Found----</option>');
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
                            $(".present_district").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_district").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_district").append('<option selected>----No Data Found----</option>');
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
                            $(".present_upazilas").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_upazilas").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_upazilas").append('<option selected>----No Data Found----</option>');
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
                            $(".present_unions").append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {

                                $(".present_unions").append('<option value=' + data[i].id + ' >' + data[i].name + '</option>');
                            }
                        } else {
                            $(".present_unions").append('<option selected>----No Data Found----</option>');
                        }
                    }
                });
            }); 
            //present address script
            var present_divisionhtml = $(".present_divisions").html();
            
            //as same permanent address
            $('.check_permanent_addrs').click(function() {
                if($(this).prop("checked") == true){
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
                    $(".present_divisions").html('<option value=' + p_divisions_val + ' >' + p_divisions_text + '</option>');
                    $(".present_district").html('<option value=' + p_district_val + ' >' + p_district_text + '</option>');
                    $(".present_upazilas").html('<option value=' + p_upazilas_val + ' >' + p_upazilas_text + '</option>');
                    $(".present_unions").html('<option value=' + p_upazilas_val + ' >' + p_upazilas_text + '</option>');
                    $(".present_village_name").val(village_name);
                    $(".present_post_office").val(post_office);
                }else{                                      
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
                            row.find('.department').append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.department').append('<option value=' + data[i].id + ' >' + data[i].department_name + '</option>');
                            }
                        } else {
                            row.find('.department').append('<option selected>----No Data Found----</option>');
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
                            row.find('.manage_class').append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.manage_class').append('<option value=' + data[i].id + ' >' + data[i].class_name + '</option>');
                            }
                        } else {
                            row.find('.manage_class').append('<option selected>----No Data Found----</option>');
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
                            row.find('.section').append('<option selected>----select----</option>');
                            for (var i = 0; i < data.length; i++) {
                                row.find('.section').append('<option value=' + data[i].id + ' >' + data[i].section_name + '</option>');
                            }
                        } else {
                            row.find('.section').append('<option selected>----No Data Found----</option>');
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
                if(name == 'Others'){
                    $(".others_university").show();
                }else{
                    $(".others_university").hide();
                    $(".university_name").val('');
                }
            }); 
        }); 
    </script>

    @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/applicant_student.js')}}"></script>
<!--         <script type="text/javascript">
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
        </script> -->

    @endpush
@stop
>>>>>>> 6d5a3b4c954e5a161cbf462b5e70abdd351bdd84
