@extends('admin.index')
@section('Title','Addmission Test')
@section('breadcrumbs','Addmission Test')
@section('breadcrumbs_link','/addmission_test')
@section('breadcrumbs_title','Addmission Test')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('error') }}
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
                    <h2><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Addmission Test Result Entry </h2> <!-- Tab Heading  -->
         <p title="Transport Details">{{Session::get('school.system_name')}} Addmission Test Result Entry</p> <!-- Transport Details -->
        </div>    

        <div>
            <p style="color: red">Data Sequence : Exam Name > Class Name > Department Name > session > Shift > Default Batch</p>
        </div>

 {{Form::open(['url'=>'/addmission_test','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
  <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
            <tr style="height: 34px;color: #fff">
                <th>Exam</th>
                <th>Class</th>
                <th>Department</th>
                <th>Session</th>
                <th>Shift</th>
                <th>Medium</th>
                <th>Batch</th>
            </tr>
            </thead>


            <tbody>
            <tr>

                <td>
                  @php $addmission_test_array['']="--Select--"; @endphp
                  @foreach($admission_test as $admission_test_list)
                    @php $addmission_test_array[$admission_test_list->admission_test]=$admission_test_list->admission_test @endphp
                  @endforeach
                  {{Form::select('admission_test',$addmission_test_array,null,['id'=>'addmission_test','class'=>'ajax_test','style'=>'width:100%'])}}
                </td>

                <td>
                      
                 @php $class_array['']="--Select--"; @endphp
                 @foreach($class as $class_list)
                  @php $class_array[$class_list->class]=$class_list->class @endphp
                @endforeach
                 {{Form::select('class',$class_array,null,['id'=>'class_name','class'=>'ajax_test','style'=>'width:100%'])}}

                </td>

                <td>
                 @php $department_array['']="--Select--"; @endphp
                 @foreach($department as $department_list)
                  @php $department_array[$department_list->department]=$department_list->department @endphp
                @endforeach
                 {{Form::select('department',$department_array,null,['id'=>'department_name','class'=>'ajax_test','style'=>'width:100%'])}}
                </td>

                <td>
                  
                @php $session_array[$general_settings->default_session]=$general_settings->default_session; @endphp
                @foreach($session as $session_list)
                  @php $session_array[$session_list->session]=$session_list->session @endphp
                @endforeach

                {{Form::select('session',$session_array,null,['id'=>'session','class'=>'ajax_test','style'=>'width:100%','readonly'=>'readonly'])}}

                </td>
                <td>
                @php $shift_array['']="--Select--"; @endphp
                 @foreach($shift as $shift_list)
                  @php $shift_array[$shift_list->type_name]=$shift_list->type_name @endphp
                @endforeach
                {{Form::select('shift',$shift_array,null,['id'=>'shift','class'=>'ajax_test','style'=>'width:100%'])}}
                </td>
                <td>
                  
                @php $medium_array['']="--Select--"; @endphp
                 @foreach($medium as $medium_list)
                  @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                @endforeach

                {{Form::select('medium',$medium_array,null,['id'=>'medium','class'=>'medium','style'=>'width:100%'])}}

                </td>
     
                <td>
                @php 
                  $batch_data[$general_settings->default_batch]=$general_settings->default_batch;
                @endphp
                @foreach($batch as $batch_list)
                  @php $batch_data[$batch_list->type_name]=$batch_list->type_name @endphp
                @endforeach

                  
                {{Form::hidden('batch',$general_settings->default_batch,['id'=>'batch','placeholder'=>'Student Name','title'=>'student_name'])}}

                 {{Form::select('batch',$batch_data,null,['disabled'=>'disabled','id'=>'session','class'=>'','style'=>'width:100%'])}}
                </td>


            </tr>

            </tbody>
        </table>
              
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





        <div class="widget-box">
          <div class="widget-title"><span class="icon"> <i class="icon-ok-sign"></i> </span>
            <h5>Addmission Test Result Entry</h5>
          </div>
          <div class="widget-content">
                
            <div class="">
         {{Form::submit('Result Pass',['class'=>'btn tip-bottom btn btn-primary'])}}   
               <!--  <input type='submit' value='Result Pass' class='btn btn-primary'> -->
            </div>
            <br>
            <span id="addmission_test_student"></span>
            

            <div class="">
         {{Form::submit('Result Pass',['class'=>'btn tip-bottom btn btn-primary'])}}   
               <!--  <input type='submit' value='Result Pass' class='btn btn-primary'> -->
            </div>
          </div>

        </div>
{{Form::close()}}

@push('custom-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('extra_js/admission_test.js')}}"></script>
    <script type="text/javascript">
      $(document).on('keyup','.student_roll_rege',function(){
          var reg_no=$(this).val();
          $.ajax({
            url:"/check_reg_no_ex",
            type:"POST",
            data:{'reg_no':reg_no,'_token':"{{csrf_token()}}"},
            success:function(response)
            {
              if(response)
              {
                 toastr.error('Regestration No Already Exists');
                 return false;
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.error('Please Try Again Later.');
            }

          });
      });
    </script>
@endpush
@stop