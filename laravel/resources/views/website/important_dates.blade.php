
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
    .t-cente{
        text-align: center;
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
                  <li><a>Important Dates</a></li>
                </ul>
             </div>
         </div>
     </div>

     <div class="container">
        
        <!-- online addmission nav -->
        @include('website.includes.online_admission_nav')
        
        <div class="main_content">
            <div class="ins_title">Available Program(s) For admission</div>
            <div class="application_top_content mt-3">
                <div class="Table">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th colspan="3" class="t-cente">Undergraduate Admission Test</th>
                        </tr>
                        <tr>
                            <th>Program</th>
                            <th>Application Deadline</th>
                            <th>Date of Admission Test</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>B.Sc. in CSE</td>
                            <td>September 10 2022</td>
                            <td>Friday, 09 September 2022 at 10:00 AM</td>
                        </tr>
                        <tr>
                            <td>B.Sc. in EEE</td>
                            <td>September 10 2022</td>
                            <td>Friday, 09 September 2022 at 10:00 AM</td>
                        </tr>
                       
                        </tbody>
                    </table>

                    <table class="table table-striped table-bordered mt-3 table-sm">
                        <thead>
                        <tr>
                            <th colspan="3" class="t-cente">Graduate Admission Test</th>
                        </tr>
                        <tr>
                            <th>Program</th>
                            <th>Application Deadline</th>
                            <th>Date of Admission Test</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Master of Business Administration (MBA)</td>
                            <td>September 10 2022</td>
                            <td>Friday, 09 September 2022 at 10:00 AM</td>
                        </tr>
                        <tr>
                            <td>B.Sc. in EEE</td>
                            <td>MS in Applied Statistics</td>
                            <td>Friday, 09 September 2022 at 10:00 AM</td>
                        </tr>
                       
                        </tbody>
                    </table>
                    <br>

                </div>


            </div>
        </div><!-- Main content X -->
    </div>


 

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
 @stop
