@extends('admin.index')
@section('Title','setup')
@section('breadcrumbs','setup')
@section('breadcrumbs_link','/setup')
@section('breadcrumbs_title','setup')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
      <h2><i class="fa fa-cog" aria-hidden="true"></i>&nbsp System Configuration</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}} System Basic Configuration</p> <!-- Transport Details -->


  


<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
           <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Semester</h5>
        </div>
        <div class="widget-content nopadding">
        

<div class="container">
   <!-- Tab Heading  -->

      <!-- <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#report1"><i class="fa fa-bars" aria-hidden="true"></i> Session List</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Session </a></li>
      </ul> -->



  <div class="tab-content" style="width:545px;"> <!-- Transport List Report  -->

        
      <!-- <div id="menu1" class="tab-pane fade"> -->
          <div class="widget-box">
            

              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('Semester','',['class'=>'control-label'])}}
                      <div class="controls">
                        {{Form::hidden('type','Semester',['title'=>'semester_name'])}}
                        {{Form::text('type_name','',['title'=>'semester_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>




      <!-- </div> -->
      <div id="report1" class="tab-pane fade in active" >

          <div style="margin-bottom: 20px">
              @foreach($semester_data as $semester_list)
                  <div class="col-xs-12">
                      <div style="width: 50%;float: left" class="col-xs-6 text-center">{{$semester_list->type_name}}</div>
                      <div id="my_align"  style="width: 50%;float: left" class="col-xs-6 display_status">
                          {{Form::open(['url'=>"/setup/$semester_list->id/edit",'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                          {{Form::close()}}
                          {{Form::open(['url'=>"/setup/$semester_list->id",'method'=>'DELETE'])}}
                          {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                          {{Form::close()}}

                      </div>
                  </div>
              @endforeach
          </div>



     </div>
  </div>
</div>

        </div>
       </div>

           <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Session</h5>
        </div>
        <div class="widget-content nopadding">


<div class="container">
   <!-- Tab Heading  -->

      <!-- <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#report1"><i class="fa fa-bars" aria-hidden="true"></i> Session List</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Session </a></li>
      </ul> -->



  <div class="tab-content" style="width:545px;"> <!-- Transport List Report  -->


      <!-- <div id="menu1" class="tab-pane fade"> -->
          <div class="widget-box">


              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}


                    <div class="control-group">
                      {{Form::label('session','',['class'=>'control-label'])}}
                      <div class="controls">
                        {{Form::hidden('type','Session',['title'=>'session_name'])}}
                        {{Form::text('type_name','',['title'=>'session_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>




      <!-- </div> -->
      <div id="report1" class="tab-pane fade in active" >

          <div style="margin-bottom: 20px">
              @foreach($session_data as $session_list)
                  <div class="col-xs-12">
                      <div style="width: 50%;float: left" class="col-xs-6 text-center">{{$session_list->type_name}}</div>
                      <div id="my_align"  style="width: 50%;float: left" class="col-xs-6 display_status">
                          {{Form::open(['url'=>"/setup/$session_list->id/edit",'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                          {{Form::close()}}
                          {{Form::open(['url'=>"/setup/$session_list->id",'method'=>'DELETE'])}}
                          {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                          {{Form::close()}}

                      </div>
                  </div>
              @endforeach
          </div>



     </div>
  </div>
</div>

        </div>
       </div>








     
      <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Add Work Department</h5>
                    </div>
        <div class="widget-content nopadding">
        

<div class="container">

  <div class="tab-content" style="width:545px;"> 
                       <!-- Transport List Report  -->
         <div class="widget-box">
             

              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('work_department_name','',['class'=>'control-label'])}}
                      <div class="controls">
                           {{Form::hidden('type','work Department',['title'=>'work_department_name'])}}
                           {{Form::text('type_name','',['title'=>'work_department_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Work Department'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
        <div id="report2" class="tab-pane fade in active">
            <div class="widget-box">
                

            <div class="widget-content nopadding">
              <table class="table">

                  <tbody>
                      @foreach($work_department_data as $work_department_list)
                    <tr class="gradeX">
                       
                       
                      <td>{{$work_department_list->type_name}}</td>
                      
                      <td id="my_align" class="display_status">
                        {{Form::open(['url'=>"/setup/$work_department_list->id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/setup/$work_department_list->id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
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

        </div>
       </div>
    </div>




    <div class="span6">
       <div class="widget-box">
     <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Job Type</h5>
        </div>
        <div class="widget-content nopadding">
        

<div class="container">
  



  <div class="tab-content" style="width:545px;"> <!-- Transport List Report  -->
   
         <div>
          <div class="widget-box">
             
              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('Job Type_name','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::hidden('type','Job Type',['title'=>'job_type_name'])}}
                      {{Form::text('type_name','',['title'=>'job_type_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
         </div>


        <div id="report3" class="tab-pane fade in active">
            <div class="widget-box">
               

            <div class="widget-content nopadding">
              <table class="table">

                  
                   <tbody>
                    @foreach($job_type_data as $job_type_list)
                    <tr class="gradeX">
                       
                       
                      <td>{{$job_type_list->type_name}}</td>
                      
                      <td id="my_align" class="display_status">
                        {{Form::open(['url'=>"/setup/$job_type_list->id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/setup/$job_type_list->id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
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

        </div>
       </div>





      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Shift</h5>
        </div>
        <div class="widget-content nopadding">
        

<div class="container">
   <!-- Tab Heading  -->



  <div class="tab-content" style="width:545px;"> <!-- Transport List Report  -->
        <div>
          <div class="widget-box">
             
              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('Shift Name','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::hidden('type','Shift',['title'=>'shift_name'])}}
                      {{Form::text('type_name','',['title'=>'shift_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
      </div>


        <div id="report4" class="tab-pane fade in active">
            <div class="widget-box">
                

            <div class="widget-content nopadding">
              <table class="table ">

                  

                  <tbody>
                      @foreach($shift_data as $shift_list)
                    <tr class="gradeX">
                       
                       
                      <td>{{$shift_list->type_name}}</td>
                      
                      <td id="my_align" class="display_status">
                        {{Form::open(['url'=>"/setup/$shift_list->id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/setup/$shift_list->id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
                      </td>
                    </tr>
               @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>

      <div id="menu4" class="tab-pane fade">
        
      </div>
  </div>







</div>

        </div>
      </div>
    </div>











 <div class="span6">
       <div class="widget-box">
     <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Batch</h5>
        </div>
        <div class="widget-content nopadding">
        

<div class="container">
  



  <div class="tab-content" style="width:545px;"> <!-- Batch List Report  -->
   
         <div>
          <div class="widget-box">
             
              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('Batch Name','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::hidden('type','Batch',['title'=>'batch_name'])}}
                      {{Form::text('type_name','',['title'=>'batch_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
         </div>


        <div id="report3" class="tab-pane fade in active">
            <div class="widget-box">
               

            <div class="widget-content nopadding">
              <table class="table">

                  
                   <tbody>
                    @foreach($batch_data as $batch_data_list)
                    <tr class="gradeX">
                       
                       
                      <td>{{$batch_data_list->type_name}}</td>
                      
                      <td id="my_align" class="display_status">
                        {{Form::open(['url'=>"/setup/$batch_data_list->id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/setup/$batch_data_list->id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
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

        </div>
       </div>





    </div>


 <div class="span6">
       <div class="widget-box">
     <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Faculty</h5>
        </div>
        <div class="widget-content nopadding">
        

<div class="container">
  



  <div class="tab-content" style="width:545px;"> <!-- Batch List Report  -->
   
         <div>
          <div class="widget-box">
             
              <div class="widget-content nopadding">
              {{Form::open(['url'=>'/setup','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('Faculty Name','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::hidden('type','Medium',['title'=>'faculty_name'])}}
                      {{Form::text('type_name','',['id'=>'required','placeholder'=>'Faculty Name','title'=>'Faculty Name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Faculty'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
         </div>


        <div id="report3" class="tab-pane fade in active">
            <div class="widget-box">
               

            <div class="widget-content nopadding">
              <table class="table">

                  
                   <tbody>
                    @foreach($medium_data as $medium_data_list)
                    <tr class="gradeX">
                       
                       
                      <td>{{$medium_data_list->type_name}}</td>
                      
                      <td id="my_align" class="display_status">
                        {{Form::open(['url'=>"/setup/$medium_data_list->id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/setup/$medium_data_list->id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                        {{Form::close()}}
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

        </div>
       </div>





    </div>


















  </div>
</div>



@stop