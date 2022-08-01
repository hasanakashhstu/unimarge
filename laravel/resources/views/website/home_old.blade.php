@extends('website.index')
@section('website_main_section')

<div class="col-lg-8 twelve columns" id="left-content">
    <div class="row mainwrapper">
        <div class="col-lg-12">
            <div class="row" id="about">
                <h2 style="margin-left: 10px">Welcome to TISI</h2>
                <hr>
                <div class="about_content">
                    <img src="{{asset('website/index_files/tisi.jpg')}}" style="float: left; width: 50%; margin: 7px 10px 10px 10px; border: 2px solid #ddd;">
                    <p style="margin-bottom: 0px;">{{$about_us->about_us}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-lg-12">
            <div class="row" id="notice-board" class="ticker-container" style="background-image: url('website/index_files/recent_news.png'); background-size: 327px; background-repeat: no-repeat; background-color: #f5f5f5;">
                <div class="notice-board-bg">
                    <h2 style="margin-left: 28px;">Notice Board</h2>

                    <div id="notice-board-ticker" style="max-height: 190px " class="ticker ticker1">

                        <ul style="width: 97%;">
                            @foreach($notice as $notice_data)
                            <li class="notice_list">
                                <i class="fas fa-caret-right"></i>
                                <a href="/frontend/notice/{{$notice_data->notice_id}}">
                                    <span>{{str_limit($notice_data->notice_title, 50)}}</span>
                                    <br>
                                    <span style="margin-left: 28px; font-size: 10px;color: black">Publish Date : {{$notice_data->created_at->format('d M Y')}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <div style="padding: 15px;">
                        <a class="btn right" href="/frontend/notice" style=" background: #428dc9;border-radius: 0px; font-size: 10px; color: #fff;">
                        See all notice</a>
                    </div>
                </div>
            </div>
     <!--        <div class="row">
                <div id="box-1" class="col-lg-6 six columns service-box box">
                    <h4>ADMINISTRATION</h4>
                    <p>{{str_limit($about_us->about_us,180)}}<a href="/frontend/about_us">Read More</a></p>
                </div>
                <div id="box-1" class="col-lg-6 six columns service-box box">
                    <a href="/frontend/online-admission">
                        <h4>ONINE ADMISSION</h4>
                        <img src="{{asset('website/index_files/images.jpg')}}" style="width: 75px;">
                    </a>
                </div>
            </div> -->
        </div>
        <hr>
        <div class="col-lg-12">
            <div class="row">

                <div style="width: 345px" class="five columns panel panel-danger">
                  <div class="panel-heading">Course Material</div>
                      <div class="panel-body">

                        <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width: 44%"><img  style='height:100px'src="website/index_files/course_material.gif"  width="100%" height="157px"> </td>
                                    <td>
                                        <ul style="list-style: disclosure-closed">
                                            <li><a href="#">Academic Syllabus</a></li>
                                            <li><a href="#">Class Routine</a></li>
                                            <li><a href="#">Libray</a></li>
                                        </ul>
                                    </td>
                                </tr>

                            </table>

                      </div>
                </div>

                <div style="width: 345px;margin-left: 4%" class="five columns panel panel-primary">
                  <div class="panel-heading">Online Admission</div>
                  <div class="panel-body">

                        <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width: 44%"><img  style='height:100px'src="website/index_files/open.gif"  width="100%" height="157px"> </td>
                                    <td>
                                        <ul style="list-style: disclosure-closed">
                                            <li><a href="/frontend/online-admission">Online Application For Admission</a></li>
                                             <li style="list-style: none;font-size: 11px;text-align: justify;">Click Here  Get Online application for admission</li>
                                        </ul>
                                    </td>
                                </tr>

                            </table>
                  </div>
                </div>


            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">

               <div style="width: 345px" class="five columns panel panel-success">
                  <div class="panel-heading">Student Portal</div>
                      <div class="panel-body">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="width: 44%"><img  style='height:100px'src="website/index_files/student-mgmt.gif"  width="100%" height="157px"> </td>
                                    <td>
                                        <ul style="list-style: disclosure-closed;">
                                            <li><a href="{{url('/student')}}">Login</a></li>
                                            <li style="list-style: none;font-size: 11px;text-align: justify;">For Check Your Attendence , Fees Information , Result , Digital Content </li>
                                        </ul>
                                    </td>
                                </tr>

                            </table>
                      </div>
                </div>
                 <div style="width: 345px;margin-left: 4%" class="five columns panel panel-warning">
                  <div class="panel-heading">Parent Portal</div>
                     <div class="panel-body">
                         <table border="0" cellpadding="0" cellspacing="0">
                             <tr>
                                 <td style="width: 44%"><img  style='height:100px'src="website/index_files/parent_login.gif"  width="100%" height="157px"> </td>
                                 <td>
                                     <ul style="list-style: disclosure-closed;">
                                         <li><a href="{{url('/parent')}}">Login</a></li>
                                         <li style="list-style: none;font-size: 11px;text-align: justify;">For Check Your Child Activities </li>
                                     </ul>
                                 </td>
                             </tr>

                         </table>
                     </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div style="width: 345px" class="five columns panel panel-danger">
                    <div class="panel-heading">Online Class</div>
                    <div class="panel-body">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width: 44%"><img  style='height:100px'src="website/index_files/live_class.gif"  width="100%" height="157px"> </td>
                                <td>
                                    <ul style="list-style: disclosure-closed">
                                        <li><a href="/student">Online Class</a></li>
                                        <li style="list-style: none;font-size: 11px;text-align: justify;">Click Here And Start Online Class</li>
                                    </ul>
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>

                <div style="width: 345px;margin-left: 4%" class="five columns panel panel-primary">
                    <div class="panel-heading">Extra Facilties</div>
                    <div class="panel-body" style="height: 129px;">
                        <ul>
                            <li><a href="#">Transport</a></li>
                            <li><a href="#">Dorimitory</a></li>
                            <li><a href="#">Canteen</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <!-- <div class="col-lg-12">
            <div class="row">
                <div id="box-3" class="six columns service-box box">
                    <h4>Course Material</h4>
                    <ul class="caption fade-caption" style="margin:0">
                        <li><a href="/site/page/a34671e3-a81c-4927-834f-19d6afc41217/Diploma-Level" title="Diploma Level">Diploma Level</a></li>
                        <li><a href="/site/page/a34671e3-a81c-4927-834f-19d6afc41217/HSC-Level" title="HSC Level">HSC Level</a></li>
                        <li><a href="/site/page/a34671e3-a81c-4927-834f-19d6afc41217/SSC-Level" title="SSC Level">SSC Level</a></li>
                        <li><a href="/site/page/a34671e3-a81c-4927-834f-19d6afc41217/Basic-and-Others" title="Basic and Others">Basic and Others</a></li>
                    </ul>
                </div>
            </div>
        </div> -->



    </div>


     <div class="col-lg-12">
           <!--  <div class="row row_border" id="mission_vission"  style="margin-bottom: 0px">
                
                <h3 class="header_msg_section_title">Short Courses</h3>



                





                @foreach($course as $key => $value)
                <div class="col-lg-4">
                    <div style="margin-top: 8px;margin-top: 8px;width: 261px;height: 390px;border: gray 1px solid;border-radius: 10px">
                        <div class="pricing-item" style="padding: 0px 0px 5px; height: 390px;">
                            <div class="pricing-top" style="padding: 0px;">
                                <img style="height: 128px;width: 258px;border-radius: 10px 10px 0px 0px;" src="{{asset($value->banner)}}" style="height: 128px;">
                            </div>
                            <div style="padding: 10px;">
                                <a href="/frontend/course/{{$value->website_course_id}}" style="font-size: 15px;font-weight: bold;color: black;"><h6>{{$value->title}}</h6></a>
                            </div> 
                            <div style="text-align: left;height: 33%">
                                <ul style="padding: 0px 10px !important;">
                                    <li style="padding: 0px;"><i class="fa fa-calendar"></i>&nbsp;{{ Carbon\Carbon::parse($value->start_date)->format('d M') }} - {{ Carbon\Carbon::parse($value->end_date)->format('d M Y') }}</li> 
                                    <li style="padding: 0px;"><i class="fa fa-clock-o"></i>&nbsp;<span>Total Hours :</span><span>{{$value->total_hours}}</span></li><li style="padding: 0px;">৳&nbsp;&nbsp;<span>{{$value->amount}}</span> TK</li>
                                </ul>
                            </div>
                            <div class="course_footer" style="text-align: center;"> 
                                <ul>
                                    <li class="pricing_btn_area">
                                        <a class="btn btn-danger" href="/frontend/course/{{$value->website_course_id}}" class="default-btn fluide-btn">Enroll Now</a>
                                    </li>
                                </ul>
                            </div> 

                        </div>
                    </div>
                </div>
                @endforeach
            </di v>-->
        </div>


</div>
<script type="text/javascript">
    /* Type-1 */
    $('.ticker1, .ticker2').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 2000,
        height: 'auto',
        visible: 5,
        mousePause: 1,
        controls: {
            up: '',
            down: '',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        }
    });
</script>
@stop