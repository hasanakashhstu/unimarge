<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report_settings_model;
use Session;
use Validator;
class report_settings_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('admin.Settings.report_settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $report_settings=report_settings_model::all();
       return view('admin.Settings.report_settings_view',['report_settings'=>$report_settings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        for ($i=0; $i <count($request->name); $i++) { 
            if($request->name[$i]!='')
            {
               $report_settings=new report_settings_model;
               $report_settings->name=$request->name[$i]; 
               $report_settings->designation=$request->designation[$i]; 
               $report_settings->save(); 
            }
        }

        Session::flash('success','Report Settings Added Successfully');
        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       report_settings_model::find($id)->delete();
       Session::flash('success','Data Deleted Successfully');
       return back();
    }
}
