@extends('student.master_template')
@section('dashboard_title','Dashboard')
@section('breadcrumbs','Home')
@section('student_dasboard_content')
		<div class="quick-actions_homepage">
			<div class="widget-content" style="margin-top:-50px;" >
				<div class="row-fluid">
            @php
              $student_name=$students->student_name;
              $session=$general_setting->default_session;
     $attendance=DB::table('daily_attendance')->where('student_id',$students->roll)->get()->count();
     $issue_book=DB::table('article_issue')->where('member_roll',$students->roll)->get()->count();
     $dormitory=DB::table('assign_dormitory')->where('student_roll',$students->roll)->get()->count();
     $transport=DB::table('assign_transport')->where('student_roll',$students->roll)->get()->count();
     $payment=DB::table('invoice')->where('student_roll',$students->roll)->get()->count();
            @endphp
		      <div class="widget-box">
		        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
		        </div>
		        <div class="widget-content" >￼
							<div class="span3">
								<a href=" ">Quick link</a>
								<div class="list-group">
								  <a href="/book_list" class="list-group-item">Book List</a>
								  <a href="#" class="list-group-item">Course Advisor</a>
									<a href="#" class="list-group-item">Academic Programs</a>
									<a href="#" class="list-group-item">Rules Of Class Attendance</a>
									<a href="#" class="list-group-item">Student Ledgure</a>
								</div>
							</div>&nbsp;

		          <div class="row-fluid">
		            <div class="span6">
						 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['SESSION', 'Attendace', 'Library', 'Dormitory', 'Transport', 'Payment'],
         ['<?=$session?>',<?=$attendance?>,<?=$issue_book?>,<?=$dormitory?>,<?=$transport?>,<?=$payment?>]
               ]);

    var options = {
      title : '<?=$student_name?> \'s Overview',
      vAxis: {title: 'SESSION'},
      hAxis: {title: 'SESSION'},
      seriesType: 'bars',
      series: {6: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
    <div id="chart_div" style="width: 550px; height: 500px;"></div>
		            </div>
		            <div class="span3" style="margin-left: 48px;">
									<ul class="site-stats" style="margin-left: 43px;">
										<li class="bg_lh" style="height:103px;"><i class="fa fa-address-book" aria-hidden="true"></i><strong>{{$issue_book}}</strong> <small>My Issue Book</small></li>
										<li class="bg_lh" style="height:103px;"><i class="fa fa-book" aria-hidden="true"></i> <strong>{{$subject_data}}</strong> <small>My Total Subject</small></li>
										<li class="bg_lh" style="height:103px;"><i class="fa fa-male" aria-hidden="true"></i> <strong>{{$class_teacher->class_teacher}}</strong> <small> My Class Teacher</small></li>
										<li class="bg_lh" style="height:103px;"><i class="fa fa-user" aria-hidden="true"></i><strong>{{$attendance}}</strong> <small>My Total Attendance</small></li>
									</ul>
		            </div>
		          </div>

		        </div>
		      </div>
		    </div>
			</div>



			



						<div class="widget-box">
								<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
									<h5>All Notice Data table</h5>
								</div>

						<div class="widget-content nopadding">
							<table style="font-size:12px" class="table table-bordered data-table">

									<thead>
										<tr>
											<th>Notice Title</th>
											<th>Notice Subject</th>
											<th>Notice</th>
										</tr>
									</thead>


									<tbody>
										@foreach($class_notice as $class_notice_data)
											<tr>
												<td>{{$class_notice_data->notice_title}}</td>
												<td>{{$class_notice_data->notice_subject}}</td>
												<td>{{$class_notice_data->Notice}}</td>
											</tr>
											@endforeach
									</tbody>
								</table>
							</div>
					</div>
















					<div class="widget-box">
						<div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
							<h5>My Notice List</h5>
						</div>
						<div class="widget-content">
							<div class="todo">
								<ul>
									<li>
										@foreach($student_notice as $student_notice_data)
										<div class="user-thumb"> <img width="40" height="40" alt="User" src="img/notice.png"> </div>
										<div class="article-post"><h3 style="color:#2980b9">{{$student_notice_data->notice_title}}</h3></div>
										<div class="article-post"> <h5>{{$student_notice_data->notice_subject}}</h5></div>
										<div class="article-post"> <h5>{{$student_notice_data->Notice}}</h5></div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>

			<!-- <div class="row-fluid">
				 <div class="span6">
					 <div class="widget-box">
						 <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
							 <h5>Class Routine</h5>
						 </div>
						 <div class="widget-content">
							 <div class="todo">
								 <ul>
									 <li>
										 <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/class.png"> </div>
										 <div class="article-post"> <span class="user-info">Class:</span>
											 <p><a href="#"></a>Started Time </p>
										 </div>
									 </li>
								 </ul>
							 </div>
						 </div>
					 </div>
					 </div>
        <div class="span6">
					 <div class="widget-box widget-chat">
						 <div class="widget-title bg_lb"> <span class="icon"> <i class="icon-comment"></i> </span>
							 <h5>Chat Option</h5>
						 </div>
						 <div class="widget-content nopadding collapse in" id="collapseG4">
							 <div class="chat-users panel-right2">
								 <div class="panel-title">
									 <h5>Online Users</h5>
								 </div>
								 <div class="panel-content nopadding">
									 <ul class="contact-list">
										 <li id="user-Alex" class="online"><a href=""><img alt="" src="img/demo/av1.jpg" /> <span>Alex</span></a></li>
										 <li id="user-Linda"><a href=""><img alt="" src="img/demo/av2.jpg" /> <span>Linda</span></a></li>
										 <li id="user-John" class="online new"><a href=""><img alt="" src="img/demo/av3.jpg" /> <span>John</span></a><span class="msg-count badge badge-info">3</span></li>
										 <li id="user-Mark" class="online"><a href=""><img alt="" src="img/demo/av4.jpg" /> <span>Mark</span></a></li>
										 <li id="user-Maxi" class="online"><a href=""><img alt="" src="img/demo/av5.jpg" /> <span>Maxi</span></a></li>
									 </ul>
								 </div>
							 </div>
							 <div class="chat-content panel-left2">
								 <div class="chat-messages" id="chat-messages">
									 <div id="chat-messages-inner"></div>
								 </div>
								 <div class="chat-message well">
									 <button class="btn btn-success">Send</button>
									 <span class="input-box">
									 <input type="text" name="msg-box" id="msg-box" />
									 </span> </div>
							 </div>
						 </div>
					 </div>
				 </div>
			 </div> -->















































</div>
@stop
