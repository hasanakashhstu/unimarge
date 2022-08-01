<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\assign_dormitory_model ;
use App\manage_department_model;
use App\dormitory_model;
use Redirect;

class assign_dormitory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:ASSIGN_DORMITORY'); 
     }
    public function index()
    {
        return view('admin.Dormitory.assign_dormitory',['assign_dormitory_data'=>assign_dormitory_model::all(),'department_info'=>manage_department_model::all(),'dormitory_info'=>dormitory_model::all()]);
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
        $assign_dormitory_data=new assign_dormitory_model ;
        $validation=Validator::make($request->all(),$assign_dormitory_data->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            $assign_dormitory_info=$request->all();
            $assign_dormitory_info=array_add($assign_dormitory_info,'assign_dormitory_id',time());
            $assign_dormitory_data->fill($assign_dormitory_info)->save();

        }
        Session::flash('success',"Succesfully Dormitory Assign to $request->student_name");
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
        return view('admin.Dormitory.Edit.assign_dormitory_edit',['assign_dormitory_data'=>assign_dormitory_model::where('assign_dormitory_id',$id)->first(),'dormitory_info'=>dormitory_model::all()]);
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
         $assign_dormitory_model=new assign_dormitory_model;
        $assign_dormitory_model->where('assign_dormitory_id',$id)->first()->fill($request->all())->save();
         Session::flash('success','Update Operation Successfully Comleted');
        return back()->with('success','Update Operation Successfully Comleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        assign_dormitory_model::where('assign_dormitory_id',$id)->delete();

        Session::flash('success','Successfully Deleted This Information');
        return Redirect::back();
    }
}
