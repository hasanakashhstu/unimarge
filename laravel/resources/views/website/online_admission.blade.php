 @section('online_apply_css')
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
 @endsection

 @extends('website.index')
 @section('website_main_section')
     <div class="page-title-area bg-overlay text-center">
         <div class="container">
             <div class="breadcrumb-inner">
                 <h2 class="page-title">Online Addmission</h2>
             </div>
         </div>
     </div>
     <div class="container pd-top-50 pd-bottom-50">
         <div class="row">
             <div class="content" style="border: 3px solid #eee;padding: 10px;box-shadow: 4px 3px 15px 0px #d0d0d0;border-radius: 5px;">
                 {{-- <div class="panel-heading">Online Admission</div> --}}
                 {{-- <div class="panel-body">
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
                                @foreach ($session as $value)
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
                                @foreach ($department as $value)
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
                                @foreach ($shift as $value)
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
        </div> --}}

                 <div class="content-body">
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
                                     <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}
                                     </li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                     <div class="widget-box online_admission">
                         <div class="widget-content">
                             {{ Form::open(['url' => '/frontend/online-admission', 'files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'method' => 'post']) }}

                             <div class="p-3 mb-2 bg-primary text-white rounded">Semester & Degree</div>
                             <div class="applicant_student_block">
                                 <div class="row">
                                     <div class="col-lg-4">
                                         <div class="control-group">
                                             {{ Form::label('degree_name', 'Degree Name', ['class' => 'control-label', 'title' => 'degree_name']) }}
                                             <div class="form-control">
                                                 @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                                 @foreach ($degree_name_data as $degree_name_data_list)
                                                     @php $degree_name_data_list_array[$degree_name_data_list->name]=$degree_name_data_list->name @endphp
                                                 @endforeach

                                                 {{ Form::select('degree_name', $degree_name_data_list_array) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-4">
                                         {{ Form::label('session_choose', 'Semester Name', ['class' => 'control-label', 'title' => 'Session Name']) }}
                                         <div class="form-control">
                                             @php $session_choose_data_list_array=[''=>'--select--'] @endphp
                                             @foreach ($session_choose_data as $session_choose_data_list)
                                                 @php $session_choose_data_list_array[$session_choose_data_list->name]=$session_choose_data_list->name @endphp
                                             @endforeach

                                             {{ Form::select('session_choose', $session_choose_data_list_array) }}
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="control-group">
                                             <div class="control-group">
                                                 {{ Form::label('session', 'Semester Year', ['class' => 'control-label', 'title' => 'Session Choose']) }}

                                                 <select class="form-control" id="session" name="session">
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
                             <div class="p-3 mb-2 bg-primary text-white rounded">Basic Information</div>
                             <div class="applicant_student_block basic_information_block">

                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('student_name', 'Student Name', ['class' => 'control-label', 'title' => 'student_name']) }}
                                             <div class="form-control">
                                                 {{ Form::text('student_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Student Name', 'title' => 'student_name']) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('father_name', 'Father Name', ['class' => 'control-label', 'title' => 'father_name']) }}
                                             <div class="form-control">

                                                 {{ Form::text('father_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Father Name', 'title' => 'father_name']) }}
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('mother_name', 'Mother Name', ['class' => 'control-label', 'title' => 'mother_name']) }}
                                             <div class="form-control">

                                                 {{ Form::text('mother_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Mother Name', 'title' => 'mother_name']) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('marital', 'Marital Status', ['class' => 'control-label', 'title' => 'marital']) }}
                                             <div class="form-control">
                                                 @php $maritial_data_list_array=[''=>'--select--'] @endphp
                                                 @foreach ($maritial_data as $maritial_data_list)
                                                     @php $maritial_data_list_array[$maritial_data_list->name]=$maritial_data_list->name @endphp
                                                 @endforeach

                                                 {{ Form::select('maritial', $maritial_data_list_array) }}
                                             </div>
                                         </div>
                                     </div>

                                 </div>


                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('spouse_name', 'Spouse Name', ['class' => 'control-label', 'title' => 'spouse_name']) }}
                                             <div class="form-control">

                                                 {{ Form::text('spouse_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Spouse Name', 'title' => 'spouse_name']) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('nationality', 'Nationality', ['class' => 'control-label', 'title' => 'nationality']) }}
                                             <div class="form-control">
                                                 @php $nationality_data_list_array=[''=>'--select--'] @endphp
                                                 @foreach ($nationality_data as $nationality_data_list)
                                                     @php $nationality_data_list_array[$nationality_data_list->name]=$nationality_data_list->name @endphp
                                                 @endforeach

                                                 {{ Form::select('nationality', $nationality_data_list_array) }}
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('blood_group', 'Blood Group', ['class' => 'control-label', 'title' => 'blood_group']) }}
                                             <div class="form-control">
                                                 @php $blood_group_data_list_array=[''=>'--select--'] @endphp
                                                 @foreach ($blood_group_data as $blood_group_data_list)
                                                     @php $blood_group_data_list_array[$blood_group_data_list->name]=$blood_group_data_list->name @endphp
                                                 @endforeach
                                                 {{ Form::select('blood_group', $blood_group_data_list_array) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('gender', 'Gender', ['class' => 'control-label', 'title' => 'gender']) }}
                                             <div class="form-control">
                                                 {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others']) }}
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         {{ Form::label('religion', 'Religion', ['class' => 'control-label', 'title' => 'Religion']) }}
                                         <div class="form-control">
                                             @php $religion_data_list_array=[''=>'--select--'] @endphp
                                             @foreach ($religion_data as $religion_data_list)
                                                 @php $religion_data_list_array[$religion_data_list->name]=$religion_data_list->name @endphp
                                             @endforeach

                                             {{ Form::select('religion', $religion_data_list_array) }}
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('NID_/_Birth_ID', 'NID/Birth Registration No.', ['class' => 'control-label', 'title' => 'NID/Birth Registration No.']) }}
                                             <div class="form-control">

                                                 {{ Form::text('nid_birth', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'NID/Birth Registration No.', 'title' => 'NID/Birth Registration No.']) }}
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('phone', 'Contact ( Self )', ['class' => 'control-label', 'title' => 'Contact ( Self )']) }}
                                             <div class="form-control">
                                                 {{ Form::text('phone', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Contact ( Self )', 'title' => 'Contact ( Self )']) }}
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('phone', 'Contact ( Family  )', ['class' => 'control-label', 'title' => 'Contact ( Family  )']) }}
                                             <div class="form-control">
                                                 {{ Form::text('phone_family', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Contact ( Family  )', 'title' => 'Contact ( Family  )']) }}
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('email', 'Email', ['class' => 'control-label', 'title' => 'email']) }}
                                             <div class="form-control">
                                                 {{ Form::email('email', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Email', 'title' => 'email']) }}
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-6">
                                         <div class="control-group">
                                             {{ Form::label('birth_date', 'Date Of Birth(mm/dd)', ['class' => 'control-label', 'title' => 'birth_date']) }}
                                             <div class="form-control">
                                                 <div data-date="12-02-2012" class="input-append date datepicker">
                                                     {{ Form::date('birth_date', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}

                                                     <span class="add-on"><i class="icon-th"></i></span>
                                                     <!-- <input type="date">  -->
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-12">
                                         <div class="control-group">
                                             {{ Form::label('address', 'Permanent Address', ['class' => 'control-label', 'title' => 'address']) }}
                                             <div class="form-control">
                                                 <table class="table address p_address_tables">
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
                                                                 <select name="division" class="p_divisions">
                                                                     <option>--Select--</option>
                                                                     @foreach ($divisions_data as $divisions_data_list)
                                                                         <option value="{{ $divisions_data_list->id }}">
                                                                             {{ $divisions_data_list->name }}
                                                                         </option>
                                                                     @endforeach
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <select name="home_district" class="p_district">
                                                                     <option>--Select--</option>
                                                                 </select>
                                                             </td>

                                                             <td>

                                                                 <select name="upazilas" class="p_upazilas">
                                                                     <option>--Select--</option>
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <select name="unions" class="p_unions">
                                                                     <option>--Select--</option>
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <input class="form-control village_name" id="required"
                                                                     placeholder="Village/House No."
                                                                     title="Village/House No." name="village_name"
                                                                     type="text" value="">

                                                             </td>
                                                             <td>
                                                                 <input class="form-control post_office" id="required"
                                                                     placeholder="Post Office Code No."
                                                                     title="Post Office Code No." name="village_name"
                                                                     type="text" value="">

                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-12">
                                         <input type="checkbox" class="check_permanent_addrs"> Same as Permanent
                                         Address
                                     </div>
                                     <div class="col-lg-12">
                                         <div class="control-group">
                                             {{ Form::label('address', 'Present Address', ['class' => 'control-label', 'title' => 'address']) }}
                                             <div class="form-control present_mainDiv">
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
                                                                 <select name="present_division" class="present_divisions">
                                                                     <option>--Select--</option>
                                                                     @foreach ($divisions_data as $divisions_data_list)
                                                                         <option value="{{ $divisions_data_list->id }}">
                                                                             {{ $divisions_data_list->name }}
                                                                         </option>
                                                                     @endforeach
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <select name="present_home_district"
                                                                     class="present_district">
                                                                     <option>--Select--</option>
                                                                 </select>
                                                             </td>

                                                             <td>

                                                                 <select name="present_upazilas" class="present_upazilas">
                                                                     <option>--Select--</option>
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <select name="present_unions" class="present_unions">
                                                                     <option>--Select--</option>
                                                                 </select>

                                                             </td>
                                                             <td>
                                                                 <input class="table_text present_village_name"
                                                                     id="required" placeholder="Village/House No."
                                                                     title="Village/House No." name="present_village_name"
                                                                     type="text" value="">

                                                             </td>
                                                             <td>
                                                                 <input class="table_text present_post_office"
                                                                     id="required" placeholder="Post Office Code No."
                                                                     title="Post Office Code No." name="present_post_office"
                                                                     type="text" value="">
                                                             </td>
                                                         </tr>

                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>


                                     {{-- <div class="col-lg-12">
                                <div class="control-group">
                                    {{Form::label('address','Present Address',['class'=>'control-label','title'=>'address'])}}
                                    <div class="form-control">
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
                            </div> --}}

                                 </div>
                             </div>

                             <div class="p-3 mb-2 bg-primary text-white rounded">Educational History/Qualifications</div>
                             <div class="row pd-10">
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
                                                         <th>Exam Name</th>
                                                         <th>Board/University</th>
                                                         <th class="others_university" hidden="hidden">University
                                                             Name
                                                         </th>
                                                         <th>Group</th>
                                                         <th>Passing Year</th>
                                                         <th>Reg No.</th>
                                                         <th>Roll No.</th>
                                                         <th>Division/GPA</th>
                                                         <th>Attachment(Marksheet)</th>
                                                         <th></th>
                                                     </tr>
                                                 </thead>

                                                 <tbody class="educational_tbody" id="educational_tbody">
                                                     <tr class="educational_tr">
                                                         <td>
                                                             @php $exam_name_data_list_array=[''=>'--select--'] @endphp
                                                             @foreach ($exam_name_data as $exam_name_data_list)
                                                                 @php $exam_name_data_list_array[$exam_name_data_list->name]=$exam_name_data_list->name @endphp
                                                             @endforeach

                                                             {{ Form::select('exam_name[]', $exam_name_data_list_array, ['class' => 'form-control', 'id' => 'required', 'class' => 'table_text', 'placeholder' => 'Exam Name', 'title' => 'exam_name', 'style' => 'width: 100%']) }}
                                                         </td>
                                                         <td>
                                                             @php $board_name_data_list_array=[''=>'--select--'] @endphp
                                                             @foreach ($board_name_data as $board_name_data_list)
                                                                 @php $board_name_data_list_array[$board_name_data_list->name]=$board_name_data_list->name @endphp
                                                             @endforeach

                                                             <select name="borad[]" class="form-control borads">
                                                                 <option>--Select--</option>
                                                                 @foreach ($board_name_data as $board_name_data_list)
                                                                     <option value="{{ $board_name_data_list->name }}">
                                                                         {{ $board_name_data_list->name }}
                                                                     </option>
                                                                 @endforeach
                                                             </select>

                                                         </td>
                                                         <td class="others_university" hidden='hidden'>
                                                             {{ Form::text('university_name[]', '', ['class' => 'form-control university_name', 'id' => 'required', 'placeholder' => 'University Name', 'title' => 'University Name', 'style' => 'width: 100%']) }}
                                                         </td>
                                                         <td>
                                                             @php $group_name_data_list_array=[''=>'--select--'] @endphp
                                                             @foreach ($group_name_data as $group_name_data_list)
                                                                 @php $group_name_data_list_array[$group_name_data_list->name]=$group_name_data_list->name @endphp
                                                             @endforeach
                                                             {{ Form::select('group[]', $group_name_data_list_array, ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Group', 'title' => 'group', 'class' => 'table_text', 'style' => 'width: 100%']) }}
                                                         </td>
                                                         <td>
                                                             @php $year_data_list_array=[''=>'--select--'] @endphp
                                                             @foreach ($year_data as $year_data_list)
                                                                 @php $year_data_list_array[$year_data_list->name]=$year_data_list->name @endphp
                                                             @endforeach
                                                             {{ Form::select('passing_year[]', $year_data_list_array, ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Passing Year', 'title' => 'passing_year', 'class' => 'table_text', 'style' => 'width: 100%']) }}
                                                         </td>

                                                         <td>{{ Form::text('reg_no[]', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Reg No.', 'title' => 'Reg No.', 'class' => 'table_text', 'style' => 'width: 100%']) }}
                                                         </td>
                                                         <td>{{ Form::text('roll_no[]', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Roll No.', 'title' => 'Roll No.', 'class' => 'table_text', 'style' => 'width: 100%']) }}
                                                         </td>

                                                         <td>{{ Form::text('gpa[]', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Division/GPA', 'title' => 'Division/GPA', 'class' => 'table_text', 'style' => 'width: 100%']) }}
                                                         </td>
                                                         <td>
                                                             <div style="width: 80px;">
                                                                 <div class="control-group">
                                                                     {{ Form::label('marksheet', 'Marksheet', ['class' => 'control-label', 'title' => 'Marksheet']) }}
                                                                     <div class="form-control">
                                                                         {{ Form::file('marksheet[]', ['onchange' => 'readURL(this)']) }}
                                                                     </div>
                                                                 </div>
                                                                 <div class="control-group">
                                                                     {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                                                     <div class="form-control">
                                                                         {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </td>
                                                         <td>
                                                             <div class="form-control">
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
                         </div>


                         <div class="p-3 mb-2 bg-primary text-white rounded">Quota</div>
                         <div class="row pd-10">
                             <div class="col-lg-8">
                                 <div class="control-group">
                                     {{ Form::label('quota', 'Quota', ['class' => 'control-label', 'title' => 'Quota']) }}
                                     {{-- <div class="form-control">
                                            {{Form::select('physically_challenged',['Yes'=>'Yes','No'=>'No'])}}
                                            </div> --}}
                                     <div class="form-control">
                                         @php $quota_data_list_array=[''=>'--select--'] @endphp
                                         @foreach ($quota_data as $quota_data_list)
                                             @php $quota_data_list_array[$quota_data_list->name]=$quota_data_list->name @endphp
                                         @endforeach

                                         {{ Form::select('quota', $quota_data_list_array) }}
                                     </div>
                                 </div>
                             </div>
                         </div> <br>

                         <div class="p-3 mb-2 bg-primary text-white rounded">Apply Programs</div>
                         <p class="inner_heading pd-10">
                             <input type="button" class="add_program" value="Add Choose">
                         </p>
                         <div class="row pd-10">
                             <div class="col-lg-12">
                                 <div class="add_programmain_div" id="add_programDiv">
                                     <div class="add_programDiv">
                                         <div class="row">
                                             <div class="col-lg-3">
                                                 <div class="control-group">
                                                     {{ Form::label('Faculty', 'Faculty', ['class' => 'control-label', 'title' => 'Faculty']) }}
                                                     <div class="form-control">
                                                         @php $medium_array=[''=>'--select--'] @endphp
                                                         @foreach ($medium as $medium_list)
                                                             @php $medium_array[$medium_list->id]=$medium_list->type_name @endphp
                                                         @endforeach

                                                         <select name="medium[]" class="medium" id="medium">
                                                             <option>--Select--</option>
                                                             @foreach ($medium as $medium_list)
                                                                 <option value="{{ $medium_list->id }}">
                                                                     {{ $medium_list->type_name }}</option>
                                                             @endforeach
                                                         </select>

                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2">
                                                 <div class="control-group">
                                                     {{ Form::label('Department', 'Department', ['class' => 'control-label', 'title' => 'class']) }}

                                                     <div class="form-control">
                                                         <select name="department[]" class="department">
                                                             <option>--Select--</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2">
                                                 <div class="control-group">
                                                     {{ Form::label('program', 'Program', ['class' => 'control-label', 'title' => 'program']) }}
                                                     <div class="form-control">
                                                         <select name="class[]" class="manage_class">
                                                             <option>--Select--</option>
                                                         </select>

                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2">
                                                 <div class="control-group">
                                                     {{ Form::label('Section', 'Section', ['class' => 'control-label', 'title' => 'class']) }}

                                                     <div class="form-control">
                                                         @php $section_data_list_array=[''=>'--select--'] @endphp
                                                         @foreach ($section_data as $section_data_list)
                                                             @php $section_data_list_array[$section_data_list->section_name]=$section_data_list->section_name @endphp
                                                         @endforeach

                                                         <select name="section[]" class="section">
                                                             <option>--Select--</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2">
                                                 <div class="control-group">
                                                     {{ Form::label('Shift', 'Shift', ['class' => 'control-label', 'title' => 'batcg']) }}
                                                     <div class="form-control">
                                                         @php $shift_list_array=[''=>'--select--'] @endphp
                                                         @foreach ($shift as $shift_list)
                                                             @php $shift_list_array[$shift_list->type_name]=$shift_list->type_name @endphp
                                                         @endforeach

                                                         {{ Form::select('shift[]', $shift_list_array) }}
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-1">
                                                 <div class="control-group">
                                                     {{-- {{ Form::label('Delete Choose', 'Delete Choose', ['class' => 'control-label', 'title' => 'Choose Delete']) }} --}}
                                                     {{ Form::label('Action', 'Action', ['class' => '', 'title' => ' ']) }}
                                                     <div class="form-control">
                                                         <button id="delete_divChose" class="btn-danger"
                                                             type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                                                 width="16" height="20" fill="currentColor"
                                                                 class="bi bi-dash" viewBox="0 0 16 16">
                                                                 <path
                                                                     d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                             </svg>
                                                         </button>

                                                     </div>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div><br>

                         <div class="p-3 mb-2 bg-primary text-white rounded">Completed Credit</div>
                         <div class="row pd-10">
                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('credit_transfer', 'Credit Transfer', ['class' => 'control-label', 'title' => 'credit_transfer']) }}
                                     <div class="form-control">
                                         {{ Form::select('credit_transfer', ['Yes' => 'Yes', 'No' => 'No']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('credit_name_of_university', 'Name of University', ['class' => 'control-label', 'title' => 'Name of University']) }}
                                     <div class="form-control">

                                         {{ Form::text('credit_name_of_university', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Name of University', 'title' => 'Name of University']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('credit_completed_semester', 'Completed Semester', ['class' => 'control-label', 'title' => 'Completed Semester']) }}
                                     <div class="form-control">
                                         <div class="form-control">
                                             @php $semester_data_list_array=[''=>'--select--'] @endphp
                                             @foreach ($semester_data as $semester_data_list)
                                                 @php $semester_data_list_array[$semester_data_list->name]=$semester_data_list->name @endphp
                                             @endforeach

                                             {{ Form::select('semester', $semester_data_list_array) }}
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('Credit', 'Credit', ['class' => 'control-label', 'title' => 'Credit']) }}
                                     <div class="form-control">

                                         {{ Form::text('credit', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Credit', 'title' => 'Credit']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('CGPA', 'CGPA', ['class' => 'control-label', 'title' => 'CGPA']) }}
                                     <div class="form-control">

                                         {{ Form::text('cgpa', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'CGPA', 'title' => 'CGPA']) }}
                                     </div>
                                 </div>
                             </div>

                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('date_application', 'Date Of Application', ['class' => 'control-label', 'title' => 'Date Of Application']) }}
                                     <div class="form-control">
                                         <div data-date="12-02-2012" class="input-append date datepicker">
                                             {{ Form::date('date_application', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%', 'class' => 'form-control']) }}

                                             <span class="add-on"><i class="icon-th"></i></span>
                                             <!-- <input type="date">  -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="control-group">
                                     {{ Form::label('admission_status', 'Admission Status', ['class' => 'control-label', 'title' => 'admission_status']) }}
                                     <div class="form-control">
                                         {{ Form::select('admission_status', ['Active' => 'Active', 'Cancelled' => 'Cancelled']) }}
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> <br>

                     <div class="p-3 mb-2 bg-primary text-white rounded">Dependent Information</div>
                     <div class="row pd-10">
                         <div class="col-lg-3">
                             <div class="control-group">
                                 {{ Form::label('dependent_relation', 'Relation', ['class' => 'control-label', 'title' => 'Relation']) }}
                                 <div class="form-control">
                                     @php $dependent_relation_data_list_array=[''=>'--select--'] @endphp
                                     @foreach ($dependent_relation_data as $dependent_relation_data_list)
                                         @php $dependent_relation_data_list_array[$dependent_relation_data_list->name]=$dependent_relation_data_list->name @endphp
                                     @endforeach

                                     {{ Form::select('dependent_relation', $dependent_relation_data_list_array) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('reference_name', 'Profession', ['class' => 'control-label', 'title' => 'Profession']) }}
                                 <div class="form-control">
                                     @php $profession_data_list_array=[''=>'--select--'] @endphp
                                     @foreach ($profession_data as $profession_data_list)
                                         @php $profession_data_list_array[$profession_data_list->name]=$profession_data_list->name @endphp
                                     @endforeach

                                     {{ Form::select('dependent_profession', $profession_data_list_array) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('dependent_mobile_no', 'Mobile No.', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_mobile_no', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.']) }}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row pd-10">
                         <div class="col-lg-3">
                             <div style="width: 101px;">
                                 <div class="control-group">
                                     {{ Form::label('dependent_nid', 'NID', ['class' => 'control-label', 'title' => 'Marksheet']) }}
                                     <div class="form-control">

                                         {{ Form::file('dependent_nid', ['onchange' => 'readURL(this)']) }}

                                     </div>
                                 </div>
                                 <div class="control-group">
                                     {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                     <div class="form-control">
                                         {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'NID', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('dependent_monthly_income', 'Monthly Income', ['class' => 'control-label', 'title' => 'Monthly Income']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_monthly_income', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Monthly Income', 'title' => 'Monthly Income']) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('dependent_no_of_brothers', 'No. of Brothers', ['class' => 'control-label', 'title' => 'No. of Brothers']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_no_of_brothers', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'No. of Brothers', 'title' => 'No. of Brothers']) }}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row pd-10">
                         <div class="col-lg-3">
                             <div class="control-group">
                                 {{ Form::label('dependent_no_of_sisters', 'No. of Sisters', ['class' => 'control-label', 'title' => 'No. of Sisters']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_no_of_sisters', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'No. of Sisters', 'title' => 'No. of Sisters']) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('dependent_no_of_edu_brothers', 'No. of Education Running Brothers', ['class' => 'control-label', 'title' => 'No. of Education Running Brothers']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_no_of_edu_brothers', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'No. of Education Running Brothers', 'title' => 'No. of Education Running Brothers']) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('dependent_no_of_edu_sisters', 'No. of Education Running Sisters', ['class' => 'control-label', 'title' => 'No. of Education Running Sisters']) }}
                                 <div class="form-control">
                                     {{ Form::text('dependent_no_of_edu_sisters', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'No. of Education Running Sisters', 'title' => 'No. of Education Running Sisters']) }}
                                 </div>
                             </div>
                         </div>
                     </div><br>



                     <div class="p-3 mb-2 bg-primary text-white rounded">Reference Information</div>
                     <div class="row pd-10">
                         <div class="col-lg-5">
                             <p class="inner_heading">Reference 1</p>
                             <hr>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_name', 'Name', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Name', 'title' => 'Reference Name']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_designation', 'Designation', ['class' => 'control-label', 'title' => 'Designation']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_designation', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Designation', 'title' => 'Designation']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_institute_name', 'Institute Name', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_institute_name', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Institute Name', 'title' => 'Institute Name']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_id_no', 'ID No.', ['class' => 'control-label', 'title' => 'ID No.']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_id_no', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'ID No.', 'title' => 'ID No.']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_mobile_no', 'Mobile No.', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_mobile_no', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.']) }}
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-5">
                             <p class="inner_heading">Reference 2</p>
                             <hr>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_name1', 'Name', ['class' => 'control-label', 'title' => 'Reference Name']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_name1', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Name', 'title' => 'Reference Name']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_designation1', 'Designation', ['class' => 'control-label', 'title' => 'Designation']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_designation1', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Designation', 'title' => 'Designation']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_institute_name1', 'Institute Name', ['class' => 'control-label', 'title' => 'Institute Name']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_institute_name1', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Institute Name', 'title' => 'Institute Name']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_id_no1', 'ID No.', ['class' => 'control-label', 'title' => 'ID No.']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_id_no1', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'ID No.', 'title' => 'ID No.']) }}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="control-group">
                                     {{ Form::label('reference_mobile_no1', 'Mobile No.', ['class' => 'control-label', 'title' => 'Mobile No.']) }}
                                     <div class="form-control">
                                         {{ Form::text('reference_mobile_no1', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Mobile No.', 'title' => 'Mobile No.']) }}
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> <br>

                     <div class="p-3 mb-2 bg-primary text-white rounded">Payment</div>
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
                                 <div class="form-control">
                                     {{ Form::text('payment_transaction_id', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Transaction ID', 'title' => 'Transaction ID']) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-4">
                             <div class="control-group">
                                 {{ Form::label('payment_mobile_no', 'Applicant Mobile No.', ['class' => 'control-label', 'title' => 'Applicant Mobile No.']) }}
                                 <div class="form-control">
                                     {{ Form::text('payment_mobile_no', '', ['class' => 'form-control', 'id' => 'required', 'placeholder' => 'Applicant Mobile No.', 'title' => 'Applicant Mobile No.']) }}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <br>

                     <div class="p-3 mb-2 bg-primary text-white rounded">Attachments</div>
                     <div class="row pd-10"> 
                         <div class="col-lg-5">
                             <div class="control-group">
                                 {{ Form::label('photo', 'Photo', ['class' => 'control-label', 'title' => 'photo']) }}
                                 <div class="form-control">

                                     {{ Form::file('attached_photo', ['onchange' => 'readURL(this)']) }}

                                 </div>
                             </div>
                             <div class="control-group">
                                 {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                 <div class="form-control">
                                     {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-5">
                             <div class="control-group">
                                 {{ Form::label('image', 'Signature', ['class' => 'control-label', 'title' => 'Signature']) }}
                                 <div class="form-control">

                                     {{ Form::file('attached_signature', ['onchange' => 'readURL(this)']) }}

                                 </div>
                             </div>
                             <div class="control-group">
                                 {{ Form::label('', '', ['class' => 'control-label', 'title' => '']) }}
                                 <div class="form-control">
                                     {{ Form::image('img/blankavatar.png', 'Profile_image', ['alt' => 'Your Signature', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                                 </div>
                             </div>
                         </div>
                     </div> <br>


                     <div class="p-3 mb-2 bg-primary text-white rounded">The Following Documents are to be
                         attached
                     </div>
                     <div class="row pd-10">
                         <div class="col-lg-12">
                             <ul style="padding-left: 30px;">
                                 <li>Receipt of Application Registration Form</li>
                                 <li>Testimonials from the Heads of Institutions from where the
                                     candidate
                                     has
                                     passed S.S.C & H.S.C/Equivalent Examinations</li>
                                 <li>Citizendhip certificate from any Gazetted Officer in respect of
                                     your character.</li>
                                 <li>3 (Three) Copies of recent passport size photographs duly attested.
                                 </li>
                                 <li>Attested copies of mark sheets/Candidates of S.S.C &
                                     H.S.C/Equivalent
                                     Examination.</li>
                                 <li>Certificate regarding financial solvency of father/guardian</li>
                             </ul>
                         </div>
                     </div> <br>


                     <div class="p-3 mb-2 bg-primary text-white rounded">Declaration</div>
                     <div class="row pd-10">
                         <div class="col-md-12">
                             <ul style="padding-left: 30px;width: 95%;">
                                 <li>
                                     <p justified>I, hereby solemnly declare and legally bind myself to
                                         confirm to the
                                         Rules
                                         and Regulations of the University at present in force or
                                         may hereafter be made and i undertake the so long as I am a
                                         Student of
                                         the
                                         Universty i will do nothing either inside of outside the
                                         University that will unterfere with the discipline and the
                                         other of
                                         Ordinances of University Grant Commission relating Course,
                                         Syllabus and
                                         Examination at present on force or that may hereafter be made
                                         to this
                                         effect.</p>
                                 </li>

                                 <li>I shall be liable to tbe expelled from the University if any of the
                                     above
                                     information each found to be false or fabricated, all fees and
                                     other dues paid by me to the University up to that time shall be
                                     forefeited. I and my father/legal guardian would also be liable to
                                     any
                                     further departmental or legal action that the authorities may deem
                                     necessary.</li>
                                 <li>
                                     I further solemnly declare that there is no personal, domestic or
                                     financial
                                     circumnstances which may prevent me from continuing my studies in
                                     this
                                     University until the completion of the entire course of studies.
                                 </li>

                                 <li>I further declare that i shall not do any activities subversive to
                                     the
                                     discipline of the institution and/or of the State (Such as Strike,
                                     Hartal &
                                     Boycott etc.)</li>

                                 <li>I hereby certify that the above statement of Particulars are tru
                                     and
                                     correct.</li>
                             </ul>
                         </div>
                     </div> <br>


                     <div class="col-lg-12">
                         <input type="checkbox"> I Agree to the above Terms and Conditions.
                     </div><br>


                     <div class="col-lg-12">
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                     <!-- {{ Form::close() }} -->
                     </form>
                 </div>
             </div>
         </div>
     </div> <br>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
         });
     </script>

     @push('custom-scripts')
         <script type="text/javascript" src="{{ asset('extra_js/applicant_student.js') }}"></script>
         <script type="text/javascript">
             $(document).ready(function() {
                 var max_fields = 5; //maximum input boxes allowed
                 var wrapper = $(".input_fields_wrap"); //Fields wrapper
                 var add_button = $(".add_field_button"); //Add button ID

                 var x = 1; //initlal text box count
                 $(add_button).click(function(e) { //on add input button click
                     e.preventDefault();
                     if (x <= max_fields) { //max input box allowed
                         x++; //text box increment
                         $(wrapper).append(
                             '<div><table class="table address"><tr>\
                                                                                             <td><input id="required" class="table_text" placeholder="Exam Name" title="exam_name" style="width: 95%" name="exam_name[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Board" title="borad" class="table_text" style="margin-left: -6%;width: 95%" name="borad[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Reg No" title="Reg No" class="table_text" style="margin-left: -12%;width: 95%" name="reg_no[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Roll No" title="roll_no" class="table_text" style="margin-left: -18%;width: 95%" name="roll_no[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Group" title="group" class="table_text" style="margin-left: -22%;width: 95%" name="group[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Passing Year" title="passing_year" class="table_text" style="margin-left: -26%;width: 95%" name="passing_year[]" type="text" value=""></td>\
                                                                                             <td><input id="required" placeholder="Gpa" title="gpa" class="table_text" style="margin-left: -30%;width: 78%" name="gpa[]" type="text" value=""></td>\
                                                                                         </tr></table><button href="#" class="btn btn-danger remove_field" style="float: right;margin-top: -4.3%;margin-right: 20%;"><i class="fa fa-trash"></i></button></div>'
                         ); //add input box
                     } else {
                         toastr.warning('Only 5 Fileds Are Allowed');
                         return false;
                     }
                 });

                 $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                     e.preventDefault();
                     $(this).parent('div').remove();
                     x--;
                 })
             });
         </script> -->

     @endpush
 @stop
