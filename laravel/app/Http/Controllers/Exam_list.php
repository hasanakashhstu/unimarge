<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_list_model;
use App\teacher_model;
use Session;
use Validator;
class Exam_list extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:EXAM_LIST'); 
     }
    public function index()
    {

        return view('admin.exam.exam_list',['exam_list'=>exam_list_model::all(),'teacher_data'=>teacher_model::where('status','Teacher')->get()]);
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
    	$validate_rule_use=new exam_list_model;
    	$validator=validator::make($request->all(),$validate_rule_use->store_rules());
    	if($validator->fails())
    	{
    		return back()->withInput()->withErrors($validator);
    	}
    	else
    	{
    		$exam_list_model=new exam_list_model;
	        $exam_list_model->fill($request->all())->save();
	        Session::flash('success','New Admin Create');
	        return back()->with('success','New Admin Create');
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
        return view('admin.exam.exam_list_edit',['exam_list'=>exam_list_model::where('id',$id)->first(),'teacher_data'=>teacher_model::where('status','Teacher')->get()]);
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
        $exam_list_model=new exam_list_model;
        $exam_list_model->where('id',$id)->first()->fill($request->all())->save();

        Session::flash('success','New Admin Create');
        return back()->with('success','New Admin Create');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        exam_list_model::find($id)->delete();
        Session::flash('success','Exam Deleted Successfully');
        return back();
    }
}
