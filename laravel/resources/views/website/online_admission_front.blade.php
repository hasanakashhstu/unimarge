
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
      font-size: 17px;
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
        background: #4286e7;
        color: #fdfdfd;
    }

    .application_top_content h6{
        color: #fff;
    }

    .application_top_content ul{
        list-style:none;
    }

    .application_top_content ul li{
        font-size: 14px;
    }

    .application_top_content ul li .fa-check-square-o{
        color: #a0ffc7;
    }

    .application_top_content ul li a{
        text-decoration: underline;
        color: #1d04eb;
        font-weight: bold;
    }
    .application_top_content ul li span{
        color: #a0ffc7;
        font-weight: bold;
    }

    {{-- BTN Design  --}}

    .btn_main_content{
        display: flex;
    }

    .btn_main_content .card .card-body a{
        font-size: 14px;
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
                  <li><a>Online Addmission</a></li>
                </ul>
             </div>
         </div>
     </div>

     <div class="container">
        <!-- online addmission nav -->
        @include('website.includes.online_admission_nav')

        <div class="main_content">
            <div class="application_top_content">
                <ul class="pt-2">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Befor Start please read the 
                        <a href="/frontend/instruction">Instruction</a> and 
                        <a href="/frontend/admission-eligibility">Admission Eligibility</a>
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        You Will Required a Pass
                        <span>passport size colored photographs(240 W * 300 H pixels) to be uploaded later</span>
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        You will require a 
                        <span>scnned signature (300 W * 80 H pixels)</span> 
                        to be uploaded later
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        You can pay application fee online using BKash. 
                        <span>(Online processing fee will be charged.)</span> 
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        You/somebody on your behalf can also deposit the 
                        <span>application fee</span> 
                        in cash at East West University Admission office, Aftabnagar, Dhaka. 
                    </li>
                </ul>

                <!-- <div class='container'>
                    {{Form::open(['url'=>"/frontend/online-admission-student-admit-card-front" , 'method'=>'post','id'=>'loginform','class'=>'form-vertical'])}}
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="main_input_box">
                                        <span class="add-on bg_lg"><i class="icon-user"> </i></span>{{Form::text('applicant_id','',['class'=>'form-control','placeholder'=>'Applicant ID','title'=>'Applicant ID','value'=>'old()','required' => 'true'])}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="main_input_box">
                                        <span class="add-on bg_ly"><i class="icon-lock"></i></span>{{Form::email('email','',['class'=>'form-control','placeholder'=>'Email','title'=>'Email','required' => 'true'])}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                            <div class="">
                                <div class="controls">
                                    <div class="main_input_box">
                                        <input type="hidden" name="user_type" value="Student">
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-2">
                            <div class="form-actions">
                                <div class="controls">
                                {{-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> --}}
                                    <span class=""><input type="submit" value="Login" class=" btn-sm btn-success btn-block pt-1 pb-2"></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div> -->

                <!-- btn -->
                <div class="btn_main_content mb-4">
                    <div class="card mr-2 ml-2">
                        <div class="card-body">
                            <h2 class="card-title">A</h2>
                            <a href="/frontend/online-admission-new-applicant" class="btn btn-primary btn-sm">New Applicatin</a>
                        </div>
                    </div>
                    <div class="card mr-2" >
                        <div class="card-body">
                            <h2 class="card-title">B</h2>
                            <a href="/frontend/online-admission-student-login" class="btn btn-primary btn-sm">To Complete The Addmission Form OR Addmission</a>
                        </div>
                    </div>
                </div>

                <h6 class="ml-3">Admission Eligibility for Undergraduate Program (except B.Pharm.):</h6>
                <ul class="">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Minimum GPA of 3.00 in both SSC and HSC Examinations (Minimum GPA 2.40 in Diploma in Engineering under Bangladesh Technical Eduation Board). or
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidates must have passed University of London and Cambridge GCE ‘O’ Level in at least five subjects and ‘A’ Level in at least two subjects. Only the best five subjects in ‘O’ Level and best two subjects in ‘A’ Level will be considered. Out of these seven subjects, a candidate must have at least 4B’s or GPA of 4.00 in the four subjects and 3 C’s or GPA of 3.5 in the remaining three subjects. (in the scale of A=5, B=4, C=3, D=2 and E=1
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        American High School Diploma, AND
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Acceptable zhsust Admission Test Score.
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Total GPA of 5.00 in both SSC and HSC Examinations for the children of Freedom Fighter. 
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Total GPA of 5.00 in both SSC and HSC Examinations for the children of Freedom Fighter. 
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        The final selection of candidates for admission in the Undergraduate Programs at zhsust will be based on the Admission Test scores obtained with 75% from admission test, 10% from SSC/O-level and 15% from HSC/A-level. 
                    </li>
                </ul>

                <h6 class="ml-3">Admission Eligibility for Bachelor of Pharmacy (B.Pharm) program:</h6>
                <ul class="pb-3">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidate must have a minimum aggregate GPA 6.50 in SSC/ O level or equivalent and HSC/ A level or equivalent examinations (in a total scale of 10).
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidates must have passed University of London and Cambridge GCE ‘O’ Level in at least five subjects and ‘A’ Level in at least two subjects. Only the best five subjects in ‘O’ Level and best two subjects in ‘A’ Level will be considered. Out of these seven subjects, a candidate must have at least 4B’s or GPA of 4.00 in the four subjects and 3 C’s or GPA of 3.5 in the remaining three subjects. (in the scale of A=5, B=4, C=3, D=2 and E=1
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidate must pass SSC/ O level or recognized equivalents and HSC/ A level or recognized equivalents in Science Group and obtain a minimum GPA 3.0 (in a scale of 5) without any additional subject.
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidate must pass HSC/ A level or recognized equivalent examination with a minimum GPA 3.0 in Chemistry and Biology separately and a minimum GPA 2.0 in Mathematics (in a scale of 5).
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidate must pass HSC/ A level or recognized equivalent examination in current year or one previous year.
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Foreign students must have passed 12 education years and got same grades in equivalent examinations from foreign recognized institutions. 
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        The student must pass HSC/ “A” level or recognized equivalents with the following science subjects: Physics, Chemistry, Biology and Mathematics.
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        However candidates having no Mathematics at the HSC/ “A” level or recognized equivalents may be admitted, but they need to take an extra 3 (three) credits course on Mathematics relevant to B. Pharm. curriculum.
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Admission should be based on competitive written test evaluations. In addition to written test, an oral test may be taken for further assessment. (Recognized equivalents mean Education Board, Madrasah Board and Bangladesh Technical Education Board)
                    </li>
                </ul>
            </div>
        </div><!-- Main content X -->
    </div>



 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


     @push('custom-scripts')
     @endpush
 @stop
