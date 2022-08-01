<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\Manage_section_model;
use App\manage_department_model;
use App\students;
use Session;
use Redirect;
use Validator;
use App\ov_setup_model;
use App\make_autoname;
use App\general_settings_model;
use Hash;
class admit_bulk_student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj=new make_autoname();
        $default_session=general_settings_model::first();
        $class_filter=manage_class_model::select('class_name')->get();
//        $section_filter=manage_class_model::select('section_name')->get();
//        $department_filter=manage_class_model::select('department')->get();
        return view('admin.students.admit_bulk_student',['class'=>$class_filter,'general_settings'=>$default_session,'shift_data'=>ov_setup_model::where('type','Shift')->get(),'generate_autoname'=>$obj->autoname(),'medium'=>ov_setup_model::where('type','Medium')->get()]);
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
        
       //dd($request->all());

        $default_batch=general_settings_model::first();
        $batch=$default_batch->default_batch;
        $session=$default_batch->default_session;
        $students_obj=new students;
        $validation=Validator::make($request->all(),$students_obj->admit_bulk_student_rules());
        if($validation->fails())
        {
             return back()->withErrors($validation);
        }
        else
        {
            for($i=0;$i<count($request->student_name);$i++)
            {
                $students_obj=new students;
                $students_obj->student_name=$request->student_name[$i];
                $students_obj->roll=$request->roll[$i];
                $students_obj->reg_number=$request->reg_number[$i];
                $students_obj->shift=$request->shift;
                
                $students_obj->status='Active';
                $students_obj->email=$request->roll[$i];
                $students_obj->password=Hash::make($request->roll[$i]);
                $students_obj->batch=$batch;
                $students_obj->session=$session;



                $students_obj->class=$request->class;
                $students_obj->department=$request->department;
                $students_obj->section=$request->section;
                $students_obj->medium=$request->medium;
                

               $students_obj->save();
            }
            Session::flash('success',"Admit Student's Add Operation successfully Completed");
            return Redirect::back();
        }
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
        //
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

    public function admit_student_roll_name_genarate()
    {   
        // $obj=new make_autoname();
        // return $obj->autoname();



        $max_count=(int)students::max('id')+1;
        $max_count_length=strlen($max_count);
         $zero_repet=4-$max_count_length;
        $zero_r=str_repeat("0",$zero_repet);
         $student_id=$zero_r.$max_count;

        $current_year=date("y");
        $default_batch=general_settings_model::select('default_batch')->first();
        $default_session=general_settings_model::first();

        $autoname_name_element=['student_id'=>$student_id,'current_year'=>$current_year,'default_batch'=>$default_batch,'default_session'=>$default_session];

        return $autoname_name_element;
         

    }
}
