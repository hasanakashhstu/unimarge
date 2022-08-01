@extends('website.index')
@section('website_main_section')
<div class="col-lg-8 twelve columns" id="left-content">
    <div class="row mainwrapper">
        <div class="panel panel-primary">
          <div class="panel-heading">Student of {{$department}}</div>
          <div class="panel-body">
            
            <?php 
            if((count($student_info)) == 0)
            {
            ?>
                    <font color="red">No Data Found</font>
            <?php
            }
            else
            {
            ?>
            <table class="table table-responsive table-bordered">
                @foreach($student_info as $key=>$value)
                <tr>
                    <th>{{$key+1}}</th>
                    <th style="width: 17%">
                        <?php
                            if(file_exists("img/backend/student/$value->roll.jpg")){
                                $student_image_path="img/backend/student/$value->roll.jpg";
                            }else{
                                $student_image_path="website/index_files/no_image.jpg";
                            }
                        ?>
                        <img width="100%" src="{{asset($student_image_path)}}">
                    </th>
                    <th>
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$value->student_name}}</td>
                            </tr>
                            <tr>
                                <td width="30%;">Department</td>
                                <td>:</td>
                                <td>{{$value->department}}</td>
                            </tr>
                            <tr>
                                <td width="30%;">Shift</td>
                                <td>:</td>
                                <td>{{$value->shift}}</td>
                            </tr>
                            <tr>
                                <td width="30%;">Roll</td>
                                <td>:</td>
                                <td>{{$value->roll}}</td>
                            </tr>
                            <tr>
                                <td width="30%;">Registration</td>
                                <td>:</td>
                                <td>{{$value->reg_number}}</td>
                            </tr>
                        </table>
                    </th>
                </tr>                   
                @endforeach
            </table>
            {{ $student_info->links() }}
            <?php
            }
            ?>

          </div>
        </div>
    </div>
</div>
@stop