<?php

namespace App\Http\Controllers;

use App\manage_subject_model;
use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use App\notice_board_model;
use App\stuent_notice_child_model;
use App\teacher_notice_child_model;
use App\class_notice_child_model;
use App\parent_notice_child_model;
use App\teacher_model;
use App\manage_class_model;
use App\parents_info_model;
use App\manage_department_model;
use App\students;
use SoapClient;
use Redirect;
use App\sms_value;
use App\former_head_model;
use App\message_settings_model;

class former_headController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:NOTICEBOARD');
    }
    public function index()
    {
//        dd("he");
        $data['student_advisor'] = former_head_model::join('manage_department','former_head.department_id','=','manage_department.id')->get();
        $data['department'] = manage_department_model::groupby('department_name')->get();
        return view('website.backend.former_head_add',$data);
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



        $model_obj=new former_head_model;
        $validation=Validator::make($request->all(),$model_obj->validation());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $Data=$request->all();
            $notice_board_model_obj=new former_head_model;

            $notice_board_model_obj->fill($Data)->save();




            Session::flash('success',"Successfully Added Data");
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
        if(file_exists("img/backend/noticeboard/$id.pdf"))
        {
            return response()->download("img/backend/noticeboard/$id.pdf");
        }
        else
        {
            Session::flash('Error','File Not Exist');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //return view('admin.notice_board.notice_board_edit',['teacher_data'=>teacher_model::all(),'class_data'=>manage_class_model::all(),'parents_data'=>parents_info_model::all(),'notice_data'=>notice_board_model::where('notice_id',$id)->first()]);//,['templet_article_data'=>templet_article_model::where('templet_id',$id)->first()]
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
        notice_board_model::where('notice_id',$id)->delete();
        parent_notice_child_model::where('notice_id',$id)->delete();
        stuent_notice_child_model::where('notice_id',$id)->delete();
        teacher_notice_child_model::where('notice_id',$id)->delete();
        class_notice_child_model::where('notice_id',$id)->delete();

        Session::flash('success','Notice Deleted Successfully');
        return Redirect::back();
    }
}
