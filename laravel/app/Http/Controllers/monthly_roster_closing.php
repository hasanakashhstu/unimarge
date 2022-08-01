<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\roster_model;
use App\assign_canteen_model;
use App\canteen_component_model;
use App\invoice_model;
use App\invoice_child_model;
use App\roster_configuration_model;
use App\invoice_component_model;
use App\subsidiary_cal;
use Auth;
use Session;
class monthly_roster_closing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
     {
       $this->middleware('permission:CANTEEN');
     }
    public function index()
    {
        return view('admin.Canteen.monthly_roster_closing');
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
    public function monthly_roster_closing_single_invoice(Request $request)
    {

        $number = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
        $from_date=$request->year.'-'.$request->month.'-'.'01';
        $to_date=$request->year.'-'.$request->month.'-'.$number;


          $invoice_data=invoice_model::where('student_roll',$request->student_roll)
                                                ->where('from_date',$from_date)
                                                ->where('to_date',$to_date)
                                                ->where('form_name','canteen')
                                                ->first();
                     if($invoice_data)
                     {
                       $data="Invoice Already Created";
                     }
                     else
                     {
                         //

                            $invoice=new invoice_model;
                            $invoice->class_name=$request->student_class;
                            $invoice->department=$request->department;
                            $invoice->student_roll=$request->student_roll;
                            $invoice->title=$request->student_name.'/'.$request->student_roll.$request->class."/Canteen Payment";
                            $invoice->waber=0;
                            $invoice->waber_purpose=0;
                            $invoice->from_date=$from_date;
                            $invoice->to_date=$to_date;
                            $invoice->invoice_creator=Auth::user()->name;
                            $invoice->on_net_total=$request->total;
                            $invoice->cash_status="";
                            $invoice->form_name="canteen";
                            $invoice->save();

                           



                            $component=roster_configuration_model::first();
                            $invoice_child=new invoice_child_model;
                            $invoice_child->invoice_id=$invoice->invoice_id;
                            $invoice_child->component_id=$component->default_component;
                            $invoice_child->amount=$request->total;
                            $invoice_child->save();


                             $get_account_code=invoice_component_model::where('invoice_component_id',$component->default_component)->first();

                                    $subsidiary_cal=new subsidiary_cal;
                                    $subsidiary_cal->cr_amount=$request->total;
                                    $subsidiary_cal->account_name=$get_account_code->income_account;
                                    $subsidiary_cal->Party=$request->student_roll;
                                    $subsidiary_cal->party_type='Student';
                                    $subsidiary_cal->form_name='Student Canteen Invoice';
                                    $subsidiary_cal->aganist_transcation=$invoice->invoice_id;
                                    $subsidiary_cal->save();

                            $data="Invoice Created Successfully";

                     }

                     echo $data;
    }



    public function store(Request $request)
    {
        $number = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
        $from_date=$request->year.'-'.$request->month.'-'.'01';
        $to_date=$request->year.'-'.$request->month.'-'.$number;

       for($i=0;$i<count($request->roll);$i++) {
        $invoice_data=invoice_model::where('student_roll',$request->roll[$i])
                                                ->where('from_date',$from_date)
                                                ->where('to_date',$to_date)
                                                ->where('form_name','canteen')
                                                ->first();
                     if(!$invoice_data)
                     {
                            $invoice=new invoice_model;
                            $invoice->class_name=$request->class[$i];
                            $invoice->department=$request->dep[$i];
                            $invoice->student_roll=$request->roll[$i];
                            $invoice->title=$request->name[$i].'/'.$request->roll[$i].$request->class[$i]."/Canteen Payment";
                            $invoice->waber=0;
                            $invoice->waber_purpose=0;
                            $invoice->from_date=$from_date;
                            $invoice->to_date=$to_date;
                            $invoice->invoice_creator=Auth::user()->name;
                            $invoice->on_net_total=$request->on_net_total[$i];
                            $invoice->cash_status="";
                            $invoice->form_name="canteen";
                            $invoice->save();

                            $component=roster_configuration_model::first();
                            $invoice_child=new invoice_child_model;
                            $invoice_child->invoice_id=$invoice->invoice_id;
                            $invoice_child->component_id=$component->default_component;
                            $invoice_child->amount=$request->on_net_total[$i];
                            $invoice_child->save();


                            $get_account_code=invoice_component_model::where('invoice_component_id',$component->default_component)->first();

                                    $subsidiary_cal=new subsidiary_cal;
                                    $subsidiary_cal->cr_amount=$request->total;
                                    $subsidiary_cal->account_name=$get_account_code->income_account;
                                    $subsidiary_cal->Party=$request->roll[$i];
                                    $subsidiary_cal->party_type='Student';
                                    $subsidiary_cal->form_name='Student Canteen Invoice';
                                    $subsidiary_cal->aganist_transcation=$invoice->invoice_id;
                                    $subsidiary_cal->save();

                                    
                     }
       }
        Session::flash('success',"Invoice Created Successfully");
        return back();
    }


    public function monthly_roster_closing_data_show(Request $request)
    {
          $component=canteen_component_model::all();
          $assign_stundent=assign_canteen_model::all();

        
          $table=" <div class=\"widget-content nopadding\">";
          $table.="<table border='1' style='width: 100%;'>";
          $table.="<thead>";
            $table.="<tr>";
                  $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Roll</th>";
                  $table.="<th style='height: 25px;background-color: #cecece;color:black;'>Student Name</th>";
                  $table.="<th style='height: 25px;background-color: #cecece;color:black;'>Class</th>";
                  $table.="<th style='height:25px;background-color: #cecece;color:black;'>Department</th>";
                  foreach ($component as $component_value) {
                      $table.="<th style='height: 25px;background-color: #cecece;color:black;'>$component_value->component_title</th>";
                  }
                  $table.="<th style='height: 25px;background-color: #cecece;color:black;'>Total</th>";
                  $table.="<th style='height: 25px;background-color: #cecece;color:black;'>Invoice</th>";
                  
            $table.="</tr>";
           $table.="</thead>";
            $table.="<tbody>";
            
            foreach ($assign_stundent as $assign_stundent_value) {
                $total=0;
                $table.="<tr>";
                $table.="<td style='height: 35px;text-align: center;'>
                <input class='student_roll' name='student_roll' type='hidden' value='$assign_stundent_value->student_roll'>

                <input class='student_roll' name='roll[]' type='hidden' value='$assign_stundent_value->student_roll'>

                $assign_stundent_value->student_roll

                </td>";

                $table.="<td style='height: 35px;text-align: center;'>
                <input class='student_name' name='student_name' type='hidden' value='$assign_stundent_value->student_name'>

                <input class='student_name' name='name[]' type='hidden' value='$assign_stundent_value->student_name'>

                $assign_stundent_value->student_name

                </td>";
                $table.="<td style='height: 35px;text-align: center;'>
                 <input class='student_class' name='student_class' type='hidden' value='$assign_stundent_value->class'>

                  <input class='student_class' name='class[]' type='hidden' value='$assign_stundent_value->class'>

                 $assign_stundent_value->class

                </td>";
                $table.="<td style='height: 35px;text-align: center;'>

                 <input class='department' name='department' type='hidden' value='$assign_stundent_value->department'>

                      <input class='department' name='dep[]' type='hidden' value='$assign_stundent_value->department'>

                $assign_stundent_value->department</td>";
                 foreach ($component as $component_value) {

                      $roster_model=roster_model::whereMonth('date','=',$request->month)
                                   ->whereYear('date','=',$request->year)
                                   ->where('student_roll',$assign_stundent_value->student_roll)
                                   ->where('component_id',$component_value->canteen_component_id)
                                   ->get();
                        $component_total=0;
                        foreach ($roster_model as $roster_value) {
                            $component_total=$component_total+$roster_value->amount;
                        }
                   
                      $table.="<td style='height: 35px;text-align: center;'>$component_total</td>";
                    $total=$total+$component_total;
                  }
                
                $table.="<td style='height: 35px;text-align: center;'>
                     <input class='total' name='total' type='hidden' value='$total'>

                      <input class='total' name='on_net_total[]' type='hidden' value='$total'>
                      <input class='total' name='month' type='hidden' value='$request->month'>
                      <input class='total' name='year' type='hidden' value='$request->year'>
                $total

                </td>"; 

         $number = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
        $from_date=$request->year.'-'.$request->month.'-'.'01';
        $to_date=$request->year.'-'.$request->month.'-'.$number;


        $invoice_data=invoice_model::where('student_roll',$assign_stundent_value->student_roll)
                                                ->where('from_date',$from_date)
                                                ->where('to_date',$to_date)
                                                ->where('form_name','canteen')
                                                ->first();
              if($invoice_data)
              {
                 $table.="<td style='height: 35px;width: 20px;'>
                   <input type='button' class='btn btn-info' disabled='disabled' value='Invoice Already Created'>
                 </td>";  
              }
              else
              {
                $table.="<td style='height: 35px;width: 20px;'>
                   <input type='button' id='create_invoice' class='create_invoice btn btn-success' style='width: 176px;' value='Invoice'>
                </td>";  
              }

            
                $table.="</tr>";
            }
            


            $table.="<tr>";
            $table.="<td colspan='15' style='text-align: center;'>
                <input type='submit' id='create_all_invoice' class='create_all_invoice btn btn-success' value='Create Invoice For All'> 
            </td>";
            $table.="</tr>";
            $table.="</tbody>";
            $table.="</table>";
            $table.="</div>";
            echo $table;
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
