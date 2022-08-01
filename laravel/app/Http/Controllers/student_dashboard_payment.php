<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_model;
use Session;
use App\students;
use App\general_settings_model;
class student_dashboard_payment extends Controller
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

          $roll=Session::get('roll');
          $class=Session::get('class');
          $students=students::where('roll',$roll)->first();
            $general_setting=general_settings_model::first();
          return view('student.student_dashboard_payment',['invoice_data'=>invoice_model::where('student_roll',$roll)->where('class_name',$class)->get(),'students'=>$students,'general_setting'=>$general_setting]);
        }
        else
        {
            abort(404);
        }
        
    }
}
