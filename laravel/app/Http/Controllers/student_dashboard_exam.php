<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\exam_list_model;
use App\teacher_model;
use App\students;
use App\general_settings_model;
class student_dashboard_exam extends Controller
{ /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_auth_check=Session::get('student_or_parents_login');
        if($user_auth_check=='Loggedin')
        {   
             $class=Session::get('class');
             $roll=Session::get('roll');
            $students=students::where('roll',$roll)->first();
            $general_setting=general_settings_model::first();
            $exam_list=exam_list_model::join('teacher','teacher.teacher_id','=','exam_list.controller')->where('publish','Yes')->get();
             return view('student.student_dashboard_exam',['exam_list'=>$exam_list,'students'=>$students,'general_setting'=>$general_setting]);
        }
        else
        {
            abort(404);
        }
        
    }
}
