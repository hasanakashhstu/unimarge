
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

    .application_top_content h6{
        color: #fff;
    }

    .table{
        width: 580px;
        margin:auto;
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
                    <li><a href="{{ url('/frontend/application-form-front') }}">Application</a></li>
                    <li><a href="{{ url('/frontend/online-admission-form/{id}') }}">Application Form</a></li>
                    <li><a>Submission</a></li>
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
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                           <th colspan="2">
                                               <h2 class="text-center">Please collect ID and Email that's help to get admit card</h2>
                                           </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                           // echo '<pre>';
                                           // print_r($admit_card);
                                           // die;
                                         ?>

                                         <?php 
                                           // echo '<pre>';
                                           // print_r($admit_card);
                                           // die;
                                            echo 'hello';
                                         ?>

                                        @foreach($admit_card as $key => $admit_infomation)
                                        <?php 
                                            //echo '<pre>';
                                            //print_r($admit_card['applicant_id']);
                                            //die;
                                         ?>
                                            <tr>
                                                <th style="width: 150px">Student ID</th>
                                                <td>{{ $admit_infomation->applicant_id??'' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Student Email</th>
                                                <td>{{$admit_infomation->email??''}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
