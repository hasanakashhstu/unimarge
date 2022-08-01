<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chart_of_accounts_model;

use App\salary_structure_earning_component_model;
use App\salary_structure_deduction_component_model;
use App\salary_structure_teacher_staff_details_model;
use App\salary_structure_model;

use Validator;
use Redirect;
use Session;

use App\teacher_model;
use App\salary_component_model;

class salary_structure extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
       $this->middleware('permission:SALARY_STRUCTURE'); 
     }
    public function index()
    {   
        $earning_component=salary_component_model::where('type','Earning')->get();
        $deducation_component=salary_component_model::where('type','Deduction')->get();
        $teacer_name=teacher_model::all();
        $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $expense_account=chart_of_accounts_model::where('parent_account','Expense')->get();
        return view('admin.payroll.salary_structure',['asset_account'=>$asset_account,'expense_account'=>$expense_account,'earning_component_data'=>$earning_component,'deducation_component'=>$deducation_component,'teacer_name'=>$teacer_name]);
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
        

        $salary_structure_obj=new salary_structure_model;
    $validation=Validator::make($request->all(),$salary_structure_obj->General_validation());
        if($validation->fails())
        {
             return back()->withErrors($validation);
        }
        else
        {


                $salary_structure_obj->fill($request->all())->save();
                if($request->teacher_or_staff_name)
                {   
                    for($i=0; $i<count($request->teacher_or_staff_name);$i++)
                    {
                        $teacher_staff=new salary_structure_teacher_staff_details_model;
                        $teacher_staff->parent=$request->payroll_structure_id;
                        $teacher_staff->teacher_or_staff_name=$request->teacher_or_staff_name[$i];
                        $teacher_staff->from_date=$request->from_date[$i];
                        $teacher_staff->base=$request->base[$i];
                        $teacher_staff->variable=$request->variable[$i];
                        $teacher_staff->save();
                    }
                }


            if($request->earn_component_name and $request->earn_formula or $request->earn_amount)
            {   
                    for($i=0; $i<count($request->earn_component_name);$i++)
                    {
                        $earn_component=new salary_structure_earning_component_model;
                        $earn_component->parent=$request->payroll_structure_id;
                        $earn_component->earn_component_name=$request->earn_component_name[$i];
                        $earn_component->earn_formula=$request->earn_formula[$i];
                        $earn_component->earn_amount=$request->earn_amount[$i];
                        $earn_component->save();
                    }
            }

            if($request->deduction_component_name and $request->deduction_formula or $request->deduction_amount)
            {   
                for($i=0; $i<count($request->deduction_component_name);$i++)
                {
                $deducation_component=new salary_structure_deduction_component_model;
                $deducation_component->parent=$request->payroll_structure_id;
                $deducation_component->deduction_component_name=$request->deduction_component_name[$i];
                $deducation_component->deduction_formula=$request->deduction_formula[$i];
                $deducation_component->deduction_amount=$request->deduction_amount[$i];
                $deducation_component->save();
                }
            }
                
                session()->flash('success', "New Salary Structure Are Created");
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
