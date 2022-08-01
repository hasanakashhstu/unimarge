<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\assign_transport_model;
use  App\manage_transport_model ;
use  App\route_model;

class assign_transport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:ASSIGN_TRANSPORT'); 
     }
    public function index()
    {
        return view('admin.Transport.assign_transport',['assign_transport'=>assign_transport_model::all(),'route_info'=>route_model::all(),'manage_transport_info'=>manage_transport_model::all()]);
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
         $assign_transport=new assign_transport_model;
         $validation=Validator::make($request->all(),$assign_transport->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            if(!empty($request->route_name) and !empty($request->name_transport) and !empty($request->transport_color) and !empty($request->number_of_transport) and !empty($request->student_roll) and !empty($request->route_fare))
            {
         $data=$request->all();
        $data=array_add($data,'transport_id',time());
         $assign_transport->fill($data)->save();
            }
        
     }

         Session::flash('success',"$request->name_transport Information Are Succesfully Inserted");
        return back()->with('success',"$request->name_transport Information Are Succesfully Inserted");
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
     
      return view('admin.Transport.Edit.assign_transport_edit',['assign_transport_data'=>assign_transport_model::where('transport_id',$id)->first(),'route_info'=>route_model::all(),'manage_transport_info'=>manage_transport_model::all()]);

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
          assign_transport_model::where('transport_id',$id)->first()->fill($request->all())->save();  
        Session::flash('success',"$request->name_transport Information Are Succesfully Updated");
        return back()->with('success',"$request->name_transport Information Are Succesfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        assign_transport_model::where('transport_id',$id)->delete();
         Session::flash('success', "Delete Operation Succesfully Complete");
         return back()->with('success',"Delete Operation Succesfully Complete");
    }
}
