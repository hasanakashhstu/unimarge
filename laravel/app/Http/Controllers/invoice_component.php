<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_component_model;

use Validator;
use Redirect;
use Session;
use App\chart_of_accounts_model;
class invoice_component extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $income_account=chart_of_accounts_model::where('parent_account','Income')->get();
         $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
         return view('admin.Account.invoice_component',["invoice_component_data"=>invoice_component_model::get(),'income_account'=>$income_account,'asset_account'=>$asset_account]);
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
       $invoice_data=new invoice_component_model;
       if($invoice_data->where('component_name',$request->component_name)->first())
        {
            Session::flash('Error','This Component Already In Here');
            return back()->withInput();
        }
        else
        {
            $validation=Validator::make($request->all(),$invoice_data->validation_rule());
            if($validation->fails())
            {
                return back()->withInput()->withErrors($validation);
            }
            else
            {
                      $data=$request->all();
                      $data=array_add($data,'invoice_component_id',time());
                      $invoice_data->fill($data)->save();


            }
            Session::flash('success',"$request->component_name Name Add In Component List");
            return Redirect::back();
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
        $income_account=chart_of_accounts_model::where('parent_account','Income')->get();
         $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
       return view('admin.Account.Edit.invoice_component_edit',['invoice_data'=>invoice_component_model::where('invoice_component_id',$id)->first(),'income_account'=>$income_account,'asset_account'=>$asset_account]);
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
       invoice_component_model::where('invoice_component_id',$id)->first()->fill($request->all())->save();
        Session::flash('success','Updated');
        return back()->with('success','Update Operation Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       invoice_component_model::where('invoice_component_id',$id)->delete();
       Session::flash('success','Deleted');
       return back()->with('success','Delete Operation Successfully Completed');
    }
}
