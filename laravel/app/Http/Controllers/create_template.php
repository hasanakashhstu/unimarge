<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\chart_of_accounts_model;
use App\invoice_component_model;
use App\invoice_templete_model;
use Response;
use Redirect;
use Session;
use App\invoice_model;
use App\ov_setup_model;
class create_template extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $class_name=manage_class_model::all();
        $Account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $component=invoice_component_model::all();
        $invoice=invoice_templete_model::all();
        $medium=ov_setup_model::where('type','Medium')->get();

        return view('admin.Account.payment_templete',['Account'=>$Account,'class_name'=>$class_name,'component'=>$component,'invoice_data'=>$invoice,'medium'=>$medium]);
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
        
        
        $Data=$request->all();
        $a=array_combine($request->component_name,$request->component_value);
        $json_value=array_merge($Data,['all_value'=>$a]);
        $json_convert=json_encode($json_value);

        $invoice_templete=new invoice_templete_model;
        $invoice_templete->templete_json=$json_convert;
        $invoice_templete->class=$request->class_name;
        $invoice_templete->medium=$request->medium;
        $invoice_templete->from_date=$request->from_date;
        $invoice_templete->to_date=$request->to_date;
        $invoice_templete->total_month=$request->total_month;
        $invoice_templete->save();

        Session::flash('success','Successfully Add New Templete');
        return Redirect::back();
    }

    /**each
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $invoice=invoice_templete_model::where('id',$id)->first();
    
        if($invoice->default_status =="Not")
        {

            $get_information_for_id=$invoice->where('id',$id)->first();
            if(invoice_templete_model::where('class',$get_information_for_id->class)->where('default_status','Default')->first())
                {
                    Session::flash('Error','Already Assing This CLass Default Templete Please Remove This Status');
                    return Redirect::back();
                }
                else
                {
                    $invoice->where('id',$id)->update(['default_status' => 'Default']);
                    Session::flash('success',' Default  Status Updated');
                    return back()->with('success','Default  Status Updated');
                }
        }
        else
        {
            $invoice->where('id',$id)->update(['default_status' => 'Not']);
            Session::flash('success',' Not  Status Updated');
            return back()->with('success','Not  Status Updated');
        }
           
      
     
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class_name=manage_class_model::all();
        $Account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $component=invoice_component_model::all();
        $invoice=invoice_templete_model::where('id',$id)->first();
        $medium=ov_setup_model::where('type','Medium')->get();
        $templete_json_decode=json_decode($invoice->templete_json);
        

        return view('admin.Account.Edit.payment_template_edit',['Account'=>$Account,'class_name'=>$class_name,'component'=>$component,'invoice_data'=>$invoice,'templete_json'=>$templete_json_decode,'medium'=>$medium]);
       
    
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
       
        $Data=$request->all();
        $a=array_combine($request->component_name,$request->component_value);
        $json_value=array_merge($Data,['all_value'=>$a]);
        $json_convert=json_encode($json_value);
        
       


        $invoice_templete=new invoice_templete_model;
        $invoice_templete->where('id',$id)->update(['class'=>$request->class_name,'medium'=>$request->medium,'templete_json'=>$json_convert,'from_date'=>$request->from_date,'to_date'=>$request->to_date,'total_month'=>$request->total_month]);
        
        session()->flash('success', "Update Operation Successfully Completed Thank You !");
        return Redirect::back();

    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(invoice_model::where('templete_id',$id)->first())
        {   
            session()->flash('Error', "This Templete Is Already Get Transaction So This Templete Delete Are Not Possible");
            return Redirect::back();
        }
        else
        {
            

            invoice_templete_model::where('id',$id)->delete();
            session()->flash('success', "Delete Operation Successfully Completed");
            return Redirect::back();
        }
        
    }
}
