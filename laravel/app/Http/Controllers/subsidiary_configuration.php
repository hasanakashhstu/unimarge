<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subsidiary_configuration_model;
use Session;
class subsidiary_configuration extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conf_data=subsidiary_configuration_model::all();
        return view('admin.Account.subsidary_configuration',['conf_data'=>$conf_data]);
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
        for($i=0;$i<count($request->configuration_id);$i++)
        {
            echo $request->configuration_id[$i];
           $config=subsidiary_configuration_model::where('configuration_id',$request->configuration_id[$i])->first();
           $config->income  =$request->income_head[$i];
           $config->asset  =$request->asset_head[$i];
           $config->expense  =$request->expense_head[$i];
           $config->save();
        }

        Session::flash('success','Configuration Updated Successfully');
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
