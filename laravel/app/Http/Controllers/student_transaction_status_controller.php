<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_model;
use App\payment_receipt_model;
use App\payment_receipt_child_model;
use App\invoice_component_model;
class student_transaction_status_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_transaction=invoice_model::groupBy('student_roll')->selectRaw('*, sum(on_net_total) as total_amount')->get();
        return view('admin.Account.student_transaction_status',['student_transaction'=>$student_transaction]);
    }

    public function view_transaction(Request $request)
    {
            $data=payment_receipt_model::join('payment_receipt_child','payment_receipt_child.payment_receipt_id','=','payment_receipt.payment_receipt_id')
                ->where('payment_receipt.student_roll',$request->student_roll)
                ->get();
         $table="<table class='table table-bordered'>";
                $table.="<tr>";
                $table.="<th>Date</th>";
                $table.="<th>Component Name</th>";
                $table.="<th>Amount</th>";
                $table.="</tr>";
        foreach ($data as $key => $value) {
            $component=invoice_component_model::where('invoice_component_id',$value->component_id)->first();
                $table.="<tr>";
                    $table.="<td>$value->receipt_date</td>";
                    $table.="<td>$component->component_name</td>";
                    $table.="<td>$value->amount</td>";
                $table.="</tr>";
            }
            $table.="</table>";
            echo $table;   
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
