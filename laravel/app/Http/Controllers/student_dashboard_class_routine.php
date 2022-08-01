<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\class_routine_model;
use App\class_routine_end_child_model;
use App\class_routine_start_child_model;
use App\students;
use App\general_settings_model;
class student_dashboard_class_routine extends Controller
{
     /**
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
             $section=class_routine_model::where('class_name',$class)->groupby('section')->get();
             return view('student.student_dashboard_class_routine',['section'=>$section,'students'=>$students,'general_setting'=>$general_setting]);
        }
        else
        {
            abort(404);
        }
        
    }
}
