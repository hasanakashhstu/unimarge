
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

    {{-- Instruction --}}
    .ins_title{
        width: 100%;
        padding: 5px 5px 5px 15px;
        font-size: 14px;
        background: #1371a9;
    }

    {{-- Table --}}
    .table{
        width: 98% !important;
    }
    table tr{
        background: white;
    }

    .Table{
        margin: 0px 10px 10px 10px;
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
                  <li><a href="{{ url('/frontend/online-admission') }}">Online Addmission</a></li>
                  <li><a>Guideline</a></li>
                </ul>
             </div>
         </div>
     </div>

     <div class="container">
        
        <!-- online addmission nav -->
        @include('website.includes.online_admission_nav')
        
        <div class="main_content">
            <div class="ins_title">Guidline</div>
            <div class="application_top_content">
                <h6 class="ml-3 mt-3">Instructions and guidelines for submitting an Online Admission Form:</h6>
                <ul class="">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Necessary directions regarding the zhsust admission have been provided at zhsust website (https://zhsust.edu.bd/). The qualifications and requirements for applying in Undergraduate and Graduate programs are explained at zhsust website in details. The procedure and Guidelines for submitting Online Admission Form are given below:
                    </li>
                </ul>

                <h6 class="ml-3 mt-3">Guidelines for Submitting Online Admission Form</h6>
                <ul class="">
                    <li>
                        <ul>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Use any (for best result Google Chrome or Mozila Firefox can be used) web browser to go to zhsust website (https://zhsust.edu.bd/) to get the EWU Online Admission Form.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               A new applicant is to click “Create New Applicant” and then choose a program he/she wants to apply by clicking “Click here to apply”. After selecting a program, applicants cannot change the program.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               After selecting a Program, applicant will get option to fill in his/her Name, Mobile Number and email address (Optional). After filling the above fields a “zhsust Login ID” will be displayed on the next screen. Applicant should note down the “zhsust Login ID” (Example 01876543) as the applicant will require it for payment and further login. Applicant can also download/print the pay slip for payment. This "zhsust Login ID" is also sent to the applicants through email.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               The Application Fee is Tk-1,200/-(Non Refundable) is to be paid in cash at zhsust Admission Office.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               You can pay application fee online using BKash and Rocket. (Online processing fee will be charged.)
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               After clearing the payment the Applicant will put the zhsust Login ID and the Mobile Number, to “SIGN IN”. Now the applicant is eligible to fill in and submit the Online Admission Form.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Applicant must fill in the Online Admission Form carefully. The fields which are indicated with Star Marks (*) are mandatory to fill in.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Applicant is responsible for the correctness of the information he/she has provided. If any false/wrong information is detected any time, the Application as well as the Admission (if qualified) of the candidate will be cancelled.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Scanned copy of the applicant’s recent (Not older than six months) Passport Size Colored Photograph is required to be uploaded with the Online Admission Form (*.jpg with Max size of 100Kb).
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Scanned signature of the applicant’s (background should be white) is required to be uploaded with the Online Admission Form (*.jpg with Max size of 60Kb).  
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Applicant may save the form for further review/edit. Applicant may also Preview the filled in form for download in PDF format. It is strongly recommended that the applicants preview the Online Admission Forms before submission. Once the applicant submits the form he/she will have no access to that form for editing. The applicant will get the appropriate buttons below the form Save->Submit form->Preview.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               After successful submission of the Online Admission Form, applicant will get the following message “Your form has been submitted successfully. For obtaining the Admit Card click on the Admit Card”.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Applicants must take a clear print of the Admit Card.  Applicants can print/download the Admit Card any time instantly by logging in the applicants unique zhsust Login ID and the Mobile Number. Without the Admit Card applicants will not be allowed to appear the Admission Test.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Applicants must bring their original copy of HSC/Equivalent registration card/A-Level statement of entry during admission test as well as during admission (if qualified).
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                               Regarding admission the decision of zhsust Admission committee shall be final.
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="mt-3 pb-3">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        <span>For further help</span> 
                        applicants may contact zhsust Admission Office at Vill-Madhupur, Post-Kartikpur, P.S-Bhedergonj,Dist-Shariatpur or Mobile: +8801313760750 or email: zhsust.campus@gmail.com
                    </li>
                </ul>



            </div>
        </div><!-- Main content X -->
    </div>

 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
 @stop
