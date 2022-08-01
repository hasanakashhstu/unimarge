@extends('admin.index')
@section('Title','advance_report')
@section('breadcrumbs','advance_report')
@section('breadcrumbs_link','/advance')
@section('breadcrumbs_title','advance_report')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Almendra Display' rel='stylesheet'>
<style>
.tec {
    font-family: 'Almendra Display';font-size: 55px;
}

</style>
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
          Customize Student Marksheet Report
        </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Student Marksheet Report
        </p><br/>
        <!-- Transport Details -->

        <div class='row'>

            <div class="panel panel-default" >
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/daily_attendance'><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Add Daily Attendance</a></li>
                        <li><a href='/teacher_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Teacher</a></li>
                        <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's Report </a></li>
                    </ul>
                </div>
            </div>
        </div>

          <table style="margin-top: 4%" class="">
        <thead style="background: #1F262D">
              <tr style="height: 34px;color: #fff">
                <th>Exam Name</th>
                <th>Class Name</th>
                <th>Section Name</th>
                <th>Department Name</th>
                <th>Student Roll</th>
                <th>Serach</th>
                
               
              </tr>
        </thead>
        

            <tbody>
              <tr>
               
       
             
  
             @php
             $exam_list_array=[''=>'--Select--'];
             @endphp
             @foreach($exam_list as $fetch_exam_list)
             @php
             $exam_list_array[$fetch_exam_list->exam_name]=$fetch_exam_list->exam_name;
             @endphp
             @endforeach

             @php
             $class_list_array=[''=>'--Select--'];
             @endphp
             @foreach($class_list as $fetch_class_list)
             @php
             $class_list_array[$fetch_class_list->class_name]=$fetch_class_list->class_name;
             @endphp
             @endforeach
            <td>{{Form::select('exam_name',$exam_list_array,null,['style'=>'width: 157px','id'=>'exam_info'])}}</td>
            <td>{{Form::select('class_name',$class_list_array,null,['style'=>'width: 157px','id'=>'class_info'])}}</td>
               <td>{{Form::select('section',[''=>'Section Name'],null,['id'=>'section_info','style'=>'width: 126px'])}}</td>
            <td>{{Form::select('department_name',[''=>'Department Name'],null,['style'=>'width: 157px','id'=>'Department_info'])}}</td>
            <td>{{Form::text('student_roll','',['style'=>'width: 157px','id'=>'student_roll'])}}</td>
            
           

       
             <td>{{Form::button('Search',['class'=>'btn btn-success','id'=>'serach_btn_for_marksheet','style'=>'width: 152px;
    margin-top: -8px;'])}}</td>
    
          </tr>
            
            </tbody>
        </table>
        <div  id="not_found_view" hidden="hidden">
        	<img style="height: 120px;margin-left: 485px;" src="{{URL::asset('img/wrong_type.png')}}">
	   </div>
	  <div  id="not_publish_view" hidden="hidden" >
	  	<div style="
    border: solid red;margin-top: 63px;    width: 931px;">
        	<img style="
  margin-left: 462px;height: 73px;" src="{{URL::asset('/img/cross_unpublish_img.jpg')}}"><h4 style="margin-left: 352px;
    font-size: 28px;"><strong>Not Yet Result Publish</strong></h4>
</div>
	</div>
<div class="mark_sheet">
	<div  id="marksheet_view">
	</div>

</div>
<div id="print_btn_disable"> 
  <button style="margin-top: 22px;">
          <a id='print' onclick="sheet_print()" media='print'  target="_blank"  title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></a>
        </button>
</div>
<script type="text/javascript">
function sheet_print(){

       w=window.open(null, 'Print_Page', 'scrollbars=yes');
    
            w.document.write('<style>@page{border:black 1px solid}body{height:1200px;}.mark_sheet{height: 1200px;}</style><html><head><title></title>');
            
            w.document.write('<body style="font-family:verdana; font-size:14px;width:100%;height:200%:" >');
          w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

    
          w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
        w.document.write(jQuery('.mark_sheet').html());


          w.document.close();
 
        // w=window.open(null, 'Print_Page', 'scrollbars=yes');
    
        // w.document.write('<style>@page{border:black 1px #ddd;border-collapse: separate;border-left: 0;}table th, table td{boder:1px solid #ddd;border-collapse: separate;border-left: 0;}.table{width:70%;}.table th , .table td{border:1px solid #ddd;border-collapse: separate;border-left: 0;}</style><html><head><title></title>');
   
        // w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

    
        // w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
        // w.document.write(jQuery('.mark_sheet').html());


        // w.document.close();
        // w.print();
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>
@endpush
@stop
