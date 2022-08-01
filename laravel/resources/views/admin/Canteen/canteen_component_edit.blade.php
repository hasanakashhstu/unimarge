@extends('admin.index')
@section('Title','canteen_component')
@section('breadcrumbs','Canteen Component')
@section('breadcrumbs_link','canteen_component')
@section('breadcrumbs_title','canteen_component')
@section('content')

@section('content')


@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
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
    <h2><i class="fa fa-list" aria-hidden="true"></i> Canteen Component</h2> <!-- Tab Heading  -->
  <p title="Transport Details">Canteen Component Details</p> <!-- Transport Details -->

   <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/assign_dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Assign Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div> 
        <div>
          <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Canteen Component</h5>
              </div>

              <div class="widget-content nopadding">
              {{Form::open(['url'=>"/canteen_component/$canteen_component_data->canteen_component_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                 <div class="control-group">
                 {{Form::label('component_title','Component Title',['class'=>'control-label','title'=>'component_title'])}}
              <div class="controls">
               {{Form::text('component_title',$canteen_component_data->component_title,['id'=>'required','placeholder'=>'Component Title','title'=>'component_title'])}}

              </div>
            </div>

            <div class="control-group">
                {{Form::label('Description','',['class'=>'control-label'])}}
              <div class="controls">
                {{Form::textarea('description',$canteen_component_data->description,['col'=>'20','rows'=>'4','title'=>'description'])}}

              </div>
            </div>


                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
      </div>




@stop
