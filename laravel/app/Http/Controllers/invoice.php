<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_model;
use App\invoice_child_model;
use App\invoice_component_model;
use Session;

class invoice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:INVOICE'); 
     }
     
    public function index()
    {
        
        return view('admin.Account.invoice',['invoice_data'=>invoice_model::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_data=invoice_model::select('cash_status','on_net_total')->where('invoice_id',$id)->first();
        
        if($get_data->cash_status=="Paid")
        {
            invoice_model::where('invoice_id',$id)->update(['cash_status'=>'Unpaid']);
        }
        else
        {
            invoice_model::where('invoice_id',$id)->update(['cash_status'=>'Paid','Payment'=>$get_data->on_net_total]);  
        }
        
        return back()->withInput(); 
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
        invoice_model::where('invoice_id',$id)->delete();
        Session::flash('success','Delete Operation Sucessfully Excuted');
        return back()->withInput();
    }

    public function invoice_print($id)
    {
        $invoice_info=invoice_model::where('invoice_id',$id)->first();
        $component_data=invoice_component_model::leftJoin('invoice_child','invoice_child.component_id','=','invoice_component.invoice_component_id')
                        ->where('invoice_child.invoice_id',$id)
                        ->get();
        return view('admin.Account.invoice_print',['invoice_info'=>$invoice_info,'component_data'=>$component_data]);
        
    }
}
