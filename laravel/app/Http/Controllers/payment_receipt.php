<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment_receipt_model;
use Session;
use Auth;
use App\invoice_model;
use App\subsidiary_cal;
use App\chart_of_accounts_model;
use Validator;
class payment_receipt extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.Account.payment_receipt');
    }

    public function get_payment_receipt(Request $request)
    {
        $data=payment_receipt_model::where('invoice_id',$request->invoice_id)->get();

        $table="<table class=\"table address\" style='width:890px;'>";
        $table.="<thead>";
        $table.="<tr>";
            $table.="<th>Date</th>";
            $table.="<th>Receipt By</th>";
            $table.="<th>Payment</th>";
        $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
        $total=0;
        foreach ($data as  $value) {
            $table.="<tr>";
                $table.="<td style='text-align: center;'>$value->receipt_date</td>";
                $table.="<td style='text-align: center;'>$value->receipt_by</td>";
                $table.="<td style='text-align: center;'>$value->receipt_amount</td>";
            $table.="</tr>";
            $total+=$value->receipt_amount;
        }
        $table.="<tr>";
            $table.="<td></td>";
            $table.="<td style='text-align: center;'>Total</td>";
            $table.="<td style='text-align: center;' class='total'>$total</td>";
        $table.="</tr>";
   
        $table.="</tbody>";
        $table.="</table>";

        echo $table;
    }


    public function get_payment_receipt_second(Request $request)
    {
           return invoice_model::where('invoice_id',$request->invoice_id)->first();
    }


    public function get_payment(Request $request)
    {
      
        $payment_receipt=new payment_receipt_model;
        $validation=Validator::make($request->all(),$payment_receipt->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $payment_receipt->invoice_id=$request->invoice_id;
            $payment_receipt->receipt_date=date('y-m-d');
            $payment_receipt->receipt_by=Auth::user()->email;
            $payment_receipt->receipt_amount=$request->current_amount;
            $payment_receipt->save();
            
            $account_name_get=invoice_model::where('invoice_id',$request->invoice_id)->first();
            $now_payment=$account_name_get->Payment+$request->current_amount;
            $account_name_get->update(['Payment'=>$now_payment]);
            if($account_name_get->on_net_total==$now_payment)
            {
                $account_name_get->update(['cash_status'=>'Paid']);
            }

            $get_dr_account_code=chart_of_accounts_model::where('account_name',$account_name_get->account_name)->first();
            $subsidiary_cal=new subsidiary_cal;
            $subsidiary_cal->dr_amount=$request->current_amount;
            $subsidiary_cal->account_name=$get_dr_account_code->account_code;
            $subsidiary_cal->Party=$account_name_get->student_roll;
            $subsidiary_cal->party_type='Student';
            $subsidiary_cal->form_name='Payment';
            $subsidiary_cal->aganist_transcation=$request->invoice_id;
            $subsidiary_cal->save();
        }
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
        //dd($request->all());
        
        $payment_receipt=new payment_receipt_model;
        $validation=Validator::make($request->all(),$payment_receipt->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $payment_receipt->invoice_id=$request->invoice_id;
            $payment_receipt->receipt_date=date('y-m-d');
            $payment_receipt->receipt_by=Auth::user()->email;
            $payment_receipt->receipt_amount=$request->current_amount;
            $payment_receipt->save();

            $due=$request->total+$request->current_amount;
            $invoice=invoice_model::where('invoice_id',$request->invoice_id)->first();
            $invoice->update(['Payment'=>$due]);
            if($due==$request->on_net_total)
            {
                $invoice->update(['cash_status'=>'Paid']);
            }
            
            $account_name_get=invoice_model::where('invoice_id',$request->invoice_id)->first();
            $get_dr_account_code=chart_of_accounts_model::where('account_name',$account_name_get->account_name)->first();
            $subsidiary_cal=new subsidiary_cal;
            $subsidiary_cal->dr_amount=$request->current_amount;
            $subsidiary_cal->account_name=$get_dr_account_code->account_code;
            $subsidiary_cal->Party=$request->student_roll;
            $subsidiary_cal->party_type='Student';
            $subsidiary_cal->form_name='Payment';
            $subsidiary_cal->aganist_transcation=$invoice->invoice_id;
            $subsidiary_cal->save();



             Session::flash('success','Payment Receipt Created Successfully');
             return back(); 
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
        //
    }
}
