<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article_model;
use App\article_issue_model;
use App\membership_model;
use Session;
use Validator;
use Redirect;


class article_issue extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.article_issue',['article_issue_info_teacher'=>article_issue_model::where('status','Issue')->where('type','Teacher')->get(),'article_issue_info_student'=>article_issue_model::where('status','Issue')->where('type','Student')->get(),'article_info'=>article_model::all()]);
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
        // article_model::group_by('article_name')->get();
        $article_issue_info=new article_issue_model;
        $article_id=$request->article_id;
        if($request->type=="Student")
        {
            $validation=Validator::make($request->all(),$article_issue_info->student_roles_rule());
        }
        else
        {
            $validation=Validator::make($request->all(),$article_issue_info->teacher_roles_rule());
        }
        
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
           

                    $article_issue_data=$request->all();
                    $article_issue_data=array_add( $article_issue_data,'article_issue_id',time());
                    if($request->type=="Student")
                    {
                        $article_issue_data=[
                            'article_issue_id'=>time(),
                            'article_id'=>$article_id,
                            'article_name'=>$request->article_name,
                            'member_roll'=>$request->member_roll,
                            'member_reg'=>$request->member_reg,
                            'member_name'=>$request->member_name,
                            'issue_date'=>$request->issue_date,
                            'return_date'=>$request->return_date,
                            'e_mail'=>$request->e_mail,
                            'phone'=>$request->phone ? $request->phone : '',
                            'status'=>$request->status,
                            'total_day'=>$request->total_day,
                            'type'=>$request->type,

                        ];
                    }
                    else
                    {

                        $article_issue_data=[
                            'article_issue_id'=>time(),
                            'article_id'=>$article_id,
                            'article_name'=>$request->article_name,
                            'teacher_id'=>$request->teacher_id,
                            'teacher_name'=>$request->teacher_name,
                            'teacher_email'=>$request->teacher_email,
                            'issue_date'=>$request->issue_date,
                            'return_date'=>$request->return_date,
                            'teacher_phone'=>$request->teacher_phone ? $request->teacher_phone:'',
                            'status'=>$request->status,
                            'total_day'=>$request->total_day,
                            'type'=>$request->type,

                        ];

                    }

                    $article_issue_info->insert($article_issue_data);
                   
                    article_model::where('accession_code',$article_id)->update(['available_status'=>'Not Available']);
                    session()->flash('success',"$request->article_name Information Are Successfully Issued");
                    return back()->with('success',"$request->article_name Information Are Successfully Issued");



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
        return view('admin.Libray.Edit.article_issue_edit',['article_issue_info'=>article_issue_model::where('article_issue_id',$id)->first(),'article_info'=>article_model::all()]);
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
        $issue_data=article_issue_model::where('article_issue_id',$id)->first();
        $member_data=[
                'issue_date'=>$request->issue_date,
                'return_date'=>$request->return_date,
                'status'=>$request->status,
                'total_day'=>$request->total_day,
            ];
        $issue_data->update($member_data);
        Session::flash('success',"$request->article_name Information Are Successfully Updated");
        return back()->with('success',"$request->article_name Information Are Successfully Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=article_issue_model::where('article_issue_id',$id)->first();
        article_model::where('accession_code',$data->article_id)->update(['available_status'=>'Available']);
        $data->delete();
        session()->flash('success', "Delete Operation Successfully Completed");
        return back()->with('success',"Delete Operation Successfully Completed");
    }
}


      

            