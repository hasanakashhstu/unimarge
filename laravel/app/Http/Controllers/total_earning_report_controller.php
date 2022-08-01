<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacher_model;
use App\salary_component_model;
use App\salary_slip_model;
use App\salary_structure_teacher_staff_details_model;
use App\salary_structure_earning_component_model;
use App\salary_structure_deduction_component_model;
use App\salary_structure_model;
use App\report_settings_model;
class total_earning_report_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payroll.total_earning_report');
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
        
        $earning_component=salary_component_model::where('type','Earning')->get();
         $all_employee=salary_slip_model::where('month',$request->month)
                                        ->where('posting_date',$request->year)
                                        ->get();
         $table="<span style='margin-left: 22px;font-size: 15px;color: #1985a9;'>Month :  $request->month</span></br>";                               
         $table.="<span style='margin-left: 22px;font-size: 15px;color: #1985a9;'>Year :    $request->year</span>";                               
         $table.="<h3 class='text-center' style='color: #1985a9;'>Salary Report</h3>";
                           
        $table.="<table border='1' style='width: 1113px;margin-top: 20px;    margin-bottom: 20px;'>";
                     $table.="<thead>";
                     $table.="<tr>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Sl No</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Name Of Employees</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Id</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Designation</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Joining Date</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Grade No</th>";

                         foreach ($earning_component as  $earning_component_value) {
                              $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>$earning_component_value->components_name</th>";
                         }
                        


                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Total Salary</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Total Deduction</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Net Pay</th>";

                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Sign</th>";


                    $table.="</tr>";
                    $table.="</thead>";
                    $table.="<tbody>";

                    if(count($all_employee)>0)
                    {


                    
                    foreach ($all_employee as  $key=>$all_employee_value) 
                    {
                        $key++;

                       $employee=teacher_model::where('teacher_id',$all_employee_value->person_id)->first();

                    $single_employee_details=salary_structure_teacher_staff_details_model::where('teacher_or_staff_name',$all_employee_value->person_id)->first();

                        if($single_employee_details)
                        {
                            $salary_grade_data=salary_structure_model::where('payroll_structure_id',$single_employee_details->parent)->first();
                            $salary_grade=$salary_grade_data->title;

                            $component_amount=salary_structure_earning_component_model::where('parent',$single_employee_details->parent)->get();
                            $deduction_amount=salary_structure_deduction_component_model::where('parent',$single_employee_details->parent)->get();


                        }
                        else
                        {
                           $salary_grade='';  
                        }

                       

                       $table.="<tr>";
                            $table.="<td>$key</td>";
                            $table.="<td>$employee->teacher_name</td>";
                            $table.="<td>$employee->teacher_id</td>";
                            $table.="<td>$employee->designation</td>";
                            $joining_date=date('d-M-Y',strtotime($employee->created_at));
                            $table.="<td>$joining_date</td>";
                            $table.="<td>$salary_grade</td>";


                            $total_salary=0;
                            
                           foreach ($component_amount as  $all_comp_data_value)
                            {
                                if($salary_grade)
                                {
                                    if($all_comp_data_value->earn_formula)
                                    {

                                         $formula_explode=explode("*",$all_comp_data_value->earn_formula);
                                    $formula=$formula_explode[1];
                                    $main_amount=($single_employee_details->base*$formula);
                                    $total_salary=$total_salary+$main_amount;
                                     $table.="<td>$main_amount</td>";
                                    }
                                    else
                                    {
                                        $total_salary=$total_salary+$all_comp_data_value->earn_amount;
                                        $table.="<td>$all_comp_data_value->earn_amount</td>";
                                    }
                                   
                                }
                                else
                                {
                                     $table.="<td></td>";
                                }
                               
                            }

                            $total_deduction=0;
                            foreach ($deduction_amount as $deduction_amount_val) {

                               if($salary_grade)
                                {
                                    if($deduction_amount_val->deduction_formula)
                                    {

                                         $de_formula_explode=explode("*",$deduction_amount_val->deduction_formula);
                                    $de_formula=$de_formula_explode[1];
                                    $de_main_amount=($single_employee_details->base*$de_formula);
                                    $total_deduction=$total_deduction+$de_main_amount;

                                    }
                                    else
                                    {
                                        $total_deduction=$total_deduction+$deduction_amount_val->deduction_amount;

                                    }
                                   
                                }

                               
                            }

                            $net_pay=$total_salary-$total_deduction;


                            $table.="<td>$total_salary</td>";
                            $table.="<td>$total_deduction</td>";
                            $table.="<td>$net_pay</td>";
                            $table.="<td></td>";
                        $table.="</tr>";
                    }
                }
                else{
                    $count=$earning_component->count()+10;
                    $table.="<td colspan='$count' style='    text-align: center;font-size: 15px;padding: 10px;color: red;'>No Data Found</td>";
                }

                        




                    $table.="</tbody>";
                $table.="</table>";


                $table.="<table>";
                   $table.="<tr>";
                     $report_settings=report_settings_model::all();


       foreach($report_settings as $key=>$report_settings_value)
       {

        
        $table.="<td>";
        $table.="<hr style=\"margin-top: 52px;width: 180px;\">";
        $table.="<span style=\"\">$report_settings_value->name</span>
            <br>
            <span style=\" \">$report_settings_value->designation</span>";
        $table.="</td>";
       
       }
     $table.="</tr>";
   $table.="</table>";
                

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
