<?php

namespace App\Http\Controllers;
use App\manage_class_model;
use App\manage_section_model;
use App\exam_list_model;
use App\teacher_model;
use App\manage_department_model;
use App\question_paper_model;

use Illuminate\Http\Request;
use session;
use Validator;
use File;
use Redirect;

class question_paper extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
       $this->middleware('permission:QUESTION_PAPER'); 
     }
     
    public function index()
    {
        return view('admin.exam.question_paper',['manage_class'=>manage_class_model::all(),'manage_section'=> Manage_section_model::all(),'exam_lsit'=>exam_list_model::all(),'teacher_lsit'=>teacher_model::all(),"department"=>manage_department_model::all(),'question'=>question_paper_model::all()]);
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
       

        $question_paper=new question_paper_model;
        $validation=Validator::make($request->all(),$question_paper->validation());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
            $Data=$request->all();
           $extension=$request->file('files')->getClientOriginalExtension();
           $slug=str_slug($request->exam_name.'-'.$request->section_name.'-'.$request->department,'-');
           $Data=array_add($Data,'file_extension',$extension);
           $Data=array_add($Data,'title',$slug);
            $question_paper->fill($Data)->save();
            
            $this->image_upload($request,$slug);
            session()->flash('success', "Question paper Are Added ");
            return back()->with('success','Question paper Are Added ');
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
        return view('admin.exam.question_paper_edit',['question'=>question_paper_model::where('id',$id)->first(),'manage_class'=>manage_class_model::all(),'manage_section'=> Manage_section_model::all(),'exam_lsit'=>exam_list_model::all(),'teacher_lsit'=>teacher_model::all(),"department"=>manage_department_model::all()]);
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

        $questions=new question_paper_model;
        
        $validation=Validator::make($request->all(),$questions->edit_validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else{
            $data=$request->all();
            

            $extension=$request->file('files')->getClientOriginalExtension();
           
            $data=array_set($data,'file_extension',$extension);
            question_paper_model::where('id',$id)->first()->fill($data)->save();
            
            
            if ($request->hasFile('files')) {
                
                File::delete("img/backend/question_paper/$request->file_title"."."."$request->file_extension");
              $this->image_upload($request,$request->file_title);
            }

             session()->flash('success', " questions updated successfully ");
            return back()->with('success','questions updated successfully ');
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
        $delete_value=question_paper_model::where('id',$id)->first();
        File::delete("img/backend/question_paper/$delete_value->title"."."."$delete_value->file_extension");
        question_paper_model::where('id',$id)->delete();

        session()->flash('success', " questions Delete successfully ");
        return back()->with('success','questions Delete successfully ');
    }
    public function image_upload(Request $request,$id)
    {
        $extension=$request->file('files')->getClientOriginalExtension();
        $file_path="img/backend/question_paper";
        $file_name=$id.'.'.$extension;
        $request->file('files')->move($file_path,$file_name);
    }

    public function download($file_name , $file_ext)
    {
        $pathToFile="img/backend/question_paper/$file_name".".".$file_ext;
        return response()->download($pathToFile);
    }
}
