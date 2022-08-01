@extends('admin.index')
@section('Title','Salary Components')
@section('breadcrumbs','Salary Components')
@section('breadcrumbs_link','/salary_component')
@section('breadcrumbs_title','Salary Components')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Error!</strong> {{ Session::get('error') }}
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
  <h2>
    <i class="fa fa-pencil-square" aria-hidden="true"></i> Parents Information Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">I School Managment  Parent's Info Edit Details</p>





</div>



<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/salary_slip'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Salary Slip</a></li>
            <li><a href='/salary_slip_report'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Salary Slip Report</a></li>
            
            <li><a href='/salary_structure'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Salary Strucuture</a></li>
            
            <li><a href='/salary_component'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>


      <div>
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-info-sign">
              </i>
            </span>
            <h5>Add New Components
            </h5>
          </div>
          <div class="widget-content nopadding">
          {{Form::open(['url'=>"/salary_component/$salary_component_info->salary_component_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','files'=>'true','novalidate'=>'novalidate'])}}
              <div class="control-group">
                {{Form::label('components_name','Components Name',['class'=>'control-label','title'=>'components_name'])}}
                <div class="controls">
                 {{Form::text('components_name',$salary_component_info->components_name,['id'=>'required','placeholder'=>'Components Name','title'=>'components_name'])}}
                </div>
              </div>

              <div class="control-group">
               {{Form::label('abbr','Abbr',['class'=>'control-label','title'=>'abbr'])}}
                <div class="controls">
                 {{Form::text('abbr',$salary_component_info->abbr,['id'=>'required','placeholder'=>'Abbr','title'=>'abbr'])}}
                </div>
              </div>

              <div class="control-group">
               {{Form::label('type','Type',['class'=>'control-label','title'=>'type'])}}
            
                <div class="controls">

                {{Form::select('type',['Earning'=>'Earning','Deduction'=>'Deduction'])}}

                  </select>
                </div>
              </div>
              <div class="form-actions">
                 {{Form::submit('submit',['value'=>'Update','class'=>'btn btn-success'])}}
                  </div>
                  {{Form::close()}}
   
          </div>
        </div>
      </div>
 
    @stop