<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\class_routine_model;
use App\class_routine_end_child_model;
use App\class_routine_start_child_model;
use Redirect;
use Session;
use Validator;
use App\manage_subject_model;
use App\manage_section_model;
use App\manage_department_model;
use App\teacher_model;
use App\ov_setup_model;
class manage_class_routine extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
       $class_routine=new class_routine_model;
        
        $validation=Validator::make($request->all(),$class_routine->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else
        {
            $data=$request->all();
            $time=time();
            $data=array_add($data,'class_routine_id',$time);
            $data=array_add($data,'parent',$time);

            $class_starting_timestamp = strtotime("$request->class_starting_hour:$request->class_starting_minutes:00");
            $data=array_add($data,'class_starting_time',$class_starting_timestamp);


            $class_ending_timestamp = strtotime("$request->class_ending_hour:$request->class_ending_minutes:00");
            $data=array_add($data,'class_ending_time',$class_ending_timestamp);
            
            $class_routine->fill($data)->save();
            $class_routine_start_child=new  class_routine_start_child_model;
            $class_routine_start_child->fill($data)->save();
            
            $class_routine_end_child=new class_routine_end_child_model;
            $class_routine_end_child->fill($data)->save();
            Session::flash('success','New Class Routine Successfully');
            return back()->with('success','New Class Routine Added Successfully');
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
        $medium=ov_setup_model::where('type','Medium')->get();
        $section=class_routine_model::where('class_name',$id)->groupby('section')->get();
        $department=class_routine_model::where('class_name',$id)->groupby('department')->get();
        $medium_grp=class_routine_model::where('class_name',$id)->groupby('medium')->get();

        $teacher_details=teacher_model::where('status','Teacher')->get();
        $subject_info_class_wise=manage_subject_model::where('class',$id)->get();
        $section_class_wise=manage_section_model::where('class',$id)->get();
        return view('admin.class_routine.manage_class_routine',['class_name'=>$id,'section'=>$section,'subject_info_class_wise'=>$subject_info_class_wise,'section_info_class_wise'=>$section_class_wise,'teacher_detials'=>$teacher_details,'medium'=>$medium,'medium_grp'=>$medium_grp,'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class_routine_data=class_routine_model::where('class_routine_id',$id)->first();
       return view('admin.class_routine.Edit.manage_class_routine_edit',['class_routine_data'=> $class_routine_data,'class_name'=>$class_routine_data->class_name,'start_time_data'=>class_routine_start_child_model::where('parent',$id)->first(),'end_time_data'=>class_routine_end_child_model::where('parent',$id)->first(),'teacher_detials'=>teacher_model::where('status','Teacher')->get(),'subject_info_class_wise'=>manage_subject_model::where('class',$class_routine_data->class_name)->get(),'section_info_class_wise'=>manage_section_model::where('class',$class_routine_data->class_name)->get(),'medium'=>ov_setup_model::where('type','Medium')->get(),'department_data'=>manage_department_model::where('class_name',$class_routine_data->class_name)->get()]);
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
      $class_routine=new class_routine_model;
        
        $validation=Validator::make($request->all(),$class_routine->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else
        {
            $data=$request->all();
            $class_starting_timestamp = strtotime("$request->class_starting_hour:$request->class_starting_minutes:00");
            $data=array_add($data,'class_starting_time',$class_starting_timestamp);


            $class_ending_timestamp = strtotime("$request->class_ending_hour:$request->class_ending_minutes:00");
            $data=array_add($data,'class_ending_time',$class_ending_timestamp);
            
            $class_routine->where('class_routine_id',$id)->first()->fill($data)->save();
            $class_routine_start_child=new  class_routine_start_child_model;
            $class_routine_start_child->where('parent',$id)->first()->fill($data)->save();
            
            $class_routine_end_child=new class_routine_end_child_model;
            $class_routine_end_child->where('parent',$id)->first()->fill($data)->save();

           
            Session::flash('success',"$request->class_name Class Routine Update Successfully");
            return back()->with('success',"$request->class_name Class Routine Update Successfully");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             

         class_routine_model::where('class_routine_id',$id)->delete();
         class_routine_start_child_model::where('parent',$id)->delete();
         class_routine_end_child_model::where('parent',$id)->delete();
         
        session()->flash('success', "Class Routine is Succesfully Deleted");
        return back()->with('success','Class Routine is  Succesfully Deleted');
    }
}
