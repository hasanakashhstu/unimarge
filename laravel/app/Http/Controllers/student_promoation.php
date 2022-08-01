<?php

namespace App\Http\Controllers;

use App\ov_setup_model;
use Illuminate\Http\Request;
use App\students;
use App\manage_class_model;
use App\manage_section_model;
use App\general_settings_model;
use Redirect;
use Session;
class student_promoation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$session=students::select('session')->groupby('session')->get();
        $session=ov_setup_model::where('type','Session')->get();
        $class=students::select('class')->groupby('class')->get();
        $promote_clas=manage_class_model::all();
        $current_department=students::select('department')->groupby('department')->get();

        return view('admin.students.student_promoation',['session_filter'=>$session,'class_filter'=>$class,'promote_class'=>$promote_clas,'current_department'=>$current_department]);
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

        $manage_section=manage_section_model::where('class',$request->promote_class)->get();
    
        $class = manage_class_model::where('class_name', $request->current_class)->first();
        
        $manage_class=manage_class_model::where('id','>=', $class->id)->get();
        $promoation_table=students::where('session',$request->current_session)->where('class',$request->current_class)->get();

        $table="<table class=\"table table-bordered data-table\">";

        $table.="<thead>";
        $table.="<tr>";
        $table.="<th>Student Name</th>";
        $table.="<th style='width: 10%;'>Current Class</th>";
        $table.="<th>Section</th>";
        $table.="<th>Department</th>";
        $table.="<th style='width: 6%;'>Roll</th>";
        $table.="<th>Reg</th>";
        $table.="<th style='width: 10%;'>Class Enrol</th>";
        $table.="<th style='width: 2%;'>info</th>";
        $table.="</tr>";
        $table.="</thead>";


        $table.="<tbody>";
        foreach($promoation_table as $promoation_table_data)
        {
            $table.="<tr>";
            $table.="<td><a href=\"student_information/$promoation_table_data->roll/edit\">$promoation_table_data->student_name</a></td>";
            $table.="<td>$promoation_table_data->class</td>";
            $table.="<td><select name=\"section_name[]\" style=\"width:75%\">";
            $table.="<option>--select--</option>";
            foreach($manage_section as $key => $manage_section_data)
            {
                $table.="<option selected>$manage_section_data->section_name</option>";
            }
            $table.="</select></td>";
            $table.="<td>$promoation_table_data->department</td>";
            $table.="<td>$promoation_table_data->roll<input type=\"hidden\" value=\"$promoation_table_data->roll\" name=\"student_roll[]\"></td>";
            $table.="<td>$promoation_table_data->reg_number</td>";
            $table.="<td >";

            $table.="<select name=\"class[]\">";
            $table.="<option value=\"$request->promote_class\">Enrol To Class $request->promote_class</option>";
            foreach($manage_class as $manage_class_data)
            {
                $table.="<option value=\"$manage_class_data->class_name\">Enrol To Class $manage_class_data->class_name</option>";
            }
            $table.="</select>";

            $table.="</td>";
            $table.="<td class=\"center\">";

            $table.="<div id=\"my_align\" class=\"display_status\">";
            $table.="<a href='#' class='btn btn-success'><i class=\"fa fa-street-view\" aria-hidden=\"true\"></i></a>";

            $table.="</div>";


            $table.="</td>";
            $table.="</tr>";
        }


        $table.="</tbody>";
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
        if(!empty($request->student_roll)):
            for($i=0;$i<count($request->student_roll);$i++)
            {
                $students_obj=new students;
                students::where('roll',$request->student_roll[$i])->update(["section"=>$request->section_name[$i],"class"=>$request->class[$i]]);

            }
            Session::flash('success',"Student's Promotion Operation are Successfully Completed");
            return Redirect::back();
        else:
            Session::flash('error','No Data Are in ? which Are Data Are you Process');
            return Redirect::back();
        endif;
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
    
    public function promotable_class(Request $request){
        $current = $request->input('current_class');
        $class = manage_class_model::where('class_name', $current)->first();
        $classes = manage_class_model::where('id','>', $class->id)->get();
        $select = '';
        foreach ($classes as $class){
            $option = '<option val="'.$class->class_name.'">'.$class->class_name.'</option>';
            $select = $select.$option;
        }
        return $select;
    }
}




