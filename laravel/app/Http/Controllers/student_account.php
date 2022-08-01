<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use App\students_child;
use Session;
use App\general_settings_model;
class student_account extends Controller
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
        return view('student.student_account',['students'=>$students,'general_setting'=>$general_setting]);
       }
       else
        {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roll=Session::get('roll');
        $students_child=new students_child;
        $students_child_data=students_child::where('roll',$roll)->first();
         if($students_child_data)
         {
                $students_child_data->post_office=$request->post_office;
                $students_child_data->home_district=$request->home_district;
                $students_child_data->division=$request->division;
                $students_child_data->village_name=$request->village_name;
                $students_child_data->save();
         }
         else
         {
                $students_child->roll=$roll;
                $students_child->post_office=$request->post_office;
                $students_child->home_district=$request->home_district;
                $students_child->division=$request->division;
                $students_child->village_name=$request->village_name;
                $students_child->save();
         }

        if ($request->input('password') && $request->input('retype_password')){
           $this->validate($request, [
               'password' => 'required',
               'retype_password' => 'required|same:password',
           ]);
           $student = students::where('roll', $roll)->first();
           $student->password = encrypt($request->input('password'));
           $student->save();
         }

        if($request->file('image')):
            $filepath='img/backend/aplicant_student/';
            $filename=$roll.".jpg";
            $request->file('image')->move($filepath,$filename);
        endif;
        Session::flash('success','Information Updated SUccessfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
