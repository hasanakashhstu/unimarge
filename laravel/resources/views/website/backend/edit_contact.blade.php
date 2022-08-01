@extends('admin.index')
@section('Title','Edit Admin Information')
@section('breadcrumbs','Create Admin > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Admin Information')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
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
            <div slider-toggle="buttons-checkbox" class="btn-group">
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
              <h5>{{$contact->title}} Information Edit</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/frontend/contact/$contact->id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                  {{Form::label('name','Name',['class'=>'control-label','title'=>'Name'])}}
                    <div class="controls">
                    {{Form::text('name',$contact->name,['id'=>'required','placeholder'=>'Name','title'=>'name'])}}
                    </div>
                </div>

                <div class="control-group">
                  {{Form::label('designation','Designation',['class'=>'control-label','title'=>'Designation'])}}
                    <div class="controls">
                    {{Form::text('designation',$contact->designation,['id'=>'required','placeholder'=>'Designation','title'=>'Designation'])}}
                    </div>
                </div>

                <div class="control-group">
                  {{Form::label('email','Email',['class'=>'control-label','title'=>'Email'])}}
                    <div class="controls">
                    {{Form::text('email',$contact->email,['id'=>'required','placeholder'=>'Email','title'=>'Email'])}}
                    </div>
                </div>

                <div class="control-group">
                  {{Form::label('phone','Phone',['class'=>'control-label','title'=>'Phone'])}}
                    <div class="controls">
                    {{Form::text('phone',$contact->phone,['id'=>'required','placeholder'=>'Phone','title'=>'Phone'])}}
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
@stop
