<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\assign_transport_model;
use App\students;
use App\general_settings_model;
class student_dashboard_transport extends Controller
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
             return view('student.student_dashboard_transport',['transport_data_list'=>assign_transport_model::where('student_roll',$roll)->first(),'students'=>$students,'general_setting'=>$general_setting]);
        }
        else
        {
            abort(404);
        }
        
    }
}
