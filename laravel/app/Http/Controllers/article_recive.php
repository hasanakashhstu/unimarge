<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article_issue_model;
use App\article_model;
use App\article_recive_model;
use Session;
use Validator;
use Redirect;


class article_recive extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.article_recive',['article_recive_info_teacher'=>article_recive_model::where('type','Teacher')->get(),'article_recive_info_student'=>article_recive_model::where('type','Student')->get()]);
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

        $article_id=$request->article_id;
        $article_receive_info=new article_recive_model;
        if($request->type=="Student")
        {
            $validation=Validator::make($request->all(),$article_receive_info->student_roles_rule());
        }
        else
        {
            $validation=Validator::make($request->all(),$article_receive_info->teacher_roles_rule());
        }
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else{


                if($request->type=="Student")
                {
                    $article_rec_data=[
                        'article_recive_id'=>time(),
                        'article_id'=>$article_id,
                        'article_name'=>$request->article_name,
                        'member_roll'=>$request->member_roll,
                        'member_name'=>$request->member_name,
                        'issue_date'=>$request->issue_date,
                        'return_date'=>$request->return_date,
                        'e_mail'=>$request->e_mail,
                        'phone'=>$request->phone ? $request->phone : '',
                        'total_day'=>$request->total_day,
                        'type'=>$request->type,

                    ];
                }
                else
                {

                    $article_rec_data=[
                        'article_recive_id'=>time(),
                        'article_id'=>$article_id,
                        'article_name'=>$request->article_name,
                        'teacher_id'=>$request->teacher_id,
                        'teacher_name'=>$request->teacher_name,
                        'teacher_email'=>$request->teacher_email,
                        'issue_date'=>$request->issue_date,
                        'return_date'=>$request->return_date,
                        'teacher_phone'=>$request->teacher_phone ? $request->teacher_phone : '',
                        'total_day'=>$request->total_day,
                        'type'=>$request->type,

                    ];

                }

                $article_receive_info->insert($article_rec_data);

            article_issue_model::where('article_id',$article_id)->update(['status'=>'Recived']);
            article_model::where('accession_code',$article_id)->update(['available_status'=>'Available']);
             session()->flash('success', "$request->article_name Article Successfully Recived");
            return back()->with('success',"$request->article_name Article Successfully Recived");
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
        return view('admin.Libray.Edit.article_recive_edit',['article_recive_info'=>article_recive_model::where('article_recive_id',$id)->first()]);
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
         $data=article_recive_model::where('article_recive_id',$id)->first();
         $receive_data=[
                'issue_date'=>$request->issue_date,
                'return_date'=>$request->return_date,
                'status'=>$request->status,
                'total_day'=>$request->total_day,
        ];
        $data->update($receive_data);
        Session::flash('success',"$request->article_name Article Information Are Successfully Updated");
        return back()->with('success',"$request->article_name Article Information Are Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        article_recive_model::where('article_recive_id',$id)->delete();
        session()->flash('success', "Delete Operation Successfully Completed");
       return back()->with('success',"Delete Operation Successfully Completed");
    }
}
