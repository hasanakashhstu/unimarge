@extends('website.index')
@section('website_main_section')

    <div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
              <div class="panel-heading">{{$department}} Teacher Info</div>
              <div class="panel-body">
                
                <?php 
                if((count($teacher_info)) == 0)
                {
                ?>
                        <font color="red">No Data Found</font>
                <?php
                }
                else
                {
                ?>
                <table class="table table-responsive table-bordered">
                    @foreach($teacher_info as $key=>$value)
                        <tr>
                            <th>{{$key+1}}</th>
                            <th style="width: 17%">
                                <?php
                                    if(file_exists('img/backend/teacher_staff/'.$value->teacher_id.'.jpg')){
                                        $student_image_path='img/backend/teacher_staff/'.$value->teacher_id.'.jpg';
                                    }else{
                                        $student_image_path="website/index_files/no_image.jpg";
                                    }
                                ?>
                                <img width="90%" src="{{asset($student_image_path)}}">
                            </th>
                            <th>
                                <table class="table">
                                    <tr>
                                        <td style="width: 170px">Name</td>
                                        <td>:</td>
                                        <td>{{$value->teacher_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$value->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td>:</td>
                                        <td>{{$value->designation}}</td>
                                    </tr>
                                 
                                </table>
                            </th>
                        </tr>                   
                    @endforeach
                </table>
                {{ $teacher_info->links() }}
                <?php
                }
                ?>
              </div>
            </div>
        </div>
    </div>

@stop
