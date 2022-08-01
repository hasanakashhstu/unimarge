@extends('admin.index')
@section('Title', 'Manage Marks')
@section('breadcrumbs', 'Manage Marks')
@section('breadcrumbs_link', '/manage_marks')
@section('breadcrumbs_title', 'Manage Marks')
@section('content')


    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::has('wrong'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>wrong!</strong> {{ Session::get('wrong') }}
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





    <style type="text/css">
        .dark-area {
            background-color: #666;
            padding: 40px;
            margin: 0 -40px 20px -40px;
            clear: both;
        }

        .clearfix:before,
        .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        .clearfix {
            *zoom: 1;
        }

    </style>

    <link rel="stylesheet" href="css/circle.css">







    <div class="container">
        <h2><i class="fa fa-user-plus" aria-hidden="true"></i>Publish Marks</h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">I School Managment Student Exam Manage Marks Details</p>
        <!-- Transport Details -->


    </div>


    <div>
        <!-- Transport List Report  -->


        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                <h5>Publish Mark</h5>
            </div>

            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">

                    <thead>
                        <tr>
                            <th>Exam Name</th>
                            <th>Class Name</th>
                            <th>Section</th>
                            <th>Department</th>
                            <th>Subject</th>
                            <th>Total Student</th>
                            <th>Total Result Entry For</th>
                            <th>Complete Status</th>
                            <th>Comment</th>
                            <th>Information Entry By</th>

                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($exam_details as $values)
                            <tr class="gradeX">
                                <td>{{ $values->exam_name }}</td>
                                <td>{{ $values->class_name }}</td>
                                <td>{{ $values->section }}</td>
                                <td>{{ $values->Department }}</td>
                                <td>{{ $values->subject }}</td>
                                @php
                                    
                                    $total_student = DB::table('students')
                                        ->where('class', $values->class_name)
                                        ->Where('section', $values->section)
                                        ->Where('department', $values->Department)
                                        ->count();
                                    
                                    $result_entry_student = DB::table('mark_general_details')
                                        ->join('mark_student_details', 'mark_general_details.general_details_id', '=', 'mark_student_details.general_details_id')
                                        ->where('mark_general_details.class_name', $values->class_name)
                                        ->Where('mark_general_details.section', $values->section)
                                        ->Where('mark_general_details.Department', $values->Department)
                                        ->Where('mark_general_details.exam_name', $values->exam_name)
                                        ->where('mark_general_details.subject', $values->subject)
                                        ->count();
                                    $count_percentage = (100 * intval($result_entry_student)) / intval($total_student);
                                    
                                @endphp

                                <!-- $users = DB::table('users')
                ->join('contacts', 'users.id', '=', 'contacts.user_id')
                ->join('orders', 'users.id', '=', 'orders.user_id')
                ->select('users.*', 'contacts.phone', 'orders.price')
                ->get(); -->


                                <!--  where('class',$values->class_name)
                                                         ->Where('section',$values->section)
                                                         ->Where('department',$values->Department)->count(); -->
                                <td>{{ $total_student }}</td>
                                <td>{{ $result_entry_student }}</td>

                                <td>
                                    <div class="clearfix">
                                        <div class="c100 p<?php echo intval($count_percentage); ?> small green">
                                            <span>@php echo intval($count_percentage) @endphp%</span>
                                            <div class="slice">
                                                <div class="bar"></div>
                                                <div class="fill"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>This Done For Publish</td>
                                <td>{{ $values->entry_here }}</td>

                                <td class="center">

                                    <div class="display_status">
                                        @can('view exam')
                                            {{ Form::submit('Publish', ['class' => 'btn btn-success']) }}
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div id="menu1" class="tab-pane fade">


            <div>
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Exam Grade</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {{ Form::open(['url' => '/exam_grade', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'navalidate' => 'navalidate']) }}

                        <div class="control-group">
                            {{ Form::label('grade_name', 'Grade Name:', ['class' => 'control-label', 'title' => 'Grade Name']) }}
                            <div class="controls">
                                {{ Form::text('grade_name', '', ['id' => 'required', 'title' => 'grade_name', 'placeholder' => 'Grade Name']) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('grade_point', 'Grade Point:', ['class' => 'control-label', 'title' => 'Grade Point']) }}
                            <div class="controls">
                                {{ Form::text('grade_point', '', ['id' => 'required', 'title' => 'grade_point', 'placeholder' => 'Grade Point']) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('mark_from', 'Mark From:', ['class' => 'control-label', 'title' => 'Mark From']) }}
                            <div class="controls">
                                {{ Form::text('mark_from', '', ['id' => 'required', 'title' => 'mark_from', 'placeholder' => 'Mark From']) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('mark_upto', 'Mark Upto:', ['class' => 'control-label', 'title' => 'Mark Upto']) }}
                            <div class="controls">
                                {{ Form::text('mark_upto', '', ['id' => 'required', 'title' => 'mark_upto', 'placeholder' => 'Mark Upto']) }}
                            </div>
                        </div>


                        <div class="form-actions">
                            <input type="submit" value="Add Grade" class="btn btn-primary">
                        </div>
                        {{ csrf_field() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>


        </div>

    </div>
    </div>



@stop
