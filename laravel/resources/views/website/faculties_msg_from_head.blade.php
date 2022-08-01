@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
             <div class="panel panel-primary">
              <div class="panel-body">
                
                <?php 
                if(!isset($faculties))
                {
                ?>
                        <font color="red">No Data Found</font>
                <?php
                }
                else
                {
                ?>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 style="background: #428bc9; padding: 6px; color: #fff; border-radius: 7px;">Department Head</h4>
                                <p><b>{{$faculties->teacher_name}}</b></p>
                                <p><b>{{$faculties->website_faculties_name}}</b></p>
                                <p>{{$faculties->designation}} & Head of the Department </p>
                        </div>
                        <div class="col-lg-12">
                            <h4 style="background: #428bc9; padding: 6px; color: #fff; border-radius: 7px;">Contact</h4>
                            <p>Office of the Department Head</p>
                            <p>Mobile : {{$faculties->mobile_no}}</p>
                            <p>Email : {{$faculties->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                        if(file_exists('img/backend/teacher_staff/'.$faculties->teacher_id.'.jpg')){
                            $student_image_path='img/backend/teacher_staff/'.$faculties->teacher_id.'.jpg';
                        }else{
                            $student_image_path="website/index_files/no_image.jpg";
                        }
                    ?>
                    <img width="100%" src="{{asset($student_image_path)}}">
                </div>
                <div class="col-lg-12">
                    <h4 style="background: #428bc9; padding: 6px; color: #fff; border-radius: 7px;">Message</h4>
                    <p>{{$faculties->msg_from_head}}</p>
                </div>

                <?php
                }
                ?>
              </div>

            </div>

        </div>
    </div>

@stop