@extends('admin.index')
@section('Title','Accountant')
@section('breadcrumbs','Accountant')
@section('breadcrumbs_link','/accountant')
@section('breadcrumbs_title','Manage Accountant')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (Session::has('Error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('Error') }}
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

 <div class="alert alert-info">
      <strong>Warning!</strong> <br>System Automatic Create Admin If You are fill up Email and Password
</div>


		
	<div class="container">
  		<h2><i class="fa fa-user-o" aria-hidden="true"></i> Add Accountant</h2> <!-- Tab Heading  -->
 		 <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Add Accountant Details</p><br/> <!-- Transport Details -->


    <div class='row'>
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'> 
                <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
                 
               <li><a href='/create_template'><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
                <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; NoticeBoard</a></li>
             </ul>
          </div>
        </div>
    </div>



    <div class="tab-content">
    

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




			  <ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Accountant List</a></li>
			    <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Accountant</a></li>
			  </ul>

		  

		<div class="tab-content"> <!-- Transport List Report  -->
		    	
		    	<div id="home" class="tab-pane fade in active">
		      		<div class="widget-box">
          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            				<h5>Data table</h5>
          				</div>

          		<div class="widget-content nopadding">
		            <table class="table table-bordered data-table">
		              
			              <thead>
			                <tr>
                        <th>Medium</th>
                        <th>Accountant Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Job Type</th>
                        <th>Department</th>
                        <th>Actions</th>
                      </tr>
			              </thead>


			              <tbody>
			               @foreach($accountet_list as $accountent_data)
			                <tr class="gradeX">
                        <td>{{$accountent_data->medium}}</td>
			                  <td>{{$accountent_data->accountant_name}}</td>
                        <td>{{$accountent_data->mobile_no}}</td>
                        <td>{{$accountent_data->email}}</td>
                        <td>{{$accountent_data->job_type}}</td>
                        <td>{{$accountent_data->work_department}}</td>
			                  <td class="center">

                          <div class="display_status">
                                    {{Form::open(['url'=>"accountant/$accountent_data->accontant_id/edit" ,'method'=>'GET'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                                    {{Form::close()}}
                                    

                                    {{Form::button('DELETE',['class'=>'btn btn-danger applicant_student_delete','value'=>$accountent_data->accontant_id,])}}


                           </div>
                        </td>
			                </tr>
                     @endforeach 
                    
			               
			                
			              </tbody>
            			</table>
          			</div>
        		</div>
		    </div>
		    
        
		    




		    <div id="menu1" class="tab-pane fade">
		      	



		    	<div >
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Accountant</h5>
          </div>
          <div class="widget-content nopadding">
            {{Form::open(['url'=>'/accountant','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}
              
     <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[''=>'--select--']
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
                {{Form::label('accountant_name','Accountant Name:',['class'=>'control-label','title'=>'Accountant Name'])}}
                
                      <div class="controls">
                {{Form::text('accountant_name','',['id'=>'required','title'=>'accountant_name','placeholder'=>'Accountant Name'])}}
                
              </div>
            </div>

            <div class="control-group">
               {{Form::label('father_name','Fathers Name:',['class'=>'control-label','title'=>'Father Name'])}}
                <div class="controls">
                  {{Form::text('fathers_name','',['id'=>'required','title'=>'fathers_name','placeholder'=>'Fathers Name'])}}
                </div>
             </div>

              <div class="control-group">
                {{Form::label('mothers_name','Mother Name:',['class'=>'control-label','title'=>'Mother Name'])}}
                <div class="controls">
                    {{Form::text('mothers_name','',['id'=>'required','title'=>'mothers_name','placeholder'=>'Mother Name'])}}                  
                </div>
              </div>
              <div class="control-group">
                   {{Form::label('birth_date','Birth Date:',['class'=>'control-label','title'=>'Birth date'])}}
                <div class="controls">
                    {{Form::date('birth_date','',['title'=>'birth_date'])}}
                </div>
              </div>



              <div class="control-group">
                  {{Form::label('ginder','Gender',['class'=>'control-label','title'=>'gender'])}}
                <div class="controls">
                    {{Form::select('gender',['Male' => 'Male', 'Female' => 'Female', 'Others'=>'Others'])}}
                    
                </div>
              </div>

                  <div class="control-group">
                      {{Form::label('maritual_status','Marital Status',['class'=>'control-label','title'=>'Marital Status'])}}
                            <div class="controls">
                                {{Form::select('marital_status',['Married' => 'Married', 
                                'Unmarried' => 'Unmarried'])}}                                
                              </div>
                            </div>

                      <div class="control-group">
                        {{Form::label('religion','Religion',['class'=>'control-label','title'=>'religion'])}}
                              <div class="controls">
                                            {{Form::select('religion', ['Islam' => 'Islam', 
                                            'Hindu' => 'Hindu',
                                            'Buddhist'=>'Buddhist',
                                            'Khristan'=>'Khristan'])}}                                  
                                        </div>
                                      </div>

                        <div class="control-group">
                         {{Form::label('email','Email',['class'=>'control-label','title'=>'Email'])}}                     
                                    <div class="controls">
                                        {{Form::email('email','',['id'=>'required','title'=>'email','placeholder'=>'@email'])}}
                                    </div>
                      </div>

                      <div class="control-group">
                          {{Form::label('mobil_no','Mobile No',['class'=>'control-label','title'=>'Mobile No'])}}
                                      <div class="controls">
                                        {{Form::number('mobile_no','',['id'=>'required','title'=>'mobile_no','placeholder'=>'Mobile No'])}}
                                      </div>
                                    </div>

                      <div class="control-group">
                             {{Form::label('job_type','Job Type',['class'=>'control-label','title'=>'Job Type'])}} 
                                      <div class="controls">
                                      @php $job_type_list_array=[] @endphp
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

                                       @php $working_department_list_array=[] @endphp
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
                       <tr>
                          <td>{{Form::text('post_office','',['id'=>'a_table','title'=>'post_office','placeholder'=>'Post Office'])}} </td>
                          <td>{{Form::text('home_district','',['id'=>'a_table','title'=>'home_district','placeholder'=>'Home District'])}}</td>
                           <td>{{Form::text('division','',['id'=>'a_table','title'=>'division','placeholder'=>'Division'])}} </td>
                            <td>{{Form::text('village_name','',['id'=>'a_table','title'=>'village_name','placeholder'=>'Village Name'])}} </td>
                             <td>{{Form::text('home_name','',['id'=>'a_table','title'=>'home_name','placeholder'=>'Home Name'])}} </td>
                        </tr>
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
                                     <tr>
                                        <td>{{Form::text('degree_name','',['id'=>'a_table','title'=>'degree_name','placeholder'=>'Home Name'])}} </td>
                                        <td>{{Form::text('board_name','',['id'=>'a_table','title'=>'board_name'])}} </td>
                                         <td>{{Form::text('passing_year','',['id'=>'a_table','title'=>'passing_year'])}} </td>
                                          <td>{{Form::text('department_name','',['id'=>'a_table','title'=>'department_name'])}} </td>
                                      </tr>
                                    </tbody>
                                  </table>



                                </div>
                            </div>
              <div class="control-group">
                {{Form::label('password','Password',['class'=>'control-label','title'=>'Password'])}}
                <div class="controls">
                 {{Form::password('password',['id'=>'password','onkeyup'=>'password_len_check()', 'title'=>'password'])}}
                    <span class="add-on" style="width:0%" id="password_show_button" ><i class="fa fa-eye-slash" aria-hidden="true"></i></span>  
                    <br>
                    <span id="help_block"></span>
                </div>

              </div>

              <div class="control-group">
                  {{Form::label('confiram_password','Confiram Password',['class'=>'control-label','title'=>'Confirm Password'])}}
                <div class="controls" >
                   {{Form::password('password',['id'=>'password_confirm','onkeyup'=>'password_match()','title'=>'confirm_password'])}}
                    <br>
                    <span id="password_match"  ></span>                    
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
                    {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                  <!-- <img id='blah'  src="img/blankavatar.png"  alt="your image" class='img-responsive img-circle blank_applicant_student_image' /> -->
                  </div>
              </div>
              




					<div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success" id="submit_button" >
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


<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
      <script type="text/javascript">

      $(document).ready(function(){
        $('.applicant_student_delete').unbind().click(function(){
         var id = $(this).attr('value');
        if (confirm('Are you sure you want to delete this?')) { 
         $(this).closest('tr').remove();
        
         $.ajax({
            url: '/accountant/'+id+'',
            type: "DELETE",
            data: {'id':id,'_token': $('input[name=_token]').val()},
            success: function(data){
                
              
            }
          });
       }

        });
      });


      </script>  


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


