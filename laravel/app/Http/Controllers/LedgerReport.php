<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chart_of_accounts_model;
use App\subsidiary_cal;
use App\students;
use App\teacher_model;
use Illuminate\Support\Facades\Input;
class LedgerReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ledger_head=chart_of_accounts_model::all();

         return view('admin.Report.ledger_report',['ledger_head'=>$ledger_head,'data'=>'']);
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
        //$ledger_head=chart_of_accounts_model::all();
        
        
    }



    public function get_ledger_report(Request $request)
    {
        $all_transcation_found=subsidiary_cal::all()->toArray();
        $all_transcation_are_escping=array_column($all_transcation_found, 'account_name');
         $table="";
       try {
         $query=subsidiary_cal::where(function($query) use ($request) {
                    
                    if ($request->ledger_head != "all") {
                       $query->where('account_name',$request->ledger_head);
                    }

                    if(Input::get('party'))
                    {
                        $query->where('Party',Input::get('party'));
                    }
                
                     if(Input::get('type'))
                    {
                        $query->where('party_type',Input::get('type'));
                    }
                     if(Input::get('all'))
                    {
                        $query->where('account_name', 'LIKE', '%' . Input::get('all'). '%');
                        $query->orwhere('Party', 'LIKE', '%' . Input::get('all'). '%');
                        $query->orwhere('party_type', 'LIKE', '%' . Input::get('all'). '%');
                        $query->orwhere('account_name', 'LIKE', '%' . Input::get('all'). '%');
                    }

                    if($request->ledger_head == "all")
                    {
                        $query->where('account_name', '!=', 'Codebool');
                        
                    }

                    
         })->groupBy('account_name')->get();
       
         foreach ($query as $key => $value) {
            $balance=0;
             $account_name_get=chart_of_accounts_model::where('account_code',$value->account_name)->first();
                    
                    $table.="<span style='font-size: 18px;text-shadow: 0 0 black;'>Account Name : <span style='color: green;'>".$account_name_get->account_name."</span><span style='color:red;'> ->".$value->account_name."</span></span>";
                     $table.="<table border='1' style='width: 1113px;margin-top: 20px;    margin-bottom: 20px;'>";
                     $table.="<thead>";
                     $table.="<tr>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Date</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Invoice Id</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Account Head</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Narration</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Party Type</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Party</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Debit Amount</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Credit Amount</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Balance</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Dr/Cr</th>";
                    $table.="</tr>";
                    $table.="</thead>";

                    $transcation_key_found=array_keys($all_transcation_are_escping,$value->account_name);
                
                    $table.="<tbody>";

                                    foreach ($transcation_key_found as $transcation_key => $transcation_value) {
                                    
                                    
                                    
                                    $table.="<tr>";
                                        $table.="<td>".$all_transcation_found[$transcation_value]['created_at']."</td>";
                                        $table.="<td>".$all_transcation_found[$transcation_value]['aganist_transcation']."</td>";
                                        $account_code_get=chart_of_accounts_model::where('account_code',$all_transcation_found[$transcation_value]['account_name'])->first();
                                        $table.="<td>".$account_code_get->account_name."</td>";
                                        $table.="<td>".$all_transcation_found[$transcation_value]['form_name']."</td>";
                                        
                                        $table.="<td>".$all_transcation_found[$transcation_value]['party_type']."</td>";

                                        if($all_transcation_found[$transcation_value]['party_type']=='Student')
                                        {
                                           $student_name_get=students::where('roll',$all_transcation_found[$transcation_value]['Party'])->first();
                                           $table.="<td>".$all_transcation_found[$transcation_value]['Party'].'-'.$student_name_get->student_name."</td>";
                                        }
                                        else
                                        {
                                           $teacher_or_staff=teacher_model::where('teacher_id',$all_transcation_found[$transcation_value]['Party'])->first();
                                           $table.="<td>".$all_transcation_found[$transcation_value]['Party'].'-'.$teacher_or_staff->teacher_name."</td>";

                                        }


                                        
                                        $table.="<td>".$all_transcation_found[$transcation_value]['dr_amount']."</td>";
                                        $table.="<td>".$all_transcation_found[$transcation_value]['cr_amount']."</td>";
                                    

                                     if($balance == 0)
                                     {
                                        $balance=$all_transcation_found[$transcation_value]['dr_amount'];
                                     }
                                     elseif($all_transcation_found[$transcation_value]['dr_amount'] == 0)
                                     {
                                        $balance=$balance;
                                     }
                                     elseif($all_transcation_found[$transcation_value]['dr_amount'] != 0)
                                     {
                                        $balance=$balance+$all_transcation_found[$transcation_value]['dr_amount'];
                                     }


                                     $cr_amount=$all_transcation_found[$transcation_value]['cr_amount'];

                                     $balance=$balance-$cr_amount;
                                     
                                        $table.="<td>$balance</td>";
                                    
                                        
                                            if($all_transcation_found[$transcation_value]['cr_amount'] !=0)
                                            {
                                                $table.="<td>cr</td>";
                                            }
                                            else
                                            {
                                                $table.="<td>dr</td>";
                                            }
                                       
                                    $table.="</tr>";
                                    }
                               
                        
                    $table.="</tbody>";
                    $table.="</table>";
        }
    }
    catch (\Exception $e) {
        
        }

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
