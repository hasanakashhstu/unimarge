
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<div class="container">
				<div class="visible-lg visible-md visible-sm" style="margin-top:50px;"></div>
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3  table-bordered col-md-offset-3 col-sm-offset-3 col-sm-6 col-md-6 col-xs-12" style="padding:0px;">
						<!--<img src="img/fenipoly_logo.png" class="img-responsive" width="100%"> !-->
						<div>
				           <img style="    width: 633px;" src="{{URL::asset('img/result_login_img.png')}}">
                         </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3  table-bordered col-md-offset-3 col-sm-offset-3 col-sm-6 col-md-6 col-xs-12" style="padding:0px; padding-bottom:30px;">
			
					 {{Form::open(['url'=>'/result_with_marksheet','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				
					
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px; padding-top:10px;">Exam Name:
						</div>
						
						<div class="col-lg-12 col-sm-12 col-md-12">
						 <select class="form-control" name="exam_name" id="exam_name">
						 	<option>--Select--</option>	
							 @foreach($exam_list as $fetch_exam_list)
						       <option value="{{$fetch_exam_list->exam_name}}">{{$fetch_exam_list->exam_name}}</option>	
						      @endforeach
					     </select>
					   </div>
					
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px; padding-top:10px;">
					 Class Name:</div>
					 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<select class="form-control" name="class_name" id="class_name">
						  <option>--Select--</option>	
						   @foreach($class_list as $fetch_class_list)
						    <option value="{{$fetch_class_list->class_name}}">{{$fetch_class_list->class_name}}</option>
						   @endforeach
					   </select>
				     </div>
				     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px; padding-top:10px;">
					Section Name:</div>
					 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<select class="form-control" name="section_name" id="section_name">
						  <option>--Select--</option>	
					   </select>
				     </div>
					 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px; padding-top:10px;">
					Department Name:</div>
					 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<select class="form-control" name="Department" id="department_name">
						  <option>--Select--</option>	
					   </select>
				     </div>
				      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-bottom:10px; padding-top:10px;">
					Student Roll:</div>
					 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<input type="text" class="form-control" name="student_roll" id="student_roll">
						 	

				     </div>
					
					
			
				
					
					
					
					
					
					
					<div id="smss" align="center" style="padding-top:20px;"></div>
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-top:30px;" align="right">
						<input type="submit" class="btn btn-success" name="search" id="search_btn_for_mark" value="Search" style="width:120px;">
					</div>
				</div>
			</div>
		   	 {{Form::close()}}
		<br>
		<div class="container-fluid" style="    margin-top: 48px;
">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 navbar-default" style="color:#000;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-left:0px; padding-top:25px; padding-bottom:25px;">
                    <b>Copyright © I-school </b>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="right" style="padding-left:0px;  padding-top:10px;  padding-bottom:10px;">
                    Developed by <a href="http://www.sbit.com.bd/" target="_blank">
                            <img src="http://asktechmate.com/public/AllImgae/developer.jpg" style="height: 50px;" alt="logo">
                        </a>
                </div>
            </div>
        </div>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>


     <!--    <script type="text/javascript" src="{{URL::asset('extra_js/exam.js')}}"></script> -->