<?php

namespace App\Http\Controllers;

use App\manage_department_model;
use Illuminate\Http\Request;
use App\manage_class_model;
use Session;
use Validator;
use App\teacher_model;
use App\program_type_model;
use Redirect;
class Manage_class extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.class.manage_class',['class_list'=>manage_class_model::orderBy('numeric_name', 'asc')->get(),'teacher_data'=>teacher_model::where('status','Teacher')->get(),'department_data'=>manage_department_model::get(),'program_type_data'=>program_type_model::get()]);
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

        $manage_class_model=new manage_class_model();
        $validation=Validator::make($request->all(),$manage_class_model->validation_rule());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $numeric_check=manage_class_model::where('numeric_name',$request->numeric_name)->first();
            if($numeric_check)
            {
                Session::flash('error',"This Numeric Name ($request->numeric_name ) Are Already Exsits");
                return back()->withInput();
            }
            else
            {

                $manage_class_model->fill($request->all())->save();
    Session::flash('success',"A new class named '$request->class_name' ($request->numeric_name) Is added");
                return Redirect::back();
            }

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
    return view('admin.class.Edit.manage_class_edit',['manage_class_list'=>manage_class_model::where('id',$id)->first(),'teacher_data'=>teacher_model::all()]);
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
        $manage_class_model=new manage_class_model();
        $validation=Validator::make($request->all(),$manage_class_model->validation_rule());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $numeric_check=manage_class_model::where('numeric_name',$request->numeric_name)->first();
            if($numeric_check)
            {
                Session::flash('error',"This Numeric Name ($request->numeric_name ) Are Already Exsits");
                return back()->withInput();
            }
            else
            {

                manage_class_model::where('id',$id)->first()->fill($request->all())->save();
                Session::flash('success',"Class $request->class_name  Informtion are successfully Update");
                return Redirect::back();
            }
        }    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       manage_class_model::where('id',$id)->delete();
        session()->flash('success', "Delete Operation Successfully Completed");
        return back()->with('success',"Delete Operation Successfully Completed");
       
    }
}
