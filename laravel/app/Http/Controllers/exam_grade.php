<?php

namespace App\Http\Controllers;
use Session;
use Crypt;
use Validator;
use App\exam_grade_model;
use Illuminate\Http\Request;
use App\manage_subject_model;
class exam_grade extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
       $this->middleware('permission:EXAM_GRADE'); 
     }

    public function index()
    {
        $subject_mark=manage_subject_model::groupBy('subject_mark')->pluck('subject_mark')->toArray();
        asort($subject_mark);
        return view('admin.exam.exam_grade',['exam_grade'=>exam_grade_model::all(),'subject_mark'=>$subject_mark]);
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
        $exam_grade=new exam_grade_model;
        $prev_data=$exam_grade->where('grade_for',$request->grade_for)
         ->where('grade_name',$request->grade_name)
         ->first();
        $validation=Validator::make($request->all(),$exam_grade->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else if(!empty($prev_data))
        {
            Session::flash('error','Grade Already Exists For This Mark');
            return back()->withInput();
        }
        else{
            $exam_grade->fill($request->all())->save();
             session()->flash('success', "New Grade Added ");
            return back()->with('success','New Grade Added ');
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
        $subject_mark=manage_subject_model::groupBy('subject_mark')->pluck('subject_mark')->toArray();
        asort($subject_mark);
        return view('admin.exam.exam_grade_edit',['exam_grade'=>exam_grade_model::where('id',$id)->first(),'subject_mark'=>$subject_mark]);
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
        $exam_grade=new exam_grade_model;
        
        $validation=Validator::make($request->all(),$exam_grade->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else{
            exam_grade_model::where('id',$id)->first()->fill($request->all())->save();
             session()->flash('success', " Exam Grade updated successfully ");
            return back()->with('success','Exam Grade updated successfully ');
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
        exam_grade_model::find($id)->delete();
        Session::flash('success','Exam Grade Deleted Successfully');
        return back();
    }
}
