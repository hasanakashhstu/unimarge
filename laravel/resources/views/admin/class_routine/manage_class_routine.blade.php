@extends('admin.index')
@section('Title', 'routine_one_class')
@section('breadcrumbs', 'routine_one_class')
@section('breadcrumbs_link', '/routine_one_class')
@section('breadcrumbs_title', 'routine_one_class')
@section('content')



    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
            {{ Session::get('success') }}
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
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i></i> {{ $class_name }} Class Routine</h2>




        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Routine Details </p>

        <!-- Transport Details -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#home">
                    <i class="fa fa-bars" aria-hidden="true"></i> {{ $class_name }} Class Routine List
                </a>
            </li>
            @can('create class routine')
                <li>
                    <a data-toggle="tab" href="#menu1">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Class {{ $class_name }} Routine
                    </a>
                </li>
            @endcan
            <li>
                <a data-toggle="tab" href="#routine_info">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>Routine Information
                </a>
            </li>


        </ul>
        <div class="tab-content">
            <!-- Transport List Report  -->
            <div id="home" class="tab-pane fade in active">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-body">
                        @foreach ($medium_grp as $medium_grp_data)
                            <span style="margin-top: 3%;" class="text-center tag">Medium :
                                {{ $medium_grp_data->medium }}</span>
                            @foreach ($department as $department_value)
                                {{-- <span style="margin-top: 3%;" class="text-center tag">Department Name : {{$department_value->department}}</span> --}}
                                @foreach ($section as $section_value)
                                    <br>
                                    <div class="test div_print_{{ $section_value->section }}" style="overflow: scroll;">
                                        <div class="hidden_div">
                                            <div class="container" style="text-align: center;">
                                                <h5>{{ Session::get('school.system_name') }}(
                                                    {{ Session::get('school.school_eiin') }} )
                                                </h5>
                                                <h5>{{ Session::get('school.address') }}<br>
                                                    {{ Session::get('school.Phone') }}<br>
                                                    {{ Session::get('school.country') }}<br>
                                                    {{ Session::get('school.postal_code') }}</h5>
                                            </div>
                                        </div>

                                        <div>
                                            <span>{{ Session::get('school.system_name') }}</span><br>
                                            <span>Class Routine For : {{ $class_name }}</span><br>
                                            <span></span><br>
                                            <span style="margin-top: 3%;" class="text-center tag">Section Name :
                                                {{ $section_value->section }}</span>
                                            &nbsp;
                                            <span style="margin-top: 3%;" class="text-center tag">Department Name :
                                                {{ $department_value->department }}</span>
                                        </div>



                                        <table class="table table-bordered" border="2" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <?php
                                                $classes = DB::table('class_routine')
                                                    ->where('class_name', $class_name)
                                                    ->where('section', $section_value->section)
                                                    ->where('department', $department_value->department)
                                                    ->where('medium', $medium_grp_data->medium)
                                                    ->select(DB::raw('COUNT(*) as total_class'), 'class_routine_id')
                                                    ->groupBy('class_day')
                                                    ->get()
                                                    ->toArray();
                                                $most_class = collect($classes)->max('total_class');
                                                ?>
                                                <tr class="gradeA">
                                                    <style type="text/css">
                                                        .head {
                                                            width: 28px;
                                                            height: 28px;
                                                            position: relative;

                                                        }

                                                        .head:before {
                                                            content: "Period";
                                                            position: absolute;
                                                            margin-left: 40%;
                                                            margin-top: -4%;
                                                        }

                                                        .head:after {
                                                            content: "Day";
                                                            position: absolute;
                                                            border-top: 1px solid red;
                                                            text-align: center;
                                                            width: 65px;
                                                            transform: rotate(24deg);
                                                            transform-origin: 0% 0%;
                                                        }

                                                    </style>
                                                    <?php 
                      for ($j=0; $j <= $most_class ; $j++) 
                      { 
                      ?>
                                                    <td @if ($j == 0)
                                                        class="head"
                                @endif
                                @if ($j != 0)
                                    style="text-align: center;font-size: 12px;font-weight: bold;"
                                @endif
                                >
                                <?php
                                if ($j == 0) {
                                    echo '';
                                } elseif ($j == 1) {
                                    echo $j . '<sup>st</sup> Period';
                                } elseif ($j == 2) {
                                    echo $j . '<sup>nd</sup> Period';
                                } elseif ($j == 3) {
                                    echo $j . '<sup>rd</sup> Period';
                                } else {
                                    echo $j . '<sup>th</sup> Period';
                                }
                                ?>
                                </td>
                                <?php  
                      }
                    ?>
                                </tr>

                                <?php

    for ($i=1; $i <= 6; $i++) {
    $sunday=DB::table('class_routine')->join('class_routine_start_child','class_routine.class_routine_id','=','class_routine_start_child.parent')
        ->join('class_routine_end_child','class_routine.class_routine_id','=','class_routine_end_child.parent')
        ->where('class_name',$class_name)
        ->where('section',$section_value->section)
        ->where('department',$department_value->department)
        ->where('class_day',$i)
        ->where('medium',$medium_grp_data->medium)
        ->orderBy('class_routine_start_child.class_starting_time','ASC')
        ->get();

        ?>
                                <tr class="gradeA">

                                    <td width="100"><?php
if ($i == 1):
    echo 'Saturday';
elseif ($i == 2):
    echo 'Sunday';
elseif ($i == 3):
    echo 'Monday';
elseif ($i == 4):
    echo 'Tuesday';
elseif ($i == 5):
    echo 'Wednesday';
elseif ($i == 6):
    echo 'Thursday';
endif;
?></td>

                                    @foreach ($sunday as $sunday_value)

                                        <td>
                                            <div>
                                                <button style="height: 105px;;width: 230px;"
                                                    class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span style="color:crimson">
                                                        {{ $sunday_value->subject }}
                                                    </span>
                                                    <br />
                                                    ( <?php echo date('h.i A', $sunday_value->class_starting_time); ?> - <?php echo date('h.i A', $sunday_value->class_ending_time); ?>)
                                                    <br />
                                                    <span>
                                                        <br><span
                                                            style="color: green">{{ $sunday_value->teacher }}</span>
                                                    </span>
                                                </button>

                                            </div>

                                        </td>
                                    @endforeach

                                </tr>
                                <?php
}
?>
                                </tbody>
                                </table>

                    </div>
                    <br>
                    @can('view class routine')
                        <button>
                            <a id='print' target="_blank" onclick="pop_print_<?php echo $section_value->section; ?>()" media='print' title='Print'
                                type="button"><i class="fa fa-print" aria-hidden="true"></i></a>
                        </button>
                    @endcan

                    <style type="text/css">
                        .hidden_div {
                            display: none;
                        }


                        @media print {
                            .hidden_div {
                                display: block;
                            }

                        }

                    </style>
                    <script type="text/javascript">
                        function pop_print_<?php echo $section_value->section; ?>() {
                            w = window.open(null, 'Print_Page', 'scrollbars=yes');

                            w.document.write(
                                '<style>@page{size:landscape;border:black 2px solid}.head{height: 50px;}</style><html><head><title></title>'
                            );

                            w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                            w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                            w.document.write(jQuery('.div_print_<?php echo $section_value->section; ?>').html());


                            w.document.close();
                            //w.print();
                        }
                    </script>
                    @endforeach
                    <br>
                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>











        <div id="menu1" class="tab-pane fade">
            <div>
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-info-sign"></i>
                        </span>
                        <h5>{{ $class_name }} Routine</h5>
                    </div>

                    <div class="widget-content nopadding">
                        {{ Form::open(['url' => '/manage_class_routine', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
                        <div class="control-group">
                            <label class="control-label">{{ Form::label('class', null, []) }}</label>
                            <div class="controls">
                                {{ $class_name }}
                                {{ Form::hidden('class_name', $class_name) }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                {{ Form::label('department', 'Department', ['class' => 'control-label']) }}</label>
                            <div class="controls">
                                @php
                                    $department_data = DB::table('manage_department')
                                        ->where('class_name', $class_name)
                                        ->get();
                                    
                                    $dapertment_array = ['--select--' => '--select--'];
                                @endphp
                                @foreach ($department_data as $department_data_value)
                                    @php
                                        $dapertment_array[$department_data_value->department_name] = $department_data_value->department_name;
                                    @endphp
                                @endforeach

                                {{ Form::select('department', $dapertment_array) }}
                            </div>
                        </div>

                        <div class="control-group">
                            {{ Form::label('medium', 'Medium', ['class' => 'control-label']) }}
                            <div class="controls">
                                @php
                                    $medium_array = ['' => '--select--'];
                                @endphp
                                @foreach ($medium as $medium_data)
                                    @php
                                        $medium_array[$medium_data->type_name] = $medium_data->type_name;
                                    @endphp
                                @endforeach
                                {{ Form::select('medium', $medium_array, null, ['class' => 'medium', 'id' => 'medium']) }}
                            </div>
                        </div>




                        <div class="control-group">
                            <label class="control-label">{{ Form::label('Subject', null, []) }}</label>
                            <div class="controls">
                                @php
                                    $subject_name = [];
                                @endphp
                                @foreach ($subject_info_class_wise as $suject_list)
                                    @php  $subject_name[$suject_list->subject_name] = $suject_list->subject_name; @endphp
                                @endforeach
                                {{ Form::select('subject', $subject_name) }}
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">{{ Form::label('Section', null, []) }}</label>
                            <div class="controls">
                                @php
                                    $section_data_array = [];
                                @endphp
                                @foreach ($section_info_class_wise as $section_list)
                                    @php  $section_data_array[$section_list->section_name] = $section_list->section_name; @endphp
                                @endforeach

                                {{ Form::select('section', $section_data_array) }}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Day</label>
                            <div class="controls">

                                {{ Form::select('class_day', ['1' => 'Saturday', '2' => 'Sunday', '3' => 'Monday', '4' => 'Tuesday', '5' => 'Wednesday', '6' => 'Thursday', '7' => 'Friday']) }}

                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Teacher</label>
                            <div class="controls">

                                @php
                                    $teacher_data_array = [];
                                @endphp
                                @foreach ($teacher_detials as $techer_list)
                                    @php  $teacher_data_array[$techer_list->teacher_name] = $techer_list->teacher_name; @endphp
                                @endforeach
                                {{ Form::select('teacher', $teacher_data_array) }}

                            </div>
                        </div>




                        <div class="control-group">
                            <label class="control-label">Starting Time</label>
                            <div class="controls">
                                <table class="table address">
                                    <thead>
                                        <tr>
                                            <th>Hour</th>
                                            <th>Minutes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ Form::select('class_starting_hour', ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24']) }}

                                            </td>
                                            <td>

                                                {{ Form::select('class_starting_minutes', ['0' => '0', '5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '59' => '59']) }}

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Ending Time</label>
                            <div class="controls">
                                <table class="table address">
                                    <thead>
                                        <tr>
                                            <th>Hour</th>
                                            <th>Minutes</th>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ Form::select('class_ending_hour', ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24']) }}
                                            </td>
                                            <td>
                                                {{ Form::select('class_ending_minutes', ['0' => '0', '5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '59' => '59']) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions">
                            @can('create class routine')
                                <input type="submit" value="Submit" class="btn btn-success">
                            @endcan
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>




        <div style="width: 95%;" id="routine_info" class="tab-pane fade in">
            <div id="home" class="tab-pane fade in active">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-body">
                        @foreach ($medium_grp as $medium_grp_data)
                            <p style="margin-top: 3%;" class="text-center tag">{{ $medium_grp_data->medium }}</p>
                            @foreach ($department as $department_value)
                                <p style="margin-top: 3%;" class="text-center tag">{{ $department_value->department }}
                                </p>
                                <br>
                                @foreach ($section as $section_value)
                                    <p style="margin-top: 3%;" class="text-center tag">{{ $section_value->section }}</p>
                                    <div class="tab-content">
                                        <!-- Transport List Report  -->

                                        <div id="home" class="tab-pane fade in active">
                                            <div class="widget-box">
                                                <div class="widget-title"> <span class="icon"><i
                                                            class="icon-th"></i></span>
                                                    <h5>{{ $section_value->section }} Report</h5>
                                                </div>

                                                <div class="widget-content nopadding">
                                                    <table class="table table-bordered data-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Class Name</th>
                                                                <th>Medium</th>
                                                                <th>Section</th>
                                                                <th>subject Name</th>
                                                                <th>Class Start Time</th>
                                                                <th>Class End Time</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                         if($section_value->section==$section_value->section)
                             {
                         $section_wise_data=DB::table('class_routine')->join('class_routine_start_child','class_routine.class_routine_id','=','class_routine_start_child.parent')->join('class_routine_end_child','class_routine.class_routine_id','=','class_routine_end_child.parent')->where('class_name',$class_name)->where('section',$section_value->section)->where('department',$department_value->department)->where('medium',$medium_grp_data->medium)->orderBy('class_starting_time','asc')->get();
                          ?>


                                                            @foreach ($section_wise_data as $section_wise_data_list)
                                                                <tr class="gradeX">

                                                                    <td>{{ $section_wise_data_list->class_name }}</td>
                                                                    <td>{{ $section_wise_data_list->medium }}</td>
                                                                    <td>{{ $section_wise_data_list->section }}</td>
                                                                    <td>{{ $section_wise_data_list->subject }}</td>
                                                                    <td><?php echo date('h:i A', $section_wise_data_list->class_starting_time); ?></td>
                                                                    <td><?php echo date('h:i A', $section_wise_data_list->class_ending_time); ?></td>
                                                                    <td id="my_align" class="display_status">
                                                                        @can('edit class routine')
                                                                            {{ Form::open(['url' => "manage_class_routine/$section_wise_data_list->class_routine_id/edit", 'method' => 'GET']) }}
                                                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                                            {{ Form::close() }}
                                                                        @endcan
                                                                        @can('delete class routine')
                                                                            {{ Form::open(['url' => "manage_class_routine/$section_wise_data_list->class_routine_id", 'method' => 'DELETE']) }}
                                                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                                            {{ Form::close() }}
                                                                        @endcan
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <?php
                         }
                         ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!--
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <script type="text/javascript">
                  $(document).ready(function() {
                      $('.class_routine_delete').unbind().click(function() {
                          if (!confirm('Are you sure you want to continue?')) {
                              return false;
                          } else {
                              var id = $(this).attr('value');
                              $(this).closest('tr').remove();
                              $.ajax({
                                  url: '/class_routine/' + id + '',
                                  type: "DELETE",
                                  data: {
                                      'id': id,
                                      '_token': $('input[name=_token]').val()
                                  },
                                  success: function(data) {

                                  }
                              });
                          }
                      });
                  });
              </script>
        -->





@stop
