<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\route_model;


class route extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:ROUTE'); 
     }
    public function index()

    {


       return view('admin.Transport.route',['route_info'=>route_model::all()]);


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
        $route=new route_model;
         $validation=Validator::make($request->all(),$route->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            if(!empty($request->name) and !empty($request->fare) and !empty($request->distance) and !empty($request->hour) and !empty($request->from) and !empty($request->to))
            {
         $data=$request->all();
        $data=array_add($data,'route_id',time());
         $route->fill($data)->save();
            }
        
     }

         Session::flash('success',"$request->name Information Are Inserted Successfully ");
        return back()->with('success',"$request->name Information Are Inserted Successfully ");
      

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
         return view('admin.Transport.Edit.route_edit',['route_data'=>route_model::where('route_id',$id)->first()]);
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
          route_model::where('route_id',$id)->first()->fill($request->all())->save();  
        Session::flash('success',"$request->name Information Are Updated Successfully ");
        return back()->with('success',"$request->name Information Are Updated Successfully ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         route_model::where('route_id',$id)->delete();
     Session::flash('success','Delete Operation Successfully Completed');
     return back()->with('success','Delete Operation Successfully Completed');
    }
}
