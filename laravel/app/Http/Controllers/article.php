<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article_model;
use App\teacher_model;
use Session;
use Validator;
use Redirect;


class article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.article',['article_info'=>article_model::all(),"teaher_data"=>teacher_model::all()]);
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
         $article_info=new article_model;
         $validation=Validator::make($request->all(),$article_info->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
           
                 $article_data=$request->all();
                 $article_data=array_add($article_data,'article_id',time());
                  $article_data=array_add($article_data,'stock_id',time());
                 $article_info->fill($article_data)->save();
    
        }

         Session::flash('success',"$request->article_name Information Are Successfully Inserted");
        return back()->with('success',"$request->article_name Information Are Successfully Inserted");
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
        return view('admin.Libray.Edit.article_edit',['article_info'=>article_model::where('article_id',$id)->first(),"teaher_data"=>teacher_model::all()]);
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
         $article_model=new article_model;
         $article_model->where('article_id',$id)->first()->fill($request->all())->save();
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
          article_model::where('article_id',$id)->delete();
         
        Session::flash('success',' Delete Operation  Successfully Completed');
        return Redirect::back();
    }
}
