@extends('website.index')
@section('website_main_section')

    <div class="col-lg-8 twelve columns" id="left-content">
        

        <div class="row mainwrapper">
            <section class="course_area_section" style="background-image: url(https://tmss-ict.com/course_background_image.jpg); background-size:cover; background-attachment: scroll; width: 100%; color: #fff;">
        <div class="course_area" style="padding-top: 20px; background: rgba(30, 49, 51, 0.7) none repeat scroll 0 0; height: 340px;">
            <div class="container" style="position: relative;">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="course_title_img">
                            <img src="{{asset($course->banner)}}" width="100%">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-6">
                        <div class="course_title_heading">
                            <h3>{{$course->title}}</h3>
                            <p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: #fff">{!! str_limit($course->description, 100 ) !!}</p>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row course_details_row" style="margin-top: 15px; padding-top: 15px;">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3>Course At A Glance</h3>
                        <ul style="list-style: none;">
                            <li style="padding: 0px;">
                                <i class="fa fa-calendar"></i>&nbsp;{{ Carbon\Carbon::parse($course->start_date)->format('d M') }} - {{ Carbon\Carbon::parse($course->end_date)->format('d M Y') }}
                            </li>
                            <li style="padding: 0px;">
                                <i class="fa fa-clock-o"></i>&nbsp;
                                <span>Total Hours :</span>
                                <span>{{$course->total_hours}}</span>
                            </li>
                            <!---->
                            <li style="padding: 0px;">
                                <i class="fa fa-map-marker"></i>&nbsp;
                                <span>{{$course->venue}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        @if($course->amount == 0)
                        <img src="https://tmss-ict.com/free.png" style="width: 35%;">
                        @endif
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#myModal">Enroll Now</button>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12"></div>
                </div>
            </div>
            <div class="course_before"></div>
        </div>
        </section>

            <div class="col-lg-12 header_msg_section" style="background: #fafafa;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>TENTATIVE CLASS START</h5>
                                    <p>{{ Carbon\Carbon::parse($course->start_date)->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>AVAILABLE SEAT</h5>
                                    <p>{{ $course->available_seat }}</p>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade in">
                                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
                                        </div>
                                       
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible fade in">
                                          <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <ul  style='list-style:none'>
                                                @foreach ($errors->all() as $error)
                                                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#myModal">Enroll Now</button>
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>WHO CAN JOIN</h5>
                                    <p>{{ $course->who_can_join }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>TRAINING VENUE</h5>
                                    <p>{{ $course->venue }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>Schedule</h5>
                                    <p>{{ $course->schedule }}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="course_details_box">
                                    <h5>INSTRUCTOR</h5>
                                    <img src="{{asset($course->trainner_image)}}" style="width: 75%">
                                    <p style="margin-top:10px">{{ $course->trainner_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div style="padding-right: 10px">
                            <h3>{{$course->title}}</h3>
                            <p style="text-align: justify;">{{$course->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Registration</h4>
          </div>
          {{Form::open(['url'=>'/frontend/course/registration','method'=>'post','files'=>true])}}
            <span style="color:red; margin-left: 15px;">required*</span>
          <div class="modal-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="hidden" name="course_id" value="{{$course->website_course_id}}">
                <input type="text" id="name" class="form-control" name="name">
                    <br>
            </div>
            <div class="form-group">
                <label for="father_name">Father Name:</label>
                <input type="text" id="" class="form-control" name="father_name">
            <br>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" class="form-control" name="phone">
                <br>
            </div>
            <div class="form-group">
                <label for="registration_no">SSC Registration Number:</label>
                <input type="text" id="registration_no" class="form-control" name="registration_no">
                <br>
            </div>
            <div style="text-align: center;">
                <img src="{{asset('img/blankavatar.png')}}" style="width: 25%; margin-bottom: 10px;" id="image_avater">
                <input type="file" id="image" class="form-control" name="image" onchange="bannerURL(this)">
                <br>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Submit</button>
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          {{Form::close()}}
        </div>

      </div>
    </div>
<script type="text/javascript">
    function bannerURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_avater')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }
</script>
@stop