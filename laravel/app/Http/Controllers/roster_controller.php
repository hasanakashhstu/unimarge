<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\canteen_component_model;
use App\assign_canteen_model;
use App\roster_model;
use App\chart_of_accounts_model;
use App\roster_configuration_model;
use App\invoice_component_model;
use Validator;
use Session;
class roster_controller extends Controller
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
      
        return view('admin.Canteen.roster');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice_component=invoice_component_model::all();
        $data=roster_configuration_model::where('id','1540318856')->first();
        return view('admin.Canteen.roster_configuration',['data'=>$data,'invoice_component'=>$invoice_component]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
       $roster_configuration=roster_configuration_model::where('id',$id)->first();
        $roster_configuration->fill($request->all())->save();
        Session::flash('success','Data Updated Succssfully');
        return back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
   }



    public function roster_data(Request $request)
    {

        $date=date("Y-m-d", strtotime($request->date));
        $component=canteen_component_model::all();
        $assign_student=assign_canteen_model::all();

        $roster_data=roster_model::where('date',$date)->get()->toArray();
        $roster_data_short=array_column($roster_data,'student_roll');


        $table="<table class=\"table table-bordered data-table\">";
        $table.="<thead>";
        $table.="<tr>";
        $table.="<th>Sl No</th>";
        $table.="<th>Date</th>";
        $table.="<th>Student Name</th>";
        $table.="<th>Student Roll</th>";
        $table.="<th>Class</th>";
        $table.="<th>Department</th>";
        foreach($component as $component_data)
        {
         $table.="<th>$component_data->component_title</th>";
        }
        $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
        $i=0;
        foreach($assign_student as $key=>$assign_student_value)
        {

            $i++;
            $table.="<tr class=\"gradeX\">";
            $table.="<td>$i</td>";
            $table.="<td>$date</td>";
            $table.="<td>$assign_student_value->student_name</td>";
            $table.="<td>$assign_student_value->student_roll</td>";
            $table.="<td>$assign_student_value->class</td>";
            $table.="<td>$assign_student_value->department</td>";
            foreach($component as $component_data)
            {
              
               $table.="<td>";
               $table.="<input style=\"width: 60px;display:none;\" type=\"text\" name=\"student_roll\"  class=\"student_roll\" value=$assign_student_value->student_roll>";
               $table.="<input style=\"width: 100px;display:none;\" class=\"component_id\" type=\"text\" name=\"component_id\" value=$component_data->canteen_component_id>";
                

                $find_current_date_student_roster_data=array_keys($roster_data_short,$assign_student_value->student_roll);
               
                $roster_amount=0;
                foreach ($find_current_date_student_roster_data as $key => $value) {
                    if($roster_data[$value]['component_id'] == $component_data->canteen_component_id)
                    {
                        $roster_amount=$roster_data[$value]['amount'];

                    }
                   
                }
                if($roster_amount)
                {
            $table.="<input style=\"width: 60px;\"  type=\"text\" name=\"amount\" class=\"amount\" value=$roster_amount  />"; 
                }
                else
                {
    $table.="<input style=\"width: 60px;\"  type=\"text\" name=\"amount\" class=\"amount\"  />"; 
                }

                
               
              
               $table.="</td>";


            }
                                  
             $table.="</tr>";
        }

        $table.="<tr style='background-color:#d4d4d4;'>";
        $table.="<td colspan=\"6\" style='text-align: center;font-size: 18px;'>TOTAL</td>";
            foreach ($component as $key => $component_data) {

               $data=roster_model::where('date',$date)->where('component_id',$component_data->canteen_component_id)->get();
               // echo "<pre>";
               // print_r($data);
               $total=0;
               foreach ($data as $key => $value) {
                  $total=$total+$value->amount;
            
               }

               $table.="<td style='font-size: 18px;text-align: center;'>$total</td>";
            }
        $table.="</tr>";

                                        
            $table.="</tbody>";
            $table.="</table>";
            echo $table;
                            
    }


    public function  roster_inserting(Request $request)
    {
       

       $date=date("Y-m-d", strtotime($request->date));
       $roster=roster_model::where('date',$date)
                            ->where('student_roll',$request->student_roll)
                            ->where('component_id',$request->component_id)
                            ->first();

        if($roster)
        {
            $roster->update(['amount'=>$request->amount]);
        }
        else
        {
            $new_roster=new roster_model;
            $requested_data=$request->all();
            $requested_data=array_add($requested_data,'roster_id',time());
            $requested_data=array_set($requested_data,'date',$date);
            $new_roster->fill($requested_data)->save();
        }

    }



}
