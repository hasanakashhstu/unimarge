@extends('admin.index')
@section('Title','Website Setup')
@section('breadcrumbs','general_settings')
@section('breadcrumbs_link','/general_settings')
@section('breadcrumbs_title','general_settings')
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
        <h2><i class="fa fa-car" aria-hidden="true"></i>&nbsp;General Settings</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}}  General Settings</p> <!-- Transport Details -->





        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Website Setup</h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{Form::open(['url'=>"/frontend/former_head_add",'class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                            <div class="control-group">
                                {{Form::label('department_id','Department',['class'=>'control-label','title'=>'Work Department'])}}
                                <div class="controls">
                                    @php
                                        $work_department_array =['Select Department.']
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
                                    {{Form::textarea('former_head_text',$former_head->former_head_text,['class'=>'span11 description ckeditor'])}}
                                </div>
                            </div>




                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/admit_student.js')}}"></script>

    @endpush
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@stop
