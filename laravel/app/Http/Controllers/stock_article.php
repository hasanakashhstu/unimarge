<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\stock_article_model;
use App\templet_article_model;
use App\article_model;
use Session;
use Validator;
use Redirect;

class stock_article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.stock_article',['stock_article_info'=>stock_article_model::all(),'templet_article_info'=>templet_article_model::all()]);
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
        $stock_article_info=new stock_article_model;
         $validation=Validator::make($request->all(),$stock_article_info->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
           
                  
                
                  $stock_article_info->fill($request->all())->save();
                  $prev_data=article_model::all()->pluck('accession_code')->toArray();
                  for($i=0;$i<$request->quantity;$i++)
                  {
                    if(empty($prev_data))
                    {
                        $accession_code=1+$i;
                    }
                    else
                    {
                        $accession_code=end($prev_data)+1+$i;
                    }
                    $article_info=new article_model;
                    $article_data=$request->all();
                    $article_data=array_add($article_data,'accession_code',$accession_code);
                    $article_data=array_add($article_data,'stock_id',$request->stock_id);
                    $article_data=array_add($article_data,'available_status','Available');
                    $article_info->fill($article_data)->save();
                  }
                  //exit();
        }

         Session::flash('success'," $request->quantity $request->article_name Article Stock Succesfully");
        return back()->with('success'," $request->quantity  $request->article_name Article Stock Succesfully");
    }

    /**
     * Display the specified resource.a
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
         return view('admin.Libray.Edit.stock_article_edit',['stock_article_info'=>stock_article_model::where('stock_id',$id)->first(),'templet_article_info'=>templet_article_model::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       $stock_article_info=new stock_article_model;
         $stock_article_info::where('stock_id',$id)->first()->fill($request->all())->save();  
        Session::flash('success',"$request->article_name Article Stock Succesfully Updated");
        return back()->with('success',"$request->article_name Article Stock Succesfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         stock_article_model::where('stock_id',$id)->delete();
         article_model::where('stock_id',$id)->delete();
          Session::flash('success', "Delete Operation Succesfully Completed");
        return back()->with('success',"Delete Operation Succesfully Completed");
    }
}
