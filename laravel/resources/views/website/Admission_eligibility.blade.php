
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
                  <li><a>Admission Eligibility</a></li>
                </ul>
             </div>
         </div>
     </div>

     <div class="container">
        
        <!-- online addmission nav -->
        @include('website.includes.online_admission_nav')

        <div class="main_content">
            <div class="ins_title">Admission Eligibility</div>
            <div class="application_top_content">
                <h6 class="ml-3 mt-3">Undergraduate Program (except B.Pharm.):</h6>
                <ul class="">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Minimum GPA of 3.00 in both SSC and HSC Examinations (Minimum GPA 2.40 in Diploma in Engineering under Bangladesh Technical Eduation Board). or
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidates must have passed University of London and Cambridge GCE ‘O’ Level in at least five subjects and ‘A’ Level in at least two subjects. Only the best five subjects in ‘O’ Level and best two subjects in ‘A’ Level will be considered. Out of these seven subjects, a candidate must have at least 4B’s or GPA of 4.00 in the four subjects and 3 C’s or GPA of 3.5 in the remaining three subjects. (in the scale of A=5, B=4, C=3, D=2 and E=1)
                    </li>
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidates must have passed University of London and Cambridge GCE ‘O’ Level in at least five subjects and ‘A’ Level in at least two subjects. Only the best five subjects in ‘O’ Level and best two subjects in ‘A’ Level will be considered. Out of these seven subjects, a candidate must have at least 4B’s or GPA of 4.00 in the four subjects and 3 C’s or GPA of 3.5 in the remaining three subjects. (in the scale of A=5, B=4, C=3, D=2 and E=1)
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
                        The final selection of candidates for admission in the Undergraduate Programs at zhsust will be based on the Admission Test scores obtained with 75% from admission test, 10% from SSC/O-level and 15% from HSC/A-level.
                    </li>
                </ul>

                <h6 class="ml-3">Admission Eligibility for Bachelor of Pharmacy (B.Pharm) program:</h6>
                <ul class="">
                    <li>
                        <i class="fa fa-check-square-o"></i> 
                        Candidate must have a minimum aggregate GPA 6.50 in SSC/ O level or equivalent and HSC/ A level or equivalent examinations (in a total scale of 10).   
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

                <h6 class="ml-3">Admission test waiver:</h6>
                <ul class="">
                    <li>
                        The candidates securing a minimum total score of 1500 in SAT (considering Critical Reading, Math and Writing). The candidates seeking admission in the Faculty of  Sciences and Engineering must have minimum Grade Point 3.5 in Math and Physics separately in HSC/A level examinations in addition to above mentioned SAT score to get waiver from the Admission Test.  
                    </li>
                </ul>

                <h6 class="ml-3">For foreign students:</h6>
                <ul class="">
                    <li>
                        Foreign Students particularly who come from other systems like US High School Diploma, Indian/Nepalese system etc. (not from SSC/HSC or O/A Level etc. system) the admission eligibility will be as follows:
                        <ul class="">
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Must have 12 years of schooling.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                SAT score of 1100 or
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Upper 50% marks/grade of their own education system
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="">
                    <li>
                        An equivalence committee will assess and recommend for satisfactory grade for the applicants who seek admission in EWU with US High School Diploma or who come from other systems. A committee will assess and recommend for Scholarship/Financial Aid etc. (if applicable) for foreign students and the students from other systems.
                    </li>
                </ul>

                <h6 class="ml-3">Graduate Program (MBA & EMBA):</h6>
                <ul class="">
                    <li>
                        Admission to the MBA & EMBA programs are selective. To apply for admission, students must fulfill the criteria outlined below:
                        <ul class="">
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Successful completion of at least a Bachelor degree from a reputed University, and
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Minimum GPA of 2.50 in both SSC and HSC Examinations. or
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Candidates must have passed University of London and Cambridge GCE ‘O’ Level in at least five subjects and ‘A’ Level in at least two subjects. Only the best five subjects in ‘O’ Level and best two subjects in ‘A’ Level will be considered. Out of these seven subjects, a candidate must have at least 4B’s or GPA of 4.00 in the four subjects and 3 C’s or GPA of 3.5 in the remaining three subjects. (in the scale of A=5, B=4, C=3, D=2 and E=1
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                <span>For MBA</span> 
                                Work experience after graduation in an executive position is preferred but not essential.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                <span>For EMBA</span> 
                                Must have at least two years work experience after graduation in an executive position.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                MBA written test will be waived to the graduates of zhsust with a CGPA of 3.80 and above in Undergraduate level.
                            </li>
                            <li>
                                <i class="fa fa-check-square-o"></i> 
                                Admission into EMBA programs will be on the basis of interview
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="">
                    <li>
                       Seven points calculated on the basis of the following criteria:
                    </li>
                </ul>
                <div class="Table">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr class="text-center">
                            <th colspan="2">SSC/HSC</th>
                            <th colspan="2">Bachelor</th>
                            <th colspan="2">Masters</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Div/GPA</td>
                            <td>Point</td>
                            <td>Div/GPA</td>
                            <td>Point</td>
                            <td>Div/GPA</td>
                            <td>Point</td>
                        </tr>
                        <tr>
                            <td>1st /GPA≥3.5</td>
                            <td>3</td>
                            <td>1st /GPA≥3.0</td>
                            <td>5</td>
                            <td>1st /GPA≥3.0</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2nd /GPA≥2.5</td>
                            <td>2</td>
                            <td>2nd /GPA≥2.5</td>
                            <td>3</td>
                            <td>2nd /GPA≥2.5</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>3rd /GPA≥2.0</td>
                            <td>1</td>
                            <td>3rd /GPA≥2.0</td>
                            <td>1</td>
                            <td>3rd /GPA≥2.0</td>
                            <td>0</td>
                        </tr>

                        </tbody>
                    </table>
                    
                    <h6 class="mt-4">Required Documents During Admission:</h6>
                    <ul class="mb-5">
                        <li>
                        All Academic Certificates & Mark Sheets/Transcripts in original and photocopies
                            (Original copies will be back/return after verifying with photocopies)
                        </li>
                    </ul>

                </div>


            </div>
        </div><!-- Main content X -->
    </div>

 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
 @stop
