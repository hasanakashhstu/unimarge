@extends('admin.index')
@section('Title','Faculties')
@section('breadcrumbs','Faculties')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Admin Information')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" faculties-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" faculties-dismiss="alert" aria-label="close">&times;</a>
                <strong>Wrong!</strong> {{Session::get('error')}}
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

<div class="widget-content nopadding">
  <div class="container">
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Our Management</h2> <!-- Tab Heading  -->
      <p title="Transport Details">{{Session::get('school.system_name')}} Our Management</p> <!-- Transport Details -->
		  



  <div class="controls text-right">
            <div faculties-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

              <button  class="btn btn-default" title='Print' type="button"><a href="#" id='print'><i class="fa fa-print" aria-hidden="true"></i></a></button>
            </div>
    </div>
</div>








        <div class="widget-box">
            <div class="widget-title">
              <span class="icon"> <i class="icon-info-sign"></i></span>
              <h5>{{$faculties->title}} Information Edit</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/frontend/faculties/$faculties->website_faculties_id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                      {{Form::label('website_faculties_name','Department Name',['class'=>'control-label','title'=>'title'])}}
                      <div class="controls">
                        @php
                          $department_data_array=[''=>'--select--']
                        @endphp
                        @foreach($department as $department_data_fetch)
                          @php $department_data_array[$department_data_fetch['department_name']]=$department_data_fetch['department_name'] @endphp
                        @endforeach

                        {{Form::select('website_faculties_name',$department_data_array,null,['class'=>'website_faculties_name','id'=>'website_faculties_name'])}}
                      </div>
                    </div>


                    <div class="control-group">
                      {{Form::label('department_head','Department Head',['class'=>'control-label','title'=>'title'])}}
                      <div class="controls">
                        @php
                          $teacher_data_array=[''=>'--select--']
                        @endphp
                        @foreach($teacher as $teacher_data_fetch)
                          @php $teacher_data_array[$teacher_data_fetch->teacher_id]=$teacher_data_fetch->teacher_name @endphp
                        @endforeach

                        {{Form::select('department_head',$teacher_data_array,null,['class'=>'responsible_teacher','id'=>'department_head'])}}
                      </div>
                    </div>

                    <div class="control-group">
                      {{Form::label('Message From Head',null,['class'=>'control-label'])}}

                      <div class="controls">
                        {{Form::textarea('msg_from_head',$faculties->msg_from_head)}}
                       </div>
                    </div>

                    <div class="control-group">
                      {{Form::label('Lab Info',null,['class'=>'control-label'])}}

                      <div class="controls">
                        {{Form::textarea('lab_info',$faculties->lab_info)}}
                       </div>
                    </div> 

          </div>
        
              <div class="modal-footer">
                 {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'edit_submit_button','style'=>'float:left'])}}  
              </div>
      		{{Form::close()}}
      </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/create_admin_edit.js')}}"></script>
@endpush
 
@stop
