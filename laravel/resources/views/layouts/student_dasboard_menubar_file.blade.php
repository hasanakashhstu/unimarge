<div style="margin-top:5%">
  <div class="text-right">Developed By : NICE Software LTD.</div>
  <div style="margin-left:1%">
    <img src="img/logo.png" style="height: 10%;">
    <p title="Transport Details">{{$general_setting->system_name}} </p>
  </div>
</div>

 <div class="col-sm-12" style="padding:5px;">
       <div class="dashboard">
       <ul class="list-inline first" >

           <li class="list-inline-item li">
           <a href="/Student_dashboard" class="link"><img src="img/home.png" style="height:40px;"/><br/><span  class="text-center align">Home</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_teacher" class="link"><img src="img/employee.png" style="height:40px;"/><br/><span  class="text-center align">Teacher</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_class_routine" class="link"><img src="img/timetable.png" style="height:40px;"/><br/><span  class="text-center align">Class Routine</span></a>
           </li>&nbsp;&nbsp;

           <li class="list-inline-item li">
           <a href="/student_dashboard_subject" class="link"><img src="img/course.png" style="height:40px;"/><br/><span  class="text-center align">Subject</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_exam" class="link"><img src="img/examsc.png" style="height:40px;"/><br/><span  class="text-center align">Exam Schedule</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_library" class="link"><img src="img/library.png" style="height:40px;"/><br/><span  class="text-center align">Library</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_payment" class="link"><img src="img/payment.png" style="height:40px;"/><br/><span  class="text-center align">Payment</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_syllabus" class="link"><img src="img/syllabus.png" style="height:40px;"/><br/><span  class="text-center align">Academic Syllabus</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_dashboard_hostel" class="link"><img src="img/hostel.png" style="height:40px;"/><br/><span  class="text-center align">Hostel</span></a>
           </li>&nbsp;&nbsp;&nbsp;

           <li class="list-inline-item li">
           <a href="/student_dashboard_transport" class="link"><img src="img/transport.png" style="height:40px;"/><br/><span  class="text-center align">Transport</span></a>
           </li>&nbsp;&nbsp;

           <li class="list-inline-item li">
           <a href="" class="link"><img src="img/report.png" style="height:40px;"/><br/><span  class="text-center align">Notice</span></a>
           </li>

           <li class="list-inline-item li">
           <a href="/student_account" class="link"><img src="img/settings.png" style="height:40px;"/><br/><span  class="text-center align">Account</span></a>
           </li>
           <li class="list-inline-item li">
               <a href="/student_live_class" class="link"><img src="img/play.png" style="height:40px;"/><br/><span  class="text-center align">Live Class</span></a>
           </li>
           <li class="list-inline-item li">
               <a href="/student_financial_ledger_report" class="link"><img src="img/financial_report.png" style="height:40px;"/><br/><span  class="text-center align">Financial Ledger</span></a>
           </li>
            <li class="list-inline-item li">
            <a href="{{ url('/logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <img src="img/logout.png" style="height:40px;"/><br/><span  class="text-center align">Logout</span>
            </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
           </li>

       </ul>

     </div>
</div>
