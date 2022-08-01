@extends('admin.index')
@section('Title','Former Head Text')
@section('breadcrumbs','Former Head Text')
@section('breadcrumbs_link','/former_head_add')
@section('breadcrumbs_title','Former Head Text')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
        </div>

    @endif


    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade in">
            <ul  style='list-style:none'>
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h2><i class="fa fa-book" aria-hidden="true"></i>Former Head Text  </h2> <!-- Tab Heading  -->
        <p title="Transport Details">Former Head Text  Details</p> <!-- Transport Details -->

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Former Head Text  List</a></li>
            <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Former Head Text  </a></li>
        </ul>
        <div class="tab-content"> <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <!-- report -->
                <!-- Main content -->
                <section class="content">
                    <!--report-->
                    <div class="tab-content">
                        <div id="all_Former Head Text  _data" class="tab-pane fade in active">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                    <h5>All Former Head Text  Data table</h5>
                                </div>

                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">

                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Former Head Text  Title</th>
                                            <th>Department</th>

                                            <th>Actions</th>
                                        </tr>
                                        </thead>


                                        <tbody>

                                        @foreach($student_advisor as $key=>$all_data)
                                            <tr class="gradeX">

                                                <td>{{$key++}}</td>
                                                <td>{!! $all_data->former_head_text !!}</td>
                                                <td>{{$all_data->department_name}}</td>

                                                <td class="center">
                                                    <div class="display_status">
                                                        {{Form::open(['url'=>"/former_head_add/$all_data->former_head_id" ,'method'=>'DELETE'])}}
                                                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                                                        {{Form::close()}}


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--report--->

            <div id="menu1" class="tab-pane fade">
                <div >
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Former Head Text</h5>
                        </div>
                        <div class="widget-content nopadding">





                            {{Form::open(['url'=>'/former_head_add','class'=>'form-horizontal','files'=>True,'method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                            <div class="control-group">
                                {{Form::label('department_id','Department',['class'=>'control-label','title'=>'Work Department'])}}
                                <div class="controls">
                                    @php
                                        $work_department_array =['Select Department'];

                                    @endphp
                                    @foreach($department as $department_list)
                                        @php $work_department_array[$department_list->id]=$department_list->department_name @endphp
                                    @endforeach

                                    {{Form::select('department_id',$work_department_array)}}
                                </div>
                            </div>

                            <div class="control-group">
                                {{Form::label('Former Head Text',null,['class'=>'control-label'])}}
                                <div class="controls">
                                    {{Form::textarea('former_head_text','',['class'=>'span11 description ckeditor'])}}
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>


@stop
