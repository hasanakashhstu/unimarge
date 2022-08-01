<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\general_settings_model;
use Session;
use Validator;
use Redirect;
use App\ov_setup_model;
class general_settings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session=ov_setup_model::where('type','Session')->get();
        $batch=ov_setup_model::where('type','Batch')->get();
        return view('admin.Settings.general_settings',['general_settings_data'=>general_settings_model::first(),'session'=>$session,'batch'=>$batch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $general_settings_data=new general_settings_model;

        $general_settings_data->where('general_settings_id',$request->general_settings_id)->first()->fill($request->all())->save();
       if($request->file('school_logo')):
            $filepath='img/';
            $filename="logo.png";
            $request->file('school_logo')->move($filepath,$filename);
        endif;
        
        Session::forget('school');
        Session::put('school', general_settings_model::first());
        Session::flash('success','Settings Updated');
        return back()->with('success','Settings Updated');


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

    }

    /**
     *Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
