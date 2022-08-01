<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\invoice_component_model;
use App\chart_of_accounts_model;
use App\manage_class_model;
use App\students;
use App\invoice_templete_model;
use App\invoice_model;
use Auth;
use Session;
use Redirect;
use Validator;
use App\subsidiary_cal;
use App\subsidiary_configuration_model;
use App\ov_setup_model;
use App\manage_department_model;
use App\invoice_child_model;
use App\membership_model;
class transport_invoice_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $class_name=manage_class_model::all();
        $component=invoice_component_model::all();
        $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.Transport.transport_invoice',['class_name'=>$class_name,'invoice_component'=>$component,'medium'=>$medium]);
    }

     public function transport_payment_entry_for_student_data(Request $request)
    {
      return students::join('assign_transport','assign_transport.student_roll','=','students.roll')
                        ->where('students.department',$request->department)
                        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $invoice_data=invoice_model::where('form_name','transport')->get();
        return view('admin.Transport.transport_invoice_report',['invoice_data'=>$invoice_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $number = cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
        $from_date=$request->year.'-'.$request->month.'-'.'01';
        $to_date=$request->year.'-'.$request->month.'-'.$number;


         $invoice_role=new invoice_templete_model;
        $validation=Validator::make($request->all(),$invoice_role->roles_rule());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else
        {



               if($request->invoice_type=="Single Invoice"):
                    
                     $invoice_data=invoice_model::where('student_roll',$request->student_roll)
                                                ->where('from_date',$request->from_date)
                                                ->where('to_date',$request->to_date)
                                                ->where('class_name',$request->class_name)
                                                ->where('form_name','transport')
                                                ->first();
                     if($invoice_data)
                     {
                       Session::flash('error',"$request->student_name Already  Transport Invoice created");
                        return Redirect::back();
                     }
                     else
                     {
                      
                            // $templete_id=invoice_templete_model::where('class',$request->class_name)->where('default_status','Default')->first();


                            $invoice_creator=Auth::user()->name;
                            $request_value=$request->all();
                            $request_value=array_add($request_value,'invoice_creator',$invoice_creator);
                             $request_value=array_add($request_value,'from_date',$from_date);
                            $request_value=array_add($request_value,'to_date',$to_date);
                            
                            $invoice=new invoice_model;
                            $invoice->fill($request_value)->save();


                            
                            for ($i=0; $i <count($request->amount) ; $i++) {
                                if($request->amount[$i]!=0)
                                {

                                    $get_account_code=invoice_component_model::where('invoice_component_id',$request->component_id[$i])->first();

                                    $subsidiary_cal=new subsidiary_cal;
                                    $subsidiary_cal->cr_amount=$request->amount[$i];
                                    $subsidiary_cal->account_name=$get_account_code->income_account;
                                    $subsidiary_cal->Party=$request->student_roll;
                                    $subsidiary_cal->party_type='Student';
                                    $subsidiary_cal->form_name='Student Transport Invoice';
                                    $subsidiary_cal->aganist_transcation=$invoice->invoice_id;
                                    $subsidiary_cal->save();


                                    $invoice_child=new invoice_child_model;
                                    $invoice_child->invoice_id=$invoice->invoice_id;
                                    $invoice_child->component_id=$request->component_id[$i];
                                    $invoice_child->amount=$request->amount[$i];
                                    $invoice_child->save();
                                }
                            }
                        

                     } 

               else:
                       $all_student=students::join('assign_transport','assign_transport.student_roll','=','students.roll')
                           ->where('students.class',$request->class_name)
                           ->where('students.department',$request->department)
                           ->get();
                        // echo "<pre>";
                        // print_r($all_student);
                        // exit();
                   foreach ($all_student as $value) {

                    $invoice_data=invoice_model::where('student_roll',$value->roll)
                                                ->where('from_date',$request->from_date)
                                                ->where('to_date',$request->to_date)
                                                ->where('class_name',$request->class_name)
                                                ->where('form_name','transport')
                                                ->first();
                    
                     if(!$invoice_data)
                      {
                          $Name=students::select('student_name')->where('roll',$value->roll)->first();
                          // $templete_id=invoice_templete_model::where('class',$request->class_name)->where('default_status','Default')->first();
                          $invoice_creator=Auth::user()->name;

                          $request_value=$request->all();

                          $request_value=array_add($request_value,'invoice_creator',$invoice_creator);
                          $request_value=array_set($request_value,'student_roll',$value->roll);   
                          $request_value=array_set($request_value,'student_name',$value->student_name);   
                          $invoice=new invoice_model;
                          $invoice->fill($request_value)->save();

                          for ($i=0; $i <count($request->amount) ; $i++) {
                                if($request->amount[$i]!=0)
                                {
                                    $get_account_code=invoice_component_model::where('invoice_component_id',$request->component_id[$i])->first();

                                    $subsidiary_cal=new subsidiary_cal;
                                    $subsidiary_cal->cr_amount=$request->amount[$i];
                                    $subsidiary_cal->account_name=$get_account_code->income_account;
                                    $subsidiary_cal->Party=$value->roll;
                                    $subsidiary_cal->party_type='Student';
                                    $subsidiary_cal->form_name='Student Transport Invoice';
                                    $subsidiary_cal->aganist_transcation=$invoice->invoice_id;
                                    $subsidiary_cal->save();


                                    $invoice_child=new invoice_child_model;
                                    $invoice_child->invoice_id=$invoice->invoice_id;
                                    $invoice_child->component_id=$request->component_id[$i];
                                    $invoice_child->amount=$request->amount[$i];
                                    $invoice_child->save();
                                }
                            }

                       
                     }          

          
                       
                   }

                endif;

                Session::flash('success','Invoice Create Succesfully');
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
