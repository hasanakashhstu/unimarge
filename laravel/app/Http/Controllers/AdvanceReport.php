<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\manage_department_model;
use App\manage_section_model;
use App\students;
use App\parents_info_model;
use Illuminate\Support\Facades\Input;

class AdvanceReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_data=manage_class_model::all();
        return view('admin.Report.advance_report',['class_data'=>$class_data,'data'=>'']);
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

        $table="<div>";
        $table.="<table border='1' style='width: 100%;background-color: #c7e8ff99;'>";
        $table.="<thead>";
        $table.="<tr>";

       @$select_data=students::select("roll");
       if(Input::get('student_name_get'))
       {
           $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Name</th>";
           $select_data->addSelect('student_name');
       }
       if(Input::get('student_roll_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Roll</th>";
         $select_data->addSelect('roll');
       }
       if(Input::get('student_reg_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Reg</th>";
         $select_data->addSelect('reg_number');
       }
       if(Input::get('class_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Class</th>";
         $select_data->addSelect('class');
       }
       if(Input::get('parent_name_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Parent Name</th>";
         $select_data->addSelect('parent_name');
       }
        if(Input::get('department_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Department</th>";
         $select_data->addSelect('department');
       }
        if(Input::get('section_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Section</th>";
         $select_data->addSelect('section');
       }
        if(Input::get('batch_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Batch</th>";
         $select_data->addSelect('batch');
       }
       if(Input::get('shift_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Shift</th>";
         $select_data->addSelect('shift');
       }
       if(Input::get('email_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Email</th>";
         $select_data->addSelect('email');
       }
        if(Input::get('phone_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Phone</th>";
         $select_data->addSelect('phone');
       }
        if(Input::get('student_type_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Type</th>";
         $select_data->addSelect('type');
       }
        if(Input::get('gender_get'))
       {
         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Gender</th>";
         $select_data->addSelect('gender');
       }
       $table.="</tr>";
       $table.="</thead>";
       $table.="<tbody>";


        @$query=students::where(function ($query){
           if(Input::get('student_roll'))
            {
                $query->where('roll',Input::get('student_roll'));
            }
            if(Input::get('student_reg'))
            {
                $query->where('reg_number',Input::get('student_reg'));
            }
            if(Input::get('class'))
            {
                $query->where('class',Input::get('class'));
            }
            if(Input::get('department'))
            {
               $query->where('department',Input::get('department'));
            }
            if(Input::get('section'))
            {
                $query->where('section',Input::get('section'));
            }
            if(Input::get('phone_no'))
            {
                $query->where('phone',Input::get('phone_no'));
            }
            if(Input::get('parent_name'))
            {

               $query->where('parent_name',Input::get('parent_name'));
            }
            if(Input::get('student_type'))
            {
               $query->where('type',Input::get('student_type'));
            }
            if(Input::get('gender'))
            {
               $query->where('gender',Input::get('gender'));
            }
       })->get();

        foreach ($query as  $value) {
          $table.="<tr>";
          if(Input::get('student_name_get'))
          {
           $table.="<td>$value->student_name</td>";
          }
          if(Input::get('student_roll_get'))
          {
             $table.="<td>$value->roll</td>";
          }
          if(Input::get('student_reg_get'))
          {
            $table.="<td>$value->reg_number</td>";
          }
          if(Input::get('class_get'))
          {
            $table.="<td>$value->class</td>";
          }
          if(Input::get('parent_name_get'))
          {
             $parent_name=parents_info_model::where('parent_id',$value->parent_name)->first();
             if($parent_name)
             {
              $table.="<td>$value->name</td>";
             }
             else
             {
              $table.="<td></td>";
             }
             
          }
          if(Input::get('department_get'))
          {
            $table.="<td>$value->department</td>";
          }
          if(Input::get('section_get'))
          {
            $table.="<td>$value->section</td>";
          }
          if(Input::get('batch_get'))
          {
           $table.="<td>$value->batch</td>";
          }
          if(Input::get('shift_get'))
          {
            $table.="<td>$value->shift</td>";
          }
          if(Input::get('email_get'))
          {
            $table.="<td>$value->email</td>";
          }
          if(Input::get('phone_get'))
          {
            $table.="<td>$value->phone</td>";
          }
          if(Input::get('student_type_get'))
          {
            $table.="<td>$value->type</td>";
          }
          if(Input::get('gender_get'))
          {
            $table.="<td>$value->gender</td>";
          }
          $table.="</tr>";
    }



              $table.="</tbody>";
              $table.="</table>";
              $table.="</div>";

        $class_data=manage_class_model::all();
        return view('admin.Report.advance_report',['class_data'=>$class_data,'data'=>$table]);
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

    public function advance_report_department(Request $request)
    {
        return manage_department_model::where('class_name',$request->class_name)->get();
    }

    public function advance_report_section(Request $request)
    {
        return manage_section_model::where('class',$request->class_name)->get();
    }
}
