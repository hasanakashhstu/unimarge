@extends('admin.index')
@section('Title','Edit Admin Information')
@section('breadcrumbs','Create Admin > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Admin Information')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Admin Information</h2> <!-- Tab Heading  -->
      <p title="Transport Details">{{Session::get('school.system_name')}} Create Admin</p> <!-- Transport Details -->
		  

     <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/create_permission'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create permission</a></li>
            <li><a href='/create_role'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create role</a></li>
            <li><a href='/user_access'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;User acess</a></li>
            <li><a href='/create_admin'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
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
              <h5>{{$edit_information->name}} Information Edit</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/create_admin/$edit_information->id",'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                  {{Form::label('name','Name',['class'=>'control-label','title'=>'name'])}}
                    <div class="controls">
                      {{Form::text('name',$edit_information->name,['id'=>'required','placeholder'=>'Admin Name','title'=>'name'])}}
                      </div>
              </div>

              <div class="control-group">
                  {{Form::label('email','Email Address',['class'=>'control-label','title'=>'email'])}}
                  <div class="controls">
                    {{Form::text('email',$edit_information->email,['id'=>'email','placeholder'=>'Email Address','title'=>'email','disabled'=>'disabled'])}}

                    <p style="color: red">Email Address Update Are Not Allowed</p>

                    {{Form::hidden('email',$edit_information->email,['id'=>'email','placeholder'=>'Email Address','title'=>'email'])}}
                  </div>
              </div>


              <div class="control-group">
             		{{Form::label('Password','Password',['class'=>'control-label','title'=>'password'])}}           
             			<div class="controls">
                    <div class="input-append">
	              			{{Form::password('password',['class' =>'form-control','onkeyup'=>'password_len_check()','id'=>'current_password','title'=>'password'])}}
	               			<span class="add-on" style="width:0%" id="password_show_button" ><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

              			</div>
                    <span id="current_password_block"></span>
                  </div>
              </div>


              <div class="control-group">
                {{Form::label('Conifram_password','Confirm Password',['class'=>'control-label','title'=>'Confiram Password'])}}           
                  <div class="controls">
                      {{Form::password('confiram_password', ['class' =>'form-control','id'=>'confiram_password','title'=>'confiram_password','onkeyup'=>'Password_match()'])}}
                      <span id="confiram_password_block"></span>
                    </div>
              </div>
          </div>
        
              <div class="modal-footer">
                 {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'edit_submit_button','disabled'=>'disabled','style'=>'float:left'])}}  
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
