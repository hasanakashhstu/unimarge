<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\manage_transport_model ;
use  App\route_model;

use Redirect;

class manage_transport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */ 
     public function __construct()
     {
       $this->middleware('permission:MANAGE_TRANSPORT'); 
     }
    public function index()
    {
        return view('admin.Transport.manage_transport',['manage_transport_info'=>manage_transport_model::all(),'route_info'=>route_model::all()]);
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
        // echo "Its working";
        // exit();
         $manage_transport_data=new manage_transport_model;
         $validation=Validator::make($request->all(),$manage_transport_data->validation_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
           
                $manage_transport_info=$request->all();
                $manage_transport_info=array_add($manage_transport_info,'transport_id',time());
                 $manage_transport_data->fill($manage_transport_info)->save();
    
        }

         Session::flash('success',"$request->name_of_transport Information Are Succesfully Inserted");
        return back()->with('success',"$request->name_of_transport Information Are Succesfully Inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          return view('admin.Transport.Edit.manage_transport_edit',['route_info'=>route_model::all(),'manage_transport_info'=>manage_transport_model::where('transport_id',$id)->first()]);
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
           $manage_transport=new manage_transport_model;
    
            $manage_transport::where('transport_id',$id)->first()->fill($request->all())->save();
            Session::flash('success',"$request->name_of_transport Information Are Succesfully Upadated");
            return back()->with('success',"$request->name_of_transport Information Are Succesfully Upadated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        manage_transport_model::where('transport_id',$id)->delete();
          Session::flash('success', "Delete Operation Succesfully Completed");
        return back()->with('success',"Delete Operation Succesfully Completed");
    }
}