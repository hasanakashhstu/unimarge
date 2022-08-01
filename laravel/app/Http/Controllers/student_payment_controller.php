<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_component_model;
use App\students;
use App\payment_receipt_model;
use App\payment_receipt_child_model;
use App\subsidiary_cal;
use Session;
use Auth;
class student_payment_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $component=invoice_component_model::all();
        $payment_receipt=payment_receipt_model::join('students','students.roll','=','payment_receipt.student_roll')->get();
        return view('admin.Account.student_payment',['invoice_component'=>$component,'payment_receipt'=>$payment_receipt]);
    }


    public function student_data_for_invoice(Request $request)
    {
        return students::where('roll',$request->student_roll)->first();
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
        

        $payment_receipt=new payment_receipt_model;
        $payment_receipt->payment_receipt_id=time();
        $payment_receipt->receipt_date=$request->date;
        $payment_receipt->receipt_by=Auth::user()->name;
        $payment_receipt->receipt_amount=$request->total_amount;
        $payment_receipt->student_roll=$request->student_roll;
        $payment_receipt->class=$request->class;
        $payment_receipt->save();

        for($i=0;$i<count($request->component_id);$i++)
        {
            if($request->amount[$i]!=0)
            {
                $payment_receipt_child=new payment_receipt_child_model;
                $payment_receipt_child->payment_receipt_id=$payment_receipt->payment_receipt_id;
                 $payment_receipt_child->component_id=$request->component_id[$i];
                 $payment_receipt_child->amount=$request->amount[$i];
                 $payment_receipt_child->save();



                 $get_account_code=invoice_component_model::where('invoice_component_id',$request->component_id[$i])->first();

                $subsidiary_cal=new subsidiary_cal;
                $subsidiary_cal->dr_amount=$request->amount[$i];
                $subsidiary_cal->account_name=$get_account_code->asset_account;
                $subsidiary_cal->Party=$request->student_roll;
                $subsidiary_cal->party_type='Student';
                $subsidiary_cal->form_name='Student Payment';
                $subsidiary_cal->aganist_transcation=$payment_receipt->payment_receipt_id;
                $subsidiary_cal->save();





        

            }
        }

     Session::flash('success'," $request->student_roll  Payment Created  Succesfully");
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
        $invoice_component=invoice_component_model::all();
        $payment_receipt=payment_receipt_model::where('payment_receipt_id',$id)->first();
       return view('admin.Account.money_receipt',['invoice_component'=>$invoice_component,'payment_receipt'=>$payment_receipt]);
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
        payment_receipt_model::where('payment_receipt_id',$id)->delete();
        payment_receipt_child_model::where('payment_receipt_id',$id)->delete();
        Session::flash('success',"Data Deleted  Succesfully");
        return back();
    }
}
