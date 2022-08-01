@extends('admin.index')
@section('Title','Admit Student')
@section('breadcrumbs','Admit Student')
@section('breadcrumbs_link','/admit_student')
@section('breadcrumbs_title','Admit Student')

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
      <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Admit Student</h2> <!-- Tab Heading  -->
    <p title="Transport Details">I School Managment  Student Details</p> <!-- Transport Details -->

        <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test'>
            <li><a href='/applicant_student_report'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant Student Report</a></li>
            <li><a href='/admit_bulk_student'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Admit  Bulk Student</a></li>
            <li><a href='/admit_student'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Admit Student  </a></li>

            <li><a href="/student_information/{{$students_data->class}}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> </a></li>
            
        </ul>
      </div>
    </div>



       <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Student</h5>
          </div>






          <div class="widget-content nopadding">
    {{Form::open(['url'=>"/student_information/$students_data->roll",'files'=>true,'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           
              <div class="control-group">
    {{Form::label('student_name','Student Name',['class'=>'control-label','title'=>'student_name'])}}
                
                <div class="controls">
    {{Form::text('student_name',$students_data->student_name,['id'=>'required','placeholder'=>'Student Name','title'=>'student_name'])}}
                </div>
              </div>
              
              <div class="control-group">

              {{Form::label('parent_name','Gurdian Name',['class'=>'control-label','title'=>'parent_name'])}}
               
                <div class="controls">
                @php $parents_data_array[$students_data->parent_name]=$students_data->parent_name @endphp
                   
                  @php $parents_data_array[]=""; @endphp
                  @foreach($parents_data as $parents_info)
                    @php $parents_data_array[$parents_info->parent_id]=$parents_info->name @endphp
                  @endforeach
                 {{Form::select('parent_name',$parents_data_array)}}
                </div>
              </div>
               <div class="control-group">
              {{Form::label('reponsible_teacher','Responsible Teacher',['class'=>'control-label','title'=>'class'])}}
               
                <div class="controls">
                  @php
                  $teacher_data_array=[$students_data->reponsible_teacher=>$students_data->reponsible_teacher]
                  @endphp
                @foreach($teacher_data as $teacher_data_fetch)
                    @php $teacher_data_array[$teacher_data_fetch->teacher_name]=$teacher_data_fetch->teacher_name @endphp
                  @endforeach

                  {{Form::select('reponsible_teacher',$teacher_data_array,null,['class'=>'responsible_teacher','id'=>'responsible_teacher'])}}
                </div>
              </div>


              <div class="control-group">
               {{Form::label('relation','Relation',['class'=>'control-label','title'=>'relation'])}}
                <div class="controls">
    {{Form::text('relation',$students_data->relation,['id'=>'required','placeholder'=>'Relation','title'=>'relation'])}}
                </div>
              </div>


              <div class="control-group">
              {{Form::label('class','Class',['class'=>'control-label','title'=>'class'])}}
               
                <div class="controls">
                     @php $class_data_array[$students_data->class]=$students_data->class @endphp
                @foreach($class_data as $class_info)
                    @php $class_data_array[$class_info->class_name]=$class_info->class_name @endphp
                  @endforeach

                  {{Form::select('class',$class_data_array,null,['class'=>'manage_class','id'=>'manage_class'])}}
                </div>
              </div>

              <div class="control-group">
              {{Form::label('Section','Section',['class'=>'control-label','title'=>'class'])}}
               
                <div class="controls">
                @php $section[$students_data->section]=$students_data->section @endphp
                

                  {{Form::select('section',$section,null,['id'=>'student_section'])}}
                </div>
              </div>


              <div class="control-group">
              {{Form::label('Department','Department',['class'=>'control-label','title'=>'class'])}}
               
                <div class="controls">
                @php $department[$students_data->department]=$students_data->department @endphp

                  {{Form::select('department',$department,null,['id'=>'Manage_department'])}}
                </div>
              </div>
              
               
              <div class="control-group">
              {{Form::label('Session','Session',['class'=>'control-label','title'=>'class'])}}
                @php $session_array[$students_data->session]=$students_data->session; @endphp
                 @foreach($session as $session_list)
                   @php 
                   $session_array[$session_list->type_name]=$session_list->type_name 
                  @endphp
                @endforeach

                <div class="controls">
                {{Form::select('session',$session_array)}}
                 
                </div>
              </div>

               <div class="control-group">
              {{Form::label('Batch','Batch',['class'=>'control-label','title'=>'class'])}}
                @php $batch_array[$students_data->batch]=$students_data->batch; @endphp
                 @foreach($batch as $batch_list)
                   @php 
                   $batch_array[$batch_list->type_name]=$batch_list->type_name 
                  @endphp
                @endforeach

                <div class="controls">
                {{Form::select('batch',$batch_array)}}
                 
                </div>
              </div>

              <div class="control-group">
              {{Form::label('Shift','Shift',['class'=>'control-label','title'=>'class'])}}
                @php $shift_array[$students_data->shift]=$students_data->shift; @endphp
                 @foreach($shift as $shift_list)
                   @php 
                   $shift_array[$shift_list->type_name]=$shift_list->type_name 
                  @endphp
                @endforeach

                <div class="controls">
                {{Form::select('shift',$shift_array)}}
                 
                </div>
              </div>

               <div class="control-group">
            {{Form::label('Medium','Medium',['class'=>'control-label','title'=>'Medium'])}}
                <div class="controls">
                  @php 
                   $medium_array=[$students_data->medium=>$students_data->medium] 
                  @endphp
                 @foreach($medium as $medium_list)
                   @php $medium_array[$medium_list->type_name]=$medium_list->type_name @endphp
                @endforeach

                  {{Form::select('medium',$medium_array)}}
                </div>
            </div>


              <div class="control-group">
              {{Form::label('Type','Student Type',['class'=>'control-label','title'=>'class'])}}
               @php $student_type=["$students_data->type"=>$students_data->type,"Regular"=>"Regular","Irregular"=>"Irregular"]; @endphp
                <div class="controls">
                  {{Form::select('type',$student_type)}}
                </div>
              </div>




              <div class="control-group">
               {{Form::label('roll','Roll',['class'=>'control-label','title'=>'roll'])}}
               <div class="controls">
    {{Form::text('roll',$students_data->roll,['id'=>'required','readonly','placeholder'=>'Student Roll','title'=>'roll'])}}
                  
                </div>
              </div>


              <div class="control-group">
               {{Form::label('reg','Registration Number',['class'=>'control-label','title'=>'reg_number'])}}
               
                <div class="controls">
    {{Form::text('reg_number',$students_data->reg_number,['id'=>'required','placeholder'=>'Student Reg','title'=>'reg_number'])}}
                  
                </div>
              </div>



              

              <div class="control-group">
            {{Form::label('birth_date','Birth Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::text('birth_date',$students_data->birth_date,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
            </div>




              <div class="control-group">
              {{Form::label('gender','Gender',['class'=>'control-label','title'=>'gender'])}}
                <div class="controls">
                @php $gender_array=["$students_data->gender"=>$students_data->gender,"Male"=>"Male","Female"=>"Female"]; @endphp
                 {{Form::select('gender',$gender_array)}}
                </div>
              </div>
              
              
              <div class="control-group">
              {{Form::label('status','status',['class'=>'control-label','title'=>'gender'])}}
                <div class="controls">
                @php $status_array=["$students_data->status"=>$students_data->status,"Active"=>"Active","Deactive"=>"Deactive"]; @endphp
                 {{Form::select('status',$status_array)}}
                </div>
              </div>



               <div class="control-group">
            {{Form::label('educational_qualification','Educational Qualifications',['class'=>'control-label','title'=>'address'])}}
                <div class="controls input_fields_wrap">
                    <table class="table address">
                        <thead>
                          <tr>
                            <th>Exam Name</th>
                            <th>Board</th>
                            <th>Reg No</th>
                            <th>Roll No</th>
                            <th>Group</th>
                            <th>Passing Year</th>
                            <th>GPA</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($educational_qualifincations) > 0)
                          @foreach($educational_qualifincations as $key=>$educational_qualifincations_data)
                          <tr>
                              <td>{{Form::text('exam_name[]',$educational_qualifincations_data->exam_name,['id'=>'required','class'=>'table_text','placeholder'=>'Exam Name','title'=>'exam_name','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('borad[]',$educational_qualifincations_data->borad,['id'=>'required','placeholder'=>'Board','title'=>'borad','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('reg_no[]',$educational_qualifincations_data->reg_no,['id'=>'required','placeholder'=>'Reg No','title'=>'Reg No','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('roll_no[]',$educational_qualifincations_data->roll_no,['id'=>'required','placeholder'=>'Roll No','title'=>'roll_no','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('group[]',$educational_qualifincations_data->group,['id'=>'required','placeholder'=>'Group','title'=>'group','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('passing_year[]',$educational_qualifincations_data->passing_year,['id'=>'required','placeholder'=>'Passing Year','title'=>'passing_year','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>{{Form::text('gpa[]',$educational_qualifincations_data->gpa,['id'=>'required','placeholder'=>'Gpa','title'=>'gpa','class'=>'table_text','style'=>'width: 100%'])}}</td>
                              <td>
                              @if($key==0)
                              <button class="btn btn-success add_field_button" type="button">
                                <i class="fa fa-plus"></i>  
                              </button>
                              @else
                              <button class="btn btn-danger remove_ex " get_attr="{{$educational_qualifincations_data->eqalification_id}}" type="button">
                                <i class="fa fa-trash"></i>  
                              </button>
                              @endif
                              </td>
                          </tr>
                          @endforeach
                        @else 
                            <tr>
                                <td>{{Form::text('exam_name[]','',['id'=>'required','class'=>'table_text','placeholder'=>'Exam Name','title'=>'exam_name','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('borad[]','',['id'=>'required','placeholder'=>'Board','title'=>'borad','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('reg_no[]','',['id'=>'required','placeholder'=>'Reg No','title'=>'Reg No','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('roll_no[]','',['id'=>'required','placeholder'=>'Roll No','title'=>'roll_no','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('group[]','',['id'=>'required','placeholder'=>'Group','title'=>'group','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('passing_year[]','',['id'=>'required','placeholder'=>'Passing Year','title'=>'passing_year','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>{{Form::text('gpa[]','',['id'=>'required','placeholder'=>'Gpa','title'=>'gpa','class'=>'table_text','style'=>'width: 100%'])}}</td>
                                <td>
                                <button class="btn btn-success add_field_button" type="button">
                                  <i class="fa fa-plus"></i>  
                                </button></td>
                            </tr>
                          @endif
                        </tbody>
                    </table>
                </div>
            </div>

              
              

              <div class="control-group">
               {{Form::label('address','Address',['class'=>'control-label','title'=>'address'])}}
                <div class="controls">
                  <table class="table address">
                      <thead>
                        <tr>
                          <th>Post Office</th>
                          <th>Home District</th>
                          <th>Division</th>
                          <th>Village Name</th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                       <td>
     {{Form::text('post_office',($student_child)?$student_child->post_office:"",['id'=>'required','class'=>'table_text','placeholder'=>'Post Office','title'=>'post_office'])}}
                          
                       </td>
                          <td>
  {{Form::text('home_district',($student_child)?$student_child->home_district:"",['id'=>'required','class'=>'table_text','placeholder'=>'Home District','title'=>'home_district'])}}
                          
                          </td>
                           <td>
    {{Form::text('division',($student_child)?$student_child->division:"",['id'=>'required','class'=>'table_text','placeholder'=>'Division','title'=>'division'])}}
                           
                           </td>
                            <td>
    {{Form::text('village_name',($student_child)?$student_child->village_name:"",['id'=>'required','class'=>'table_text','placeholder'=>'Village Name','title'=>'village_name'])}}
                            
                            </td>
                        </tr>
                      </tbody>
                    </table>



                  </div>
              </div>



             <div class="control-group">
            {{Form::label('is_family_member_of_hem','Member Of HEM ?',['class'=>'control-label','title'=>'gender'])}}
                <div class="controls">
                  <div class="row" style="margin-left: 2%;">
                    Yes
                    <input type="radio" 
                    @if($students_data->is_family_member_of_hem_section=='yes')
                      checked="checked" 
                    @endif
                    name="is_family_member_of_hem_section" value="yes" class="is_family_member_of_hem">
                    {{-- {{Form::radio('is_family_member_of_hem','yes',null,['class'=>'is_family_member_of_hem'])}} --}}
                   No
                    {{-- {{Form::radio('is_family_member_of_hem','no',null,['class'=>'is_family_member_of_hem'])}} --}}
                     <input  type="radio" 
                     @if($students_data->is_family_member_of_hem_section=='no')
                      checked="checked" 
                     @endif
                      name="is_family_member_of_hem_section" value="no" class="is_family_member_of_hem">
                     <span style="color: red;">(If Yes Click On Yes)</span>
                  </div>
                 
                </div>
            </div>

            <div class="control-group is_family_member_of_hem_section" 
             @if($students_data->is_family_member_of_hem_section=='no')
                style="display: none;"
              @endif

           >
                <div class="controls">
                    <table class="table address">
                        <thead>
                          <tr>
                            <th>Member No</th>
                            <th>Group</th>
                            <th>Village</th>
                            <th>Section</th>
                            <th>Zilla</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          <tr>
                              <td>{{Form::text('hem_member_no',@$hem_section_info->hem_member_no,['id'=>'required','class'=>'table_text','placeholder'=>'hem_member_no','title'=>'hem_member_no'])}}</td>
                              <td>{{Form::text('hem_group',@$hem_section_info->hem_group,['id'=>'required','placeholder'=>'hem_group','title'=>'hem_group','class'=>'table_text'])}}</td>
                              <td>{{Form::text('hem_village',@$hem_section_info->hem_village,['id'=>'required','placeholder'=>'hem_village','title'=>'hem_village','class'=>'table_text'])}}</td>
                              <td>{{Form::text('hem_section',@$hem_section_info->hem_section,['id'=>'required','placeholder'=>'hem_section','title'=>'hem_section','class'=>'table_text'])}}</td>
                              <td>{{Form::text('hem_zilla',@$hem_section_info->hem_zilla,['id'=>'required','placeholder'=>'hem_zilla','title'=>'hem_zilla','class'=>'table_text'])}}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>



              <div class="control-group">
              {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                
                <div class="controls">
      {{Form::text('phone',$students_data->phone,['id'=>'required','placeholder'=>'Phone','title'=>'phone'])}}
                  
                </div>
              </div>


              <div class="control-group">
              {{Form::label('mobile','Mobile',['class'=>'control-label','title'=>'mobile'])}}
               
                <div class="controls">
                 {{Form::text('mobile',$students_data->mobile,['id'=>'required','placeholder'=>'Mobile','title'=>'mobile'])}}
                  
                </div>
              </div>


              <div class="control-group">
              {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
               
                <div class="controls">
                 {{Form::email('email',$students_data->email,['id'=>'required','placeholder'=>'Email','title'=>'email'])}}
                 
                </div>
              </div>


              <div class="control-group">
              {{Form::label('password','Password',['class'=>'control-label','title'=>'password'])}}
               
                <div class="controls">
               {{Form::password('password', ['class' =>'form-control','onkeyup'=>'password_len_check()','id'=>'password','title'=>'password'])}}
                 <br>
                  <span id="help_block"></span>
            
                </div>
               
              </div>

              <div class="control-group">
              {{Form::label('confirm_password','Confirm Password',['class'=>'control-label','title'=>'confirm_password'])}}
              
                <div class="controls">
                {{Form::password('confirm_password', ['class' =>'form-control','onkeyup'=>'Password_match()','id'=>'password_confirm','name'=>'password_confirmation','title'=>'confirm_password'])}}<br>
                <span id="password_match"></span>
               
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
                {{Form::label('photo','Photo',['class'=>'control-label','title'=>'photo'])}}
                
                <div class="controls">
                {{Form::file('student_image',['onchange'=>'readURL(this)'])}}
                  
                  </div>
              </div>

              <div class="control-group">
              {{Form::label('image','',['class'=>'control-label','title'=>'image'])}}
               
                <div class="controls"> 
                    <?php (file_exists("img/backend/student/$students_data->roll.jpg"))?$student_edit_image="img/backend/student/$students_data->roll.jpg": $student_edit_image="img/blankavatar.png"?>
                {{Form::image("$student_edit_image",'Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                  
                  </div>
              </div>

              <div class="control-group">
              {{Form::label('office_copy','Office Copy',['class'=>'control-label','title'=>'address'])}}
                <div class="controls">
                    <table class="table address">
                        <thead>
                          <tr>
                            <th>Inspection No</th>
                            <th>Reference</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          <tr>
                              <td>{{Form::text('inspection_no',@$office_copy_data->inspection_no,['id'=>'required','class'=>'table_text','placeholder'=>'Inspection No','title'=>'inspection_no','style'=>'width: 100%;'])}}</td>
                              <td>{{Form::text('reference',@$office_copy_data->reference,['id'=>'required','placeholder'=>'Reference','title'=>'reference','class'=>'table_text','style'=>'width: 100%;'])}}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>

              



          <div class="form-actions">
           {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success'])}}
                
              </div>
              {{Form::close()}}
          
          </div>
        </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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


 function Password_match()
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

   $(document).ready(function()
   {
    
    $(".manage_class").unbind().change(function()
     {
          
         var class_name=$("#manage_class").val();
         
         // var class_name=$("#class_name").val();
         // var department=$("#department_name").val()
         // var session=$("#session").val();
          
         $.ajax({
            url: '/class_w_section_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              $('#student_section').html(data);
            }
          });

         $.ajax({
            url: '/class_w_department_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              $('#Manage_department').html(data);
            }
          });

      });


    var max_fields      = 5; //maximum input boxes allowed
            var wrapper       = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
              e.preventDefault();
              if(x <= max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><table class="table address"><tr>\
                              <td><input id="required" class="table_text" placeholder="Exam Name" title="exam_name" style="width: 95%" name="exam_name[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Board" title="borad" class="table_text" style="margin-left: -6%;width: 95%" name="borad[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Reg No" title="Reg No" class="table_text" style="margin-left: -12%;width: 95%" name="reg_no[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Roll No" title="roll_no" class="table_text" style="margin-left: -18%;width: 95%" name="roll_no[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Group" title="group" class="table_text" style="margin-left: -22%;width: 95%" name="group[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Passing Year" title="passing_year" class="table_text" style="margin-left: -26%;width: 95%" name="passing_year[]" type="text" value=""></td>\
                              <td><input id="required" placeholder="Gpa" title="gpa" class="table_text" style="margin-left: -30%;width: 78%" name="gpa[]" type="text" value=""></td>\
                          </tr></table><button href="#" class="btn btn-danger remove_field" style="float: right;margin-top: -4.3%;margin-right: 20%;"><i class="fa fa-trash"></i></button></div>'); //add input box
              }
              else
              {
                  toastr.warning('Only 5 Fileds Are Allowed');
                  return false;
              }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
              e.preventDefault(); $(this).parent('div').remove(); x--;
            })
      });



    $(".remove_ex").click(function(){
         $(this).closest("tr").remove();
         var remove_ex=$(this).attr('get_attr');
         $.ajax({
            url:'/remove_ex_student_edu_data',
            type:"POST",
            data:{'eqalification_id':remove_ex,'_token':"{{csrf_token()}}"},
            success:function(response){
              toastr.success('Removed Educational Qualifications');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toastr.danger('Please Try Again Later.');
            }

         });
      });

    $(".is_family_member_of_hem").click(function(){
          var is_family_member_of_hem=$(this).val();
          if(is_family_member_of_hem=="yes")
          {
            $(".is_family_member_of_hem_section").show();
          }
          else
          {
            $(".is_family_member_of_hem_section").hide();
          }
      });
       
    

  

 </script>





@stop
