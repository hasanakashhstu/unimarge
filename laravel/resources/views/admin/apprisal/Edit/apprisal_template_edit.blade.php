@extends('admin.index')
@section('Title','Student Apprisal Component')
@section('breadcrumbs','Student Apprisal Component')
@section('breadcrumbs_link','/student_apprisal_component')
@section('breadcrumbs_title','Student Apprisal Component')

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
  <h2><i class="fa fa-text-height" aria-hidden="true"></i> Apprisal Templete </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}  Apprisal Details</p>



 <div class='row'>
         
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
             
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
            <li><a href='/student_apprisal'><i class="fa fa-address-card-o" aria-hidden="true"></i> Apprisal</a></li>
            <li><a href='/apprisal_template_report'><i class="fa fa-list-alt" aria-hidden="true"></i>Template Report</a></li>
          

             <li><a href='/apprisal_template_report'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
             </ul>
          </div>
        </div>

    </div>











  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>Add Aprisal Templete
      </h5>
    </div>
    <div class="widget-content nopadding">
      {{Form::open(['url'=>"/student_apprisal_component/$template_details->template_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
        
        
        <div class="control-group" hidden="hidden">
           {{Form::label('template_id','template_id',['class'=>'control-label'])}}
          <div class="controls">
            {{Form::text('template_id',$template_details->template_id,['id'=>'required'])}}
          </div>
        </div>


        <div class="control-group">
           {{Form::label('title','Appraisal Template Title',['class'=>'control-label'])}}
          <div class="controls">
            {{Form::text('title',$template_details->title,['id'=>'required','disabled'=>'disabled'])}}
          </div>
        </div>



        <div hidden="hidden" class="control-group">
           {{Form::label('title','Appraisal Template Title',['class'=>'control-label'])}}
          <div class="controls">
            {{Form::text('title',$template_details->title,['id'=>'required'])}}
          </div>
        </div>


        
        <div class="control-group">
          {{Form::label('active_status','Is Active',['class'=>'control-label'])}}
          <div class="controls">
            @php 
        $activate_status_array=[$template_details->active_status=>$template_details->active_status,'Yes'=>'Yes','No'=>'No'];
               
            @endphp
            {{Form::select('active_status',$activate_status_array)}}
          </div>
        </div>







        <div class="control-group">
          <label class="control-label">
          </label>
          <div class="controls">
            <div class='container text-center'><button class="add_field_button btn btn-info">Add New Row</button></div>
            <table class="table address input_fields_wrap">
              <thead>
                <tr>
                  <th>KRA</th>
                  <th>Weightage(%)</th>
                  <th></th>
                  
                  
                </tr>
              </thead>
              <tbody>
                @php $a=1 @endphp
               @foreach($template_child_details as $template_child_details_data)
                <tr >
                    <td>
                      {{Form::text('kra[]',$template_child_details_data->kra,['id'=>'a_table'])}}
                    </td>
                    <td>
                {{Form::text('weightage[]',$template_child_details_data->weightage,['id'=>'a_table','class'=>'hundered_validation_check check_'.$a,'weightage'=>'1'])}}
                    </td>
                   <td>
                   <a href='#' class=' btn btn-danger' disabled><i class='fa fa-trash' aria-hidden='true'></i>
                   </a>
                   </td>                  
                </tr>
                @php $a++ @endphp
                @endforeach
                <font color="red">Note : Weightage(%) Must be calculate on 100  .  Old Component You can't Deleted :)</font>

              </tbody>
            </table>

            <input type="hidden" title="sl_count_for_max_field_purpose" value="<?=$a-1?>" name="current_max_field" class='current_max_field'>
          </div>
        </div>
     







       
        
       
      
       
        <div class="form-actions">
          <input type="submit"  value="Update" class="btn btn-success submit_button">
        </div>
      {{Form::close()}}
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/apprisal_template_edit.js')}}"></script>
@endpush

@stop
