@extends('admin.index')
@section('Title','Student Promation')
@section('breadcrumbs','Student Promation')
@section('breadcrumbs_link','/student_promoation')
@section('breadcrumbs_title','Student Promoation')

@section('content')


@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
   
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('error') }}
    </div>
   
@endif


        <div class="container">
					<h2><i class="fa fa-line-chart" aria-hidden="true"></i> Student Promotion  </h2> <!-- Tab Heading  -->
 					<p title="Transport Details">I School Managment Student Promoation</p> <!-- Transport Details -->
		</div>
  

 <div class="alert alert-info">
      <strong>Warning!</strong> <br>Can't Promote English Medium Student To Bangla Medium Or Bangla Medium To English Medium
    </div>


	<div class="container">
		<div class="text-right">
			     <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test'>
                <li><a href='/aplicant_student'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Aplicant Student</a></li>
                <li><a href='/student_promoation'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Student Promation</a></li>
                <li><a href='/addmission_test'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Admission Test</a></li>
             </ul>
      </div>
    </div>
		</div>
	</div>


	<div class='container'>
		<div class="widget-box promoation" >
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Student Promoation</h5>
          </div>
          <div class="widget-content nopadding">
    {{Form::open(['class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

            
              <div class="control-group">
    {{Form::label('current_session','Current Session',['class'=>'control-label','title'=>'current_session'])}}
               
                <div class="controls">
                    @foreach($session_filter as $session_filter_data)
                       @php $session_array[$session_filter_data->type_name]=$session_filter_data->type_name @endphp
                    @endforeach
                    
                 {{Form::select('current_session',$session_array,null,['id'=>'current_session'])}}
                 	
                </div>
              </div>
            
            <div class="control-group">
              {{Form::label('current_class','Current Class',['class'=>'control-label','title'=>'promote_from_class'])}}
             
                <div class="controls">
                  @php $class_array['']=""; @endphp
                    @foreach($class_filter as $class_filter_data)
                       @php $class_array[$class_filter_data->class]=$class_filter_data->class @endphp
                    @endforeach
                 {{Form::select('current_class',$class_array,null,['class'=>'current_class','id'=>'current_class'])}}
                </div>
              </div>

              
              
              <div class="control-group">
              {{Form::label('promote_class','Promote To Class',['class'=>'control-label','title'=>'promote_to_class'])}}
                <!-- <label class="control-label">Promotion To Class</label> -->
                <div class="controls">
                  @php $promote_class_array['']="" @endphp
                     @foreach($promote_class as $promote_class_data)
                       @php $promote_class_array[$promote_class_data->class_name]=$promote_class_data->class_name @endphp
                    @endforeach
                 	   {{Form::select('Class',$promote_class_array,null,['class'=>'promote_class','id'=>'promote_class'])}}
         		</div>
              </div>
              
              
             


              



					<div class="form-actions text-center">
                        

                <!-- <input type="submit" value="Manage Promotion" class="btn btn-primary"> -->

              </div>
        
          </div>
        </div>
	</div>
{{Form::close()}}



    {{Form::open(['url'=>'/student_promoation/student-Promation','class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
	<div class='text-center'><h3>Students Promotion</h3><hr></div>
	<div class='container'>
		



		<div id="home" class="tab-pane fade in active">
           
		      		<div class="widget-box">
          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            				<h5>Class One Student Data Table</h5>
          				</div>

          		<div class="widget-content nopadding">
		              <span id="manage_promotion"></span>
          			</div>
        		</div>
             {{Form::submit('Manage Promotion',['class'=>'btn tip-top','data-original-title'=>'Manage Promotion'])}} 
		    </div>
	</div>
{{Form::close()}}





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/student_promotion.js')}}"></script>
@endpush

@stop