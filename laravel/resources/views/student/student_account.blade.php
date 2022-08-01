@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Exam')
@section('breadcrumbs','Student Dhasboard Exam')
@section('student_dasboard_content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif
  <table class="table table-responsive " style="background: #fff;width: 1109px;">
   <tbody>
    <tr style="background:#147F7F">
    <td class="text-center" colspan="2">
     <span style="font-size:19px; color:#FFFFFF;"><b>Manage Profile</b></span>
      </td>
    </tr>
    </tbody>
    </table>

<div class="container">

<div class="col-sm-12">

    <div class="col-sm-6">
      <div class="image_part">
        <img style="width: 42%" onerror="this.src='img/blankavatar.png'" src="{{asset('img/backend/aplicant_student/'."$students->roll.jpg")}}">
     </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="col-sm-6">
        <div>
            <table class="table-responsive">
                <thead>
                    <tr>
                        <td>{{$students->student_name}}</td>

                    </tr>
                    <tr><td>Session: {{$students->session}}</td></tr>
                    <tr><td>{{$general_setting->system_name}}</td></tr>
                    <tr><td style="color:green"><i class="fa fa-circle-thin" aria-hidden="true"></i> &nbsp;{{$students->status}}</td></tr>
                </thead>
            </table>
        </div>
    </div>



</div>

</div>



<div class="container">
  <div class="row">
      <div class="col-sm-12">


              <div class="container">
          <h1 class="heading-primary"></h1>
          <div class="accordion">
            <dl>
              <dt>
                <table class="table table-responsive " style="background: #fff;width: 1082px;">
			   <tbody>
			    <tr style="background:#147F7F">
			    <td class="text-center" colspan="2">
			     <span style="font-size:19px; color:#FFFFFF;"><b>Basic Information</b></span>
			      </td>
			    </tr>
			    </tbody>
			    </table>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" style="width: 95%;" id="accordion1" aria-hidden="true">
                  <table class="table table-responsive">
                    <thead>
                        <tr>
                          <td>Name</td>
                          <td>{{$students->student_name}}</td>
                        </tr>
                        <tr>
                          <td>Roll</td>
                          <td>{{$students->roll}}</td>
                        </tr>
                        <tr>
                          <td>Reg</td>
                          <td>{{$students->reg_number}}</td>
                        </tr>
                        <tr>
                          <td>Class</td>
                          <td>{{$students->class}}</td>
                        </tr>
                         <tr>
                          <td>Section</td>
                          <td>{{$students->section}}</td>
                        </tr>
                         <tr>
                          <td>Department</td>
                          <td>{{$students->department}}</td>
                        </tr>
                         <tr>
                          <td>Batch</td>
                          <td>{{$students->batch}}</td>
                        </tr>
                         <tr>
                          <td>Shift</td>
                          <td>{{$students->shift}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$students->phone}}</td>
                        </tr>




                    </thead>
                  </table>
              </dd>
              {{Form::open(['url'=>'/student_account','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
              <dt>
                <table class="table table-responsive " style="background: #fff;width: 1082px;">
			   <tbody>
			    <tr style="background:#147F7F">
			    <td class="text-center" colspan="2">
			     <span style="font-size:19px; color:#FFFFFF;"><b>Information</b></span>
			      </td>
			    </tr>
			    </tbody>
			    </table>
              </dt>
                   @php
                     $address=DB::table('students_child')->where('roll',$students->roll)->first();
                  @endphp
               <dd class="accordion-content accordionItem is-collapsed" style="width: 95%;" id="accordion1" aria-hidden="true">
                  <table class="table table-responsive">
                    <thead>
                        <tr>
                          <td>Post Office</td>
                          <td> <input type="text" name="post_office" value="{{ $address->post_office or '' }}"></td>
                        </tr>
                        <tr>
                          <td>Home District</td>
                          <td><input type="text" name="home_district" value="{{ $address->home_district or '' }}"></td>
                        </tr>
                        <tr>
                          <td>Division</td>
                          <td><input type="text" name="division" value="{{ $address->division or '' }}"></td>
                        </tr>
                        <tr>
                          <td>Village</td>
                          <td><input type="text" name="village_name" value="{{ $address->village_name or '' }}"></td>
                        </tr>




                    </thead>
                  </table>
              </dd>
              <dt>
                    <table class="table table-responsive " style="background: #fff;width: 1082px;">
                        <tbody>
                        <tr style="background:#147F7F">
                            <td class="text-center" colspan="2">
                                <span style="font-size:19px; color:#FFFFFF;"><b>Password</b></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </dt>
                <dd class="accordion-content accordionItem is-collapsed" style="width: 95%;" id="accordion1"
                    aria-hidden="true">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td>New Pasword</td>
                            <td>
                                <input type="text" name="password">
                                <p class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Re-Type Password</td>
                            <td>
                                <input type="text" name="retype_password">
                                <p class="text-danger">{{$errors->has('retype_password') ? $errors->first('retype_password') : ''}}</p>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </dd>


             <dt>
                <table class="table table-responsive " style="background: #fff;width: 1082px;">
			   <tbody>
			    <tr style="background:#147F7F">
			    <td class="text-center" colspan="2">
			     <span style="font-size:19px; color:#FFFFFF;"><b>Image</b></span>
			      </td>
			    </tr>
			    </tbody>
			    </table>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" style="width: 42%;margin-left: 40%;" id="accordion2" aria-hidden="true">
          
            {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:34%'])}}

                {{Form::file('image',['onchange'=>'readURL(this)'])}}

              </dd><br/>
              <dt class="text-center" style="margin-top: 2%;">
                  <input type="submit" name="submit" class="btn btn-success" value="Update">
                </a>
              </dt>
            </dl>
          </div>
        </div> 
        {{Form::close()}}


      </div>
  </div>
</div>
      <script type="text/javascript">
              function readURL(input) {
                if (input.files && input.files[0])
                    {
                      var reader = new FileReader();
                      reader.onload = function (e)
                      {
                              $('#blah')
                                  .attr('src', e.target.result)
                                  .width(200)
                                  .height(200);
                      };
                      reader.readAsDataURL(input.files[0]);
                    }
              }
            </script>


        
@stop