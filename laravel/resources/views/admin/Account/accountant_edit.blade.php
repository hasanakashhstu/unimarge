
@extends('admin.index')
@section('Title','Accountant')
@section('breadcrumbs','Accountant')
@section('breadcrumbs_link','/accountant')
@section('breadcrumbs_title','Accountant')

@section('content')



@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
  		<h2> <i class="fa fa-check-square-o" aria-hidden="true">
    </i> Accountant Details Edit</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Accountant Details Edit</p><br/> <!-- Transport Details -->
  


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
             
           <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Create New Payment</a></li>
            <li><a href='/accountant'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>
</div>


  <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-plus" aria-hidden="true"></i> Add New Article</a></li>

        </ul>
      </div>
    </div>


    <div class="tab-content">
    <br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/accountant_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/accountant_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/accountant_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>




        <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test'>
         
      </div>
    </div>



			 <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Teacher</h5>
          </div>
          <div class="widget-content nopadding">
            {{Form::open(['url'=>"/accountant/$accountant->accontant_id",'files'=>true,'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}
     <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$accountant->medium=>$accountant->medium]
            @endphp
            @foreach($medium as $medium_data)
              @php
                $medium_array[$medium_data->type_name]=$medium_data->type_name
              @endphp
            @endforeach
            {{Form::select('medium',$medium_array,null,['class'=>'medium','id'=>'medium'])}}
          </div>
        </div>

              <div class="control-group">
								{{Form::label('teacher_name','Accountant Name:',['class'=>'control-label','title'=>'Teacher Name'])}}
                
                      <div class="controls">
                {{Form::text('accountant_name',$accountant->accountant_name,['id'=>'required','title'=>'accountant_name','placeholder'=>'Accountant Name'])}}
                
              </div>
            </div>
              
              

              <div class="control-group">
               {{Form::label('father_name','Fathers Name:',['class'=>'control-label','title'=>'Father Name'])}}
                <div class="controls">
                  {{Form::text('fathers_name',$accountant->fathers_name,['id'=>'required','title'=>'fathers_name','placeholder'=>'Fathers Name'])}}
                </div>
              </div>

              <div class="control-group">
                {{Form::label('mothers_name','Mother Name:',['class'=>'control-label','title'=>'Mother Name'])}}
                <div class="controls">
                    {{Form::text('mothers_name',$accountant->mothers_name,['id'=>'required','title'=>'mothers_name','placeholder'=>'Mother Name'])}}                  
                </div>
              </div>
              <div class="control-group">
                   {{Form::label('birth_date','Birth Date:',['class'=>'control-label','title'=>'Birth date'])}}
                <div class="controls">
                    {{Form::date('birth_date',$accountant->birth_date,['title'=>'birth_date'])}}
                </div>
              </div>



              <div class="control-group">
                  {{Form::label('gender','Gender',['class'=>'control-label','title'=>'gender'])}}
                <div class="controls">

                    {{Form::select('gender',[$accountant->gender=>$accountant->gender,'Male' => 'Male', 'Female' => 'Female', 'Others'=>'Others'])}}
                    
                </div>
              </div>

                  <div class="control-group">
                      {{Form::label('maritual_status','Marital Status',['class'=>'control-label','title'=>'Marital Status'])}}
                            <div class="controls">
                                {{Form::select('marital_status',[$accountant->marital_status=>$accountant->marital_status,'Married' => 'Married', 
                                'Unmarried' => 'Unmarried'])}}                                
                              </div>
                            </div>

                      <div class="control-group">
                        {{Form::label('religion','Religion',['class'=>'control-label','title'=>'religion'])}}
                              <div class="controls">
                                            {{Form::select('religion', [$accountant->religion=>$accountant->religion,'Islam' => 'Islam', 
                                            'Hindu' => 'Hindu',
                                            'Buddhist'=>'Buddhist',
                                            'Khristan'=>'Khristan'])}}                                  
                                        </div>
                                      </div>

                      

                      <div class="control-group">
                          {{Form::label('mobil_no','Mobile No',['class'=>'control-label','title'=>'Mobile No'])}}
                                      <div class="controls">
                                        {{Form::number('mobile_no',$accountant->mobile_no,['id'=>'required','title'=>'mobile_no','placeholder'=>'Mobile No'])}}
                                      </div>
                                    </div>

                      <div class="control-group">
                             {{Form::label('job_type','Job Type',['class'=>'control-label','title'=>'Job Type'])}} 
                                      <div class="controls">
                                      
                                      @php $job_type_list_array[$accountant->job_type]=$accountant->job_type @endphp
                                      @foreach($job_type as $job_type_list)
                                        @php
                                           $job_type_list_array[$job_type_list->type_name]=$job_type_list->type_name;
                                        @endphp
                                      @endforeach

                                           {{Form::select('job_type',$job_type_list_array)}} 
                                            </div>
                                          </div>



                        <div class="control-group">
                             {{Form::label('work_department','Work Department',['class'=>'control-label','title'=>'Work Department'])}}
                                      <div class="controls">

                            @php $working_department_list_array[$accountant->work_department]=$accountant->work_department @endphp
                                      @foreach($working_department as $working_department_list)
                                        @php
                                           $working_department_list_array[$working_department_list->type_name]=$working_department_list->type_name;
                                        @endphp
                                      @endforeach


                                                {{Form::select('work_department',$working_department_list_array)}}  
                                        </div>
                                    </div>

              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">


                    <table class="table address">
                      <thead>
                        <tr>
                          <th>Post Office</th>
                          <th>Home District</th>
                          <th>Division</th>
                          <th>Village Name</th>
                          <th>Home Name</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        if($accountant_address_child)
                        {
                      ?>
                       <tr>
                          <td>{{Form::text('post_office',$accountant_address_child->post_office,['id'=>'a_table','title'=>'post_office','placeholder'=>'Post Office'])}} </td>
                          <td>{{Form::text('home_district',$accountant_address_child->home_district,['id'=>'a_table','title'=>'home_district','placeholder'=>'Home District'])}}</td>
                           <td>{{Form::text('division',$accountant_address_child->division,['id'=>'a_table','title'=>'division','placeholder'=>'Division'])}} </td>
                            <td>{{Form::text('village_name',$accountant_address_child->village_name,['id'=>'a_table','title'=>'village_name','placeholder'=>'Village Name'])}} </td>
                             <td>{{Form::text('home_name',$accountant_address_child->home_name,['id'=>'a_table','title'=>'home_name','placeholder'=>'Home Name'])}} </td>
                        </tr>
                        <?php
                      }
                      else
                          {
                            ?>

                            <tr>
                          <td>{{Form::text('post_office',null,['id'=>'a_table','title'=>'post_office','placeholder'=>'Post Office'])}} </td>
                          <td>{{Form::text('home_district',null,['id'=>'a_table','title'=>'home_district','placeholder'=>'Home District'])}}</td>
                           <td>{{Form::text('division',null,['id'=>'a_table','title'=>'division','placeholder'=>'Division'])}} </td>
                            <td>{{Form::text('village_name',null,['id'=>'a_table','title'=>'village_name','placeholder'=>'Village Name'])}} </td>
                             <td>{{Form::text('home_name',null,['id'=>'a_table','title'=>'home_name','placeholder'=>'Home Name'])}} </td>
                        </tr>

                            <?php

                          }
                        ?>
                      </tbody>
                    </table>



                  </div>
              </div>

                            <div class="control-group">
                              <label class="control-label">Qualification</label>
                              <div class="controls">
                                  <table class="table address">
                                    <thead>
                                      <tr>
                                        <th>Degree Name</th>
                                        <th>Board Name</th>
                                        <th>Passing Year</th>
                                        <th>Department Name</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      if ($accountant_qualification_child) {
                                        
                                     
                                    ?>
                                     <tr>
                                        <td>{{Form::text('degree_name',$accountant_qualification_child->degree_name,['id'=>'a_table','title'=>'degree_name','placeholder'=>'Degree Name'])}} </td>
                                        <td>{{Form::text('board_name',$accountant_qualification_child->board_name,['id'=>'a_table','title'=>'board_name'])}} </td>
                                         <td>{{Form::text('passing_year',$accountant_qualification_child->passing_year,['id'=>'a_table','title'=>'passing_year'])}} </td>
                                          <td>{{Form::text('department_name',$accountant_qualification_child->department_name 	,['id'=>'a_table','title'=>'department_name'])}} </td>
                                      </tr>
                                      <?php
                                       }
                                       else
                                       {
                                        ?>

                                        <tr>
                                        <td>{{Form::text('degree_name',null,['id'=>'a_table','title'=>'degree_name','placeholder'=>'Degree Name'])}} </td>
                                        <td>{{Form::text('board_name',null,['id'=>'a_table','title'=>'board_name'])}} </td>
                                         <td>{{Form::text('passing_year',null,['id'=>'a_table','title'=>'passing_year'])}} </td>
                                          <td>{{Form::text('department_name',null,['id'=>'a_table','title'=>'department_name'])}} </td>
                                      </tr>

                                        <?php
                                       }
                                      ?>
                                    </tbody>
                                  </table>



                                </div>
                            </div>
             

             



              <script type="text/javascript">

                   function readURL(input) {


                      if (input.files && input.files[0])
                      {
                          var reader = new FileReader();

                          reader.onload = function (e) {
                              $('#blah')
                                  .attr('src', e.target.result)
                                  .width(200)
                                  .height(200);
                          };

                          reader.readAsDataURL(input.files[0]);
                      }


                    }
              </script>

              <div class="control-group">
						{{Form::label('photo','Photo:',['class'=>'control-label','title'=>'upload_photo'])}}
                <!-- <label class="control-label">Photo</label> -->
                <div class="controls">
                  <input type="file" name="image" onchange="readURL(this);">
                  </div>
              </div>

              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    {{Form::image("img/backend/accountant/$accountant->accontant_id.jpg",'Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                  <!-- <img id='blah'  src="img/blankavatar.png"  alt="your image" class='img-responsive img-circle blank_applicant_student_image' /> -->
                  </div>
              </div>





					<div class="form-actions">
                <input type="submit" value="UPDATE" class="btn btn-success" id="submit_button" >
              </div>
							{{Form::close()}}
            <!-- </form> -->
          </div>
        </div>
</div>

    <script type="text/javascript">
     function password_len_check()
     {
        var password_length_for_password=$("#password").val().length;

         if(password_length_for_password < 8)
         {
         $("#help_block").html("<font color='red'>password weak</font>");
         }
         else
         {
         $("#help_block").html("<font color='green'>password strong</font>");
        }

    }

       $(document).ready(function(){
                                $("#password_show_button").mouseup(function(){

                                    $("#password").attr("type", "password");
                                });
                                $("#password_show_button").mousedown(function(){
                                    $("#password").attr("type", "text");

                                });
                            });


     function password_match()
     {
       var password_get=$("#password").val();
       var confiram_password_get=$("#password_confirm").val();            
       if(password_get==confiram_password_get)
       {
       $("#password_match").html("<font color='green'>password Match</font>");
       $("#submit_button").attr('disabled',false);
       }
       else
       {
       $("#password_match").html("<font color='red'>password Not Match</font>");
        $("#submit_button").attr('disabled',true);
       }
     }

</script>    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/accountant_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
           
@stop
