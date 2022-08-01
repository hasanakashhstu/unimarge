<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\templet_article_model ;
use  App\teacher_model ;
use Redirect;
use App\article_model;
class templet_article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.templet_article',["templet_article_data"=>templet_article_model::all(),"teaher_data"=>teacher_model::all()]);
    }

    public function check_isbn_no(Request $request)
    {
        $tem_data=templet_article_model::where('isbn',$request->isbn_no)->first();
        $stock_data=article_model::where('isbn',$request->isbn_no)->get();
        if($tem_data || count($stock_data) > 1)
        {
            echo "Found";
        }
        else
        {
            echo "NotFound";
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
        $component_info=new templet_article_model ;
        $validation=Validator::make($request->all(),$component_info->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            $component_data=$request->all();
            $component_data=array_add($component_data,'templet_id',time());
            $component_info->fill($component_data)->save();
            
        }
        Session::flash('success'," $request->article_name Article Templete Successfully Created");
        return Redirect::back();
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
        return view('admin.Libray.Edit.templet_article_edit',['templet_article_data'=>templet_article_model::where('templet_id',$id)->first(),"teaher_data"=>teacher_model::all()]); 
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
    
       $templet_article_model=new templet_article_model;
        $templet_article_model->where('templet_id',$id)->first()->fill($request->all())->save();
         Session::flash('success'," '$request->article_name' Information Are Successfully Updated");
        return back()->with('success'," $request->article_name Information Are Successfully Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        templet_article_model::where('templet_id',$id)->delete();
         
        Session::flash('success','Delete Opertaion successfully Completed');
        return Redirect::back();
    }
}
