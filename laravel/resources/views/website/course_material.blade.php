@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
              <div class="panel-heading">Course Material Of {{$department}} - {{$semester}}</div>
              <div class="panel-body">
                
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Syllabus</th>
                        <th>{{$semester}}</th>
                        <th>{{$department}}</th>
                        <th>
                            @if(isset($syllebus))
                            <a href="{{asset('img/backend/academic_syllabus/'.$syllebus->class_name.'_'.$syllebus->subject.'.pdf')}}">Download</a>
                            @else
                            <span style="color: red;">No Data Found</span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th>Providan</th>
                        <th>{{$semester}}</th>
                        <th>{{$department}}</th>
                        <th><a href="{{$website_setup->providan_link}}">Download</a></th>
                    </tr>
                    <tr>
                        <th>Academic Calender</th>
                        <th>{{$semester}}</th>
                        <th>{{$department}}</th>
                        <th><a href="{{$website_setup->academic_calender_link}}">Download</a></th>
                    </tr>
                    <tr>
                        <th>Exam Suggesion</th>
                        <th>{{$semester}}</th>
                        <th>{{$department}}</th>
                        <th>
                            @if(isset($question))
                            <a href="{{asset($question->title.'/'.$question->file_extension)}}">Download</a>
                            @else
                            <span style="color: red;">No Data Found</span>
                            @endif
                        </th>
                    </tr>
                </table>
              </div>
            </div>
        </div>
    </div>

@stop