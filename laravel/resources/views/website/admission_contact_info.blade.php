
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
                  <li><a>Contacts</a></li>
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
                <div class="contact-area">
                    <!-- Contact info -->
                    <div class="container">
                        <div class="section-title text-center">

                            <h2 class="title">Get in touch</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-6">

                                <ul class="details">
                                    <li><i class="fa fa-map-marker"></i>Vill-Madhupur, Post-Kartikpur, P.S-Bhedergonj,Dist-Shariatpur
                                    </li>
                                    <li><i class="fa fa-envelope"></i>zhsust.campus@gmail.com</li>
                                    <li><i class="fa fa-phone"></i>+8801313760750</li>
                                </ul>

                            </div>
                            <div class="col-lg-7 col-md-6 align-self-center">
                                <form class="contact-form-inner  mt-5 mt-md-0" action="" method="POST">
                                    <input type="hidden" name="_token" value="">
                                    <div class="row custom-gutters-20">
                                        <div class="col-lg-6">
                                            <label class="single-input-inner style-bg-border">
                                                <input type="text" name="first_name" placeholder="First Name" value="">
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="single-input-inner style-bg-border">
                                                <input type="text" name="last_name" placeholder="Last Name" value="">
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label class="single-input-inner style-bg-border">
                                                <input type="email" name="email" placeholder="Email" value="">
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label class="single-input-inner style-bg-border">
                                                <textarea placeholder="Message" name="message"> </textarea>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-base">Send Message</button>
                                        </div>
                                    </div>
                                </form>
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
