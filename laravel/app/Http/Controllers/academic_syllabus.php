<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\academic_syllebus_model;
use Auth;
use App\manage_class_model;
use App\ov_setup_model;
use session;
use Validator;
use File;
use Redirect;
class academic_syllabus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:ACADEMIC_SYLLABUS'); 
     }
    public function index()
    {
       $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.class.academic_syllabus',['academic_syllabus'=>academic_syllebus_model::all(),'manage_class'=>manage_class_model::all(),'medium'=>$medium]);
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
    
    public function store(Request $request)
    {
        $question_paper=new academic_syllebus_model;
        $check_question_paper=$question_paper->where('class_name',$request->class_name)->where('subject',$request->subject)->first();

        //File move Start
        if($check_question_paper)
        {
            session()->flash('Error', "This  Class ( $request->class_name ) & Suject Information ( $request->subject ) Information ALready Here Only Update Possible");
            return back()->withInput();
        }
        else
        {
            extract($request->all());

            $validation=Validator::make($request->all(),$question_paper->validation());
            if($validation->fails())
            {
                return back()->withInput()->withErrors($validation);
            }
            else
            {
                $question_paper->fill($request->all())->save();
                $this->image_upload($request,$request->class_name."_".$request->subject);
                session()->flash('success', "New Syllabus $request->title Information  Are  Successfully Added ");
                return Redirect::back();
            }
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
        $medium=ov_setup_model::where('type','Medium')->get();
        return view("admin.class.Edit.academic_syllabus_edit",['academic_syllabus_data'=>academic_syllebus_model::where('id',$id)->first(),'class_data'=>manage_class_model::all(),'medium'=>$medium]);
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
        $questions=new academic_syllebus_model;


        $validation=Validator::make($request->all(),$questions->validation());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else{

            $data=$request->all();
            academic_syllebus_model::where('id',$id)->first()->fill($data)->save();
            if($request->files)
            {
                $this->image_upload($request,$request->class_name."_".$request->subject);
            }
            session()->flash('success', "Syllabus $request->title Information  Are  Successfully Updated  ");
            return back()->with('success',"Syllabus $request->title Information  Are  Successfully Updated ");
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

        if(File::exists("img/backend/academic_syllabus/$id.pdf")) {
            File::delete("img/backend/academic_syllabus/$id.pdf");

        }
        academic_syllebus_model::where('id',$id)->delete();
    }
    public function image_upload(Request $request,$id)
    {
        $file_path="img/backend/academic_syllabus";
        $file_name=$id.'.pdf';
        $request->file('files')->move($file_path,$file_name);

        session()->flash('success', "Delete Operation Successfully Completed");
        return back()->with('success',"Delete Operation Successfully Completed");

    }

    public function download($file_name)
    {
        $pathToFile="img/backend/question_paper/$file_name".".".$file_ext;
        return response()->download($pathToFile);
    }



}
