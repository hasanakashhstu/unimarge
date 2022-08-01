<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use File;
use Crypt;
use Validator;
use App\salary_slip_model;
use App\salary_slips_EarningComponent;
use App\salary_slips_DeducationComponent;
use App\teacher_model;
use App\chart_of_accounts_model;
use App\salary_component_model;
use App\salary_structure_deduction_component_model;
use App\salary_structure_earning_component_model;
use App\salary_structure_model;
use App\salary_structure_teacher_staff_details_model;
use Redirect;
use App\subsidiary_cal;
use App\ov_setup_model;

class salary_slip extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
     {
       $this->middleware('permission:SALARY_SLIP'); 
     }
    public function index()
    {   
        $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.payroll.slary_slip',['medium'=>$medium]);
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
        //print_r($request->all());

        $salary_slip=salary_slip_model::where('person_id',$request->person_id)->where('month',$request->month)->where('posting_date',$request->posting_date)->first();

        if($salary_slip)
        {
            echo "This Person Already Created Salary Slip On This Month";
        }
        else
        {
            $salary_slip_model=new salary_slip_model;
            $salary_slip_model->fill($request->all())->save();
             
            $get_dr_account_code=chart_of_accounts_model::where('account_name',$request->expense_account)->first();
            $subsidiary_cal_dr=new subsidiary_cal;
            $subsidiary_cal_dr->dr_amount=$request->gross_salary;
            $subsidiary_cal_dr->account_name=$get_dr_account_code->account_code;
            $subsidiary_cal_dr->Party=$request->person_id;
            $subsidiary_cal_dr->party_type=$request->type;
            $subsidiary_cal_dr->form_name="Salary Slip";   
            $subsidiary_cal_dr->aganist_transcation=$salary_slip_model->slip_id;
            $subsidiary_cal_dr->save();   
           
            $get_cr_account_code=chart_of_accounts_model::where('account_name',$request->payment_account)->first();
            $subsidiary_cal_cr=new subsidiary_cal;
            $subsidiary_cal_cr->cr_amount=$request->gross_salary;
            $subsidiary_cal_cr->account_name=$get_cr_account_code->account_code;
            $subsidiary_cal_cr->Party=$request->person_id;
            $subsidiary_cal_cr->party_type=$request->type;
            $subsidiary_cal_cr->form_name="Salary Slip";   
            $subsidiary_cal_cr->aganist_transcation=$salary_slip_model->slip_id; 
            $subsidiary_cal_cr->save();  
              
           


            echo "Salary Slip Create Succesfully On This Month";
            
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
        salary_slip_model::where('slip_id',$id)->delete();
        session::flash('success',"Delete Operation Succesfully Completed");
         return Redirect::back();
    }

    public function teacher_name_get(Request $request)
    {
        $Data=teacher_model::where('status',$request->teacher_or_staff)->get();
        echo "<option></option>";
        foreach($Data as $Data_found)
        {
            echo "<option value=\"$Data_found->teacher_id\">$Data_found->teacher_name</option>";
        }
        
    }

    public function salary_slip_details(Request $request)
    {
        
        $employee_find=salary_structure_teacher_staff_details_model::where('teacher_or_staff_name',$request->teacher_or_staff_name)->first();

      
        
        if($employee_find){
            $Active_chek=salary_structure_model::where('frequency',$request->payroll_frequecy)->where('payroll_structure_id',$employee_find->parent)
            ->where('status','Yes')
            ->first();
            if($Active_chek==false)
            {
                return "This Empoyee Are Not Found In Active Salary Structure";
            }
            else
            {
                $all_details=salary_structure_teacher_staff_details_model::where('teacher_or_staff_name',$request->teacher_or_staff_name)->first();


                $teacher_salary_details=salary_structure_teacher_staff_details_model::where('teacher_or_staff_name',$request->teacher_or_staff_name)->get()->toArray();
                $teacher_name=teacher_model::select('teacher_name')->where('teacher_id',$request->teacher_or_staff_name)->get()->toArray();
                
                $slary_structure=salary_structure_model::where('payroll_structure_id',$all_details->parent)->get()->toArray();
                
                // Earn Component Add
                $earn=salary_structure_earning_component_model::where('parent',$all_details->parent)->get()->toArray();
                
                $earn_component['earn_component']=$earn;
                $object=array_merge($teacher_salary_details[0],$teacher_name[0],$slary_structure[0]);
                array_push($object,$earn_component);


                // Deduction Component Add
                $deduction=salary_structure_deduction_component_model::where('parent',$all_details->parent)->get()->toArray();
                $deduction_component['deduction']=$deduction;
                array_push($object,$deduction_component);

                
                
                return $object;
            }
       
        }else
        {
            return "This Empoyee  Are Not Found In any Salary Structure";
        }

            
    }


    public function salary_structure_report()
    {
        $salary_structure_details=salary_structure_model::all();
        return view('admin.payroll.salary_structure_report',['salary_structure_details'=>$salary_structure_details]);
    }

    public function salary_structure_edit($id)
    {

        $earning_component=salary_component_model::where('type','Earning')->get();
        $deducation_component=salary_component_model::where('type','Deduction')->get();
        $teacer_name=teacher_model::all();
        $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $expense_account=chart_of_accounts_model::where('parent_account','Expense')->get();

        $salary_structure_details=salary_structure_model::where('payroll_structure_id',$id)->first();
        $teacher_staff=salary_structure_teacher_staff_details_model::where('parent',$id)->get();
        $earn=salary_structure_earning_component_model::where('parent',$id)->get();
        $deduction=salary_structure_deduction_component_model::where('parent',$id)->get();

        return view('admin.payroll.Edit.salary_structure_edit',['asset_account'=>$asset_account,'expense_account'=>$expense_account,'earning_component_data'=>$earning_component,'deducation_component'=>$deducation_component,'teacer_name'=>$teacer_name,'salary_structure_details'=>$salary_structure_details,'teacher_staff'=>$teacher_staff,'earn'=>$earn,'deduction'=>$deduction]);


        
    }

    public function salary_structure_update($id,Request $request)
    {
        
       

        salary_structure_model::where('payroll_structure_id',$id)->update([
            'title'=>$request->title,
            'status'=>$request->status,
            'frequency'=>$request->frequency,
            'payment_acount'=>$request->payment_acount,
            'expense_acount'=>$request->expense_acount
            ]);

         
         for($i=0;$i<count($request->teacher_or_staff_name);$i++)
         {
            salary_structure_teacher_staff_details_model::where('parent',$id)->where('id',$request->id[$i])->update([
                'teacher_or_staff_name'=>$request->teacher_or_staff_name[$i],
                'from_date'=>$request->from_date[$i],
                'base'=>$request->base[$i],
                'variable'=>$request->variable[$i]

                ]);
         }


         for($i=0;$i<count($request->earn_component_name);$i++)
         {
            salary_structure_earning_component_model::where('parent',$id)->where('earn_component_name',$request->earn_component_name[$i])->update([
                'earn_formula'=>$request->earn_formula[$i],
                'earn_amount'=>$request->earn_amount[$i]
                ]);
         }

        for($i=0;$i<count($request->deduction_component_name);$i++)
         {
            salary_structure_deduction_component_model::where('parent',$id)->where('deduction_component_name',$request->deduction_component_name[$i])->update([
                'deduction_formula'=>$request->deduction_formula[$i],
                'deduction_amount'=>$request->deduction_amount[$i]
                ]);
         }
         Session::flash('success',"$request->title Salary Structure Updated Succesfully");
         return Redirect::back();
    }


    public function salary_structure_delete($id)
    {
        salary_structure_model::where('payroll_structure_id',$id)->delete();
        salary_structure_teacher_staff_details_model::where('parent',$id)->delete();
        salary_structure_earning_component_model::where('parent',$id)->delete();
        salary_structure_deduction_component_model::where('parent',$id)->delete();

        Session::flash('success',"Delete Operation Excute Succesfully");
        return Redirect::back();

    }
    public function print_salary_slip()
    {
         $a=salary_slip_model::max('slip_id');  
         $slip_data=salary_slip_model::where('slip_id',$a)->first();
         return view('admin.payroll.salary_slip_print',['slip_data'=>$slip_data]);
    }

    public function salary_slip_print($id)
    {
        
         $slip_data=salary_slip_model::where('slip_id',$id)->first();
         return view('admin.payroll.salary_slip_print',['slip_data'=>$slip_data]);
       
    }
}
