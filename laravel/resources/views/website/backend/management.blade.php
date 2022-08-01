@extends('admin.index')
@section('Title','Our Management')
@section('breadcrumbs','Create Admin')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','create_admin')

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
                <strong>Wrong!</strong> <?php echo Session::get('error') ?>
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
    <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create Admin</h2> <!-- Tab Heading  -->
    <p title="Transport Details">@if (Session::has('school')) {{Session::get('school.system_name')}}  @endif Create Admin</p> <!-- Transport Details -->

 
    <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
            <li><a href='#'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create New</a></li>
        </ul>
      </div>
    </div>



<div class='row'>
    <div class="controls text-right">
      <div data-toggle="buttons-checkbox" class="btn-group">
        <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
        <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
        <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
        
        <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
      </div>
    </div>
</div>

   <div class="tab-content">
      
      <div class="modal fade" id="myModal" role="dialog" style="margin-left: -7%;">
         <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create New</h4>
              </div>

              <div class="modal-body">
                <div class="widget-content padding">
                    {{Form::open(['url'=>'/frontend/our_management_add','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                        <div class="control-group">
                          {{Form::label('name','Name',['class'=>'control-label','title'=>'name'])}}
                            <div class="controls">
                            {{Form::text('name','',['id'=>'required','placeholder'=>' Name','title'=>'name'])}}
                            </div>
                        </div>

                        <div class="control-group">
                          {{Form::label('designation','Designation',['class'=>'control-label','title'=>'designation'])}}
                            <div class="controls">
                            {{Form::text('designation','',['id'=>'required','placeholder'=>'Designation','title'=>'designation'])}}
                            </div>
                        </div>

                        <div class="control-group">
                        {{Form::label('image','',['class'=>'control-label','title'=>'image'])}}
                       
                        <div class="controls"> 
                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                        <br>
                        {{Form::file('image',['onchange'=>'readURL(this)'])}}
                        </div>
                      </div>

                </div>
              </div>
              <div class="modal-footer">
            
               {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'submit_button','style'=>'float:left'])}}  
               {{Form::submit('Close',['class'=>'btn btn-default','data-dismiss'=>'modal'])}} 
          
              </div>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
 <!--end of the new add form-->


<!-- Transport List Report  -->

         <div id="home" class="tab-pane fade in active">
             <div class="widget-box">
                 <div class="widget-title">
                   <span class="icon"><i class="icon-th"></i></span>
                   <h5>Data Table</h5>
                 </div>

             <div class="widget-content nopadding">
               <table class="table table-bordered data-table font_my">

                   <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>

                    @foreach($our_management as $key => $value)

                     <tr class="gradeX">
                       <td>{{$key+1}}</td>
                       <td>{{$value->name}}</td>
                       <td>{{$value->designation}}</td>
                       <td>
                          <img style="width: 50px;" src="{{asset($value->image)}}">
                       </td>
                       <td id="my_align" class="display_status">
                
                        {{Form::open(['url'=>"/frontend/our_management/$value->website_management_id/edit" ,'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                     
                        {{Form::open(['url'=>"/frontend/our_management/$value->website_management_id" ,'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this User?')"])}}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  @push('custom-scripts')
      <script type="text/javascript" src="{{asset('extra_js/admit_student.js')}}"></script>
      <script type="text/javascript">
        $(document).ready(function() {
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

      $("#session").change(function(){
          var class_name=$(".manage_class").val();
          var department_name=$("#Manage_department").val();
          var session=$(this).val();
          $.ajax({
              url:"/roll_number_generate",
              type:"POST",
              data:{
                'class_name':class_name,
                'department_name':department_name,
                'session':session,
                '_token':"{{csrf_token()}}"
              },
              success:function(response){
               
                $(".generated_roll").val(response);
                toastr.success('Semester Department and Session Wise New Roll Generated');
              }
          });
      });


      </script>
  @endpush
@stop
