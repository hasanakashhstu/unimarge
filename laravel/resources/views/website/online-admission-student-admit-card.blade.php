
 @section('online_apply_css')
    {{-- Page Heading --}}
    .page-title_check{
        color: white;
    }

    .page-title-area{
        padding: 130px 0px 50px 0px;
    }

     /* == breadcrumb == */
    ul.breadcrumb {
      <!-- width: 900px; -->
      margin: auto;
      padding: 0px 16px;
      list-style: none;
      background-color: none !important;
    }

    .breadcrumb{
        background: none:
    }

    /* Display list items side by side */
    ul.breadcrumb li {
      display: inline;
      font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
      padding: 8px;
      color: black;
      content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
      color: #0275d8;
      font-size: 16px;
      text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
      color: #01447e;
      text-decoration: underline;
    }

    {{-- addmition nav --}}
     {{-- Add a black background color to the top navigation --}}
     .admission_nav{
        <!-- width: 900px; -->
        margin: auto;
    }

    .topnav {
    background-color: #1457b7;
    overflow: hidden;
    }

    {{-- Style the links inside the navigation bar --}}
    .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 6px 14px;
    text-decoration: none;
    font-size: 14px;
    font-family: Poppins, sans-serif;
    }

    {{-- Change the color of links on hover --}}
    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }

    {{-- Add a color to the active/current link --}}
    .topnav a.active {
    background-color: #04AA6D;
    color: white;
    }

    {{-- Main content --}}
    .main_content{
        <!-- width: 900px; -->
        margin: auto;
        border: 1px solid #ddd;
        {{-- background: #4286e7; --}}
        color: #fdfdfd;
    }



  


 @endsection

 @extends('website.index')
 @section('website_main_section')
     <div class="page-title-area bg-overlay text-center">
         <div class="container">
             <div class="breadcrumb-inner">
                 <h2 class="page-title">Online Addmission</h2>
                 <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/frontend/online-admission') }}">Apply Now</a></li>
                    <li><a href="{{ url('/frontend/online-admission-student-login') }}">To Complete The Admission Form Or Admission</a></li>
                    <li>Admit Card</li>
                </ul>
             </div>
         </div>
     </div>

     <div class="container">
        
        <!-- online addmission nav -->
        @include('website.includes.online_admission_nav')
        
        <div class="main_content">
            <div class="ins_title">Contact with us</div>
            <div class="application_top_content mt-3">
                <div class="contact-area mt-5 mb-5">
                    <!-- Contact info -->
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="admitcard_wrapper container">
                                    <div class="admit_header mb-5">
                                        <?php 
                                            // echo '<pre>';
                                            // print_r($admit_card);
                                            // die;
                                        ?>
                                        <h3>Z.H. SIKDER UNIVERSITY OF SCIENCE & TECHNOLOGY</h3>
                                        <p><b>Address: </b>Vill-Madhupur, Post-Kartikpur, P.S-Bhedergonj,Dist-Shariatpur</p>
                                    </div>
                                    <div class="admit_body">
                                        <h5 class="text-center">Permission Letter Cum Addmission Card (Center Copy / Admit Card)</h5>
                                        <hr>
                                        <div class="student_info" style="display: flex;">
                                            <div class="pic_and_signeture" style="max-width:120px;">
                                            @foreach($admit_card as $key => $admit_info)
                                                <img src="{{URL::asset('img/backend/aplicant_student/'.$admit_info->attached_photo_name)}}" alt="Logo" height="120px" width="120px"/>
                                                {{-- <img src="{{URL::asset('img/student.png')}}" alt="Logo" height="120px" width="120px"/> --}}
                                                <h6 class="text-center mt-2">{{$admit_info->student_name}}</h6>
                                            @endforeach
                                            </div>
                                            <div class="student_details ml-4">
                                                <table class="table table-borderless table-sm">
                                                    <tbody>
                                                        @foreach($admit_card as $key => $admit_info)
                                                        <tr >
                                                            <th style="border:none">Student ID</th>
                                                            <td style="border:none">: {{$admit_info->applicant_id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Student Name</th>
                                                            <td style="border:none">: {{$admit_info->student_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Guardian Name</th>
                                                            <td style="border:none">: {{$admit_info->parent_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Session</th>
                                                            <td style="border:none">: {{$admit_info->session}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Semester</th>
                                                            <td style="border:none">: {{$admit_info->semester}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Department</th>
                                                            <td style="border:none">: {{$admit_info->department}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Birth Date</th>
                                                            <td style="border:none">: {{$admit_info->birth_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Gender</th>
                                                            <td style="border:none">: {{$admit_info->gender}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border:none">Phone</th>
                                                            <td style="border:none">: {{$admit_info->phone}}</td>
                                                        </tr>

                                                         @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> <!-- Student Info -->
                                        <h6><b>Examination Hall :<b> Z.H. SIKDER UNIVERSITY OF SCIENCE & TECHNOLOG</h6>
                                        <hr>
                                        <div class="exam_duration">
                                            <span style="color: black"><b>Exam Time: </b></span>
                                            <span class="exam_start" style="color: black"> 10:00 PM</span>
                                            <span style="color: black"><b>To </b></span>
                                            <span class="exam_end" style="color: black"> 12:00 AM</span>
                                        </div>

                                        <div class="signeture" style="margin-top: 70px; display: flex; color: black;">
                                            <div style="margin: 0px 10px; text-decoration: overline;">Authorized Signurature</div>
                                            <div style="margin: 0px 10px; text-decoration: overline;">Student Signurature</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  content info X -->

            </div>
        </div><!-- Main content X -->
    </div>


 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 @stop
