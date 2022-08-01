@extends('admin.index')
@section('Title','Manage Marks Edit')
@section('breadcrumbs','Manage Marks Edit')
@section('breadcrumbs_link','/manage_marks')
@section('breadcrumbs_title','Manage Marks')
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
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   



<div class="container">
  <div class="alert alert-info" style="margin-top: 27px;">
      <strong>Warning!</strong> <br>If u change any student one component mark enter all component mark again. 
</div>
  <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Student Exam Manage Marks Edit</h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">I School Managment  Student Exam Manage Marks Edit Details</p>
  <!-- Transport Details -->
    



{{Form::open(['url'=>"/manage_marks_edit",'class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

  <div class="widget-box">

      <div class="widget-title">
        <span class="icon"><i class="icon-info-sign"></i></span><h5>Add Exam Manage Marks</h5>
      </div>
  <input type="hidden" value="<?=time()?>" name="mark_evulation">

    <div class="widget-content padding">
     
        <div class="control-group">
          <table class="table address">
            <thead>
              <tr>
                <th>Exam</th>
                <th>Class</th>
                <th>Section</th>
                <th>Department</th>
                <th>subject</th>
                <th>Default Session</th>
                <th>Action</th>
              </tr>
            </thead>
        

            <tbody>
                <tr>
    @php $exam_list_array['']="" @endphp              
    @foreach($exam_list as $exam_list_data)
      @php $exam_list_array[$exam_list_data->exam_name]=$exam_list_data->exam_name @endphp
    @endforeach

 @php $class_list_data_array['']="" @endphp 
    @foreach($class_list as $class_list_data)
      @php $class_list_data_array[$class_list_data->class_name]=$class_list_data->class_name @endphp
    @endforeach

    <td>{{Form::select('exam_name',$exam_list_array,null,['id'=>'exam_info','style'=>'width: 126px'])}}</td>
    <td>{{Form::select('class_name',$class_list_data_array,null,['style'=>'width: 126px','id'=>'class_info'])}}</td>
    <td>{{Form::select('section',[''=>'Section Name'],null,['id'=>'section_info','style'=>'width: 126px'])}}</td>
    <td>{{Form::select('Department',[''=>'Department Name'],null,['id'=>'Department_info','style'=>'width: 126px','class'=>'department'])}}</td>
    <td>{{Form::select('subject',[''=>'subject Name'],null,['id'=>'subject_info','style'=>'width: 126px'])}}</td>
    <td>
       @php 
        $session_list_array[]='--Select--';
        $session_list_array[$general_settings->default_session]=$general_settings->default_session;
      @endphp
      @foreach($session as $session_list)
            @php $session_list_array[$session_list->type_name]=$session_list->type_name @endphp
      @endforeach

      {{Form::select('default_session',$session_list_array,null,['id'=>'default_session','style'=>'width: 126px'])}}</td>
    <td>{{Form::button('Manage Mark',['class'=>'btn btn-success','id'=>'manage_mark_edit_button','style'=>'width: 126px'])}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      
    </div>
  </div>



<div class="container">
    <div class="row text-center">
        <div class="col-sm-4"></div>
      
          <div class="col-sm-4" >
            <div class="tile-stats tile-gray">
              <div class="icon"><i class="entypo-chart-area"></i></div>
              <h3 style="color: #34495e;">Exam Manage Marks</h3>
              <h4 style="color: #34495e;">Section</h4>
              <h4 style="color:#34495e;"></h4>
            </div>
          </div>
          <div class="col-sm-4"></div>
    </div>
    <br></br>
    <br></br>


      
  
      <div class="table-responsive"> 
      <!--  <table class="table table-condensed table-responsive" id="registered_participants">
         <thead style="background: #F6F6F6;"  >
           <tr>
                <td rowspan='2'>SL NO</td>
               <td  rowspan='2'>Student Name</td>
               <td rowspan='2'>Roll</td>
               <td  class='colspan_value_on_component'>Component</td>
               <td rowspan='2'>CGPA</td>
               <td rowspan='2'>GRADE</td>
               <td rowspan='2'>Comment</td>
           </tr>  
           <tr class="student_data_show_on_thead">

           </tr>
         </thead>
         <tbody class="student_data_show">

         </tbody >
       </table> -->
       <div  class="edit_table">
       </div>
      </div>
    

    <div style="text-align: center;" id="edit_button" hidden="hidden">
  
      <button type="submit" class="btn btn-success" id="submit_button_for_edit"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Save Changes</button>
  
    </div>
   
  </div>
</div>
  
{{Form::close()}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>
        <script type="text/javascript">
          $(document).ready(function(){
              $(".department").change(function(){
                 var class_name=$("#class_info").val();
                 var section_info=$("#section_info").val();
                 var department=$(this).val();
                 $.ajax({
                      url:"/department_wise_subject_get",
                      type:"POST",
                      data:{
                        'class_name':class_name,
                        'section_info':section_info,
                        'department':department,
                        '_token':"{{csrf_token()}}"
                      },
                      success:function(response){
                        $("#subject_info").html(response);
                      }
                 });
              });
          });
        </script>
@endpush

@stop












