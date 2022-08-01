@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
              <div class="panel-heading">Courses</div>
              <div class="panel-body" style="background: #f2f2f2;">
                
                <?php 
                if((count($course)) == 0)
                {
                ?>
                        <font color="red">No Data Found</font>
                <?php
                }
                else
                {
                ?>
                
                @foreach($course as $key => $value)
                <div class="col-lg-4" style="padding: 0px;">
                    <div class="course">
                        <div class="course_top">
                            <img src="{{asset($value->banner)}}" class="gallery_image" style="width: 100%;height: 110px; border-radius: 10px 10px 0px 0px;
">
                        </div>
                        <div class="course_details">
                            <h5>{{$value->title}}</h5>
                            <p><i class="fa fa-calendar"></i>&nbsp;{{ Carbon\Carbon::parse($value->start_date)->format('d M') }} - {{ Carbon\Carbon::parse($value->end_date)->format('d M Y') }}</p>
                            <p style="line-height: 7px;">
                                <b><i class="fa fa-clock-o"></i>&nbsp;Total Hours :</b> {{$value->total_hours}}</p>
                            <p><b>Amount :</b> {{$value->amount}} TK.</p>
                        </div>
                        <hr>
                        <div class="course_footer">
                            <a href="/frontend/course/{{$value->website_course_id}}">
                                <button class="btn btn-danger btn-lg" >Enroll Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <?php
                }
                ?>

              </div>
            </div>
        </div>

    </div>

@stop