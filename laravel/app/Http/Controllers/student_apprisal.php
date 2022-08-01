<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\apprisals;
use App\apprisal_goals;

use App\apprisal_component_model;
use App\apprisal_templete_child;
use App\teacher_model;
use App\students;
use Redirect;
use Excel;
use PDF;
use App\ov_setup_model;
class student_apprisal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:APPRISAL'); 
     }


    public function index()
    {
        $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.apprisal.student_apprisal',['apprisal_template'=>apprisal_component_model::where('active_status','yes')->get(),'medium'=>$medium]);
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
        
        $apprisal= new apprisals;
        $validation=Validator::make($request->all(),$apprisal->validation());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $data=$request->all();
            if($request->apprisal_type=="Student")
            {
                $data=array_set($data,'apprisal_name',$request->none);
            }

            $apprisal->fill($data)->save();

            for($a=0;$a<count($request->goals);$a++)
            {
                $apprisal_goals=new apprisal_goals;
                $apprisal_goals->goals=$request->goals[$a];
                $apprisal_goals->weightage=$request->weightage[$a];
                $apprisal_goals->score=$request->Score[$a];
                $apprisal_goals->parent=$request->apprisal_id;
                $apprisal_goals->save();
            }
            Session::flash('success',"$request->apprisal_name Apprisal Succesfully Added");
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
        $select="";
        if($id=="Student"):
            $student_data=students::all();
            foreach ($student_data as $value) {
                $select.="<option value=\"$value->roll\">$value->student_name</option>";
            }
        elseif($id=="Teacher"):
            $student_data=teacher_model::where('status','Teacher')->get();
            foreach ($student_data as $value) {
                $select.="<option value=\"$value->teacher_id\">$value->teacher_name</option>";
            }
        else:
            $student_data=teacher_model::where('status','Staff')->get();
            foreach ($student_data as $value) {
                $select.="<option value=\"$value->teacher_id\">$value->teacher_name</option>";
            }

        endif;

        echo $select;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apprisal_component=apprisal_templete_child::where('parent',$id)->get();

        $tr="<table class='table address input_fields_wrap'>";
        $tr.="<thead>";
        $tr.="<tr>";
        $tr.="<th>Goal</th>";

        $tr.="<th>Weightage(%)</th>";

        $tr.="<th>Score</th>";




        $tr.="</tr>";
        $tr.="</thead>";

        $tr.="<tbody>";

        $i=1;
        foreach ($apprisal_component as $value) {

            $tr.="<tr>";

            // Goal Td Are Here
            $tr.="<td>";

            $tr.="<input type='text' disabled='disabled'  value=\"$value->kra\" name='goals[]' id='a_table'>";
            $tr.="<input type='hidden'  value=\"$value->kra\" name='goals[]' id='a_table'>";
            // {{Form::text('goals[]','',['id'=>'a_table'])}}

            $tr.="</td>";
            // Goal Td Are Here


            // weightage Td Are Here
            $tr.="<td>";
            $tr.="<input type='text' disabled='disabled'  value=\"$value->weightage\" name='weightage[]' id='a_table'>";
            $tr.="<input type='hidden'  value=\"$value->weightage\" name='weightage[]' id='a_table'>";
            $tr.="</td>";
            // weightage Td Are Here


            // Score Td Are Here
            $tr.="<td>";
            $tr.="<input type='text' name='Score[]' class='score hundered_validation_check' id='score_$i'>";
            $tr.="</td>";
            // Score Td Are Here


            $tr.="</tr>";

            $i++;

        }

        $tr.="<tbody>";
        $tr.="<input type='hidden' class='total_goal' value=\"$i\">";
        $tr.="</table>";

        echo $tr;
        echo "<font color=\"red\">Score Are Calculated Out of weightage</font>";

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
        $apprisal=new apprisals;
        $data=$request->all();
        if($request->apprisal_type=="Student")
        {
            $data=array_set($data,'apprisal_name',$request->none);
        }
        $apprisal->where('apprisal_id',$id)->first()->fill($data)->save();

        for($a=0;$a<count($request->id);$a++)
        {
            apprisal_goals::where('id',$request->id[$a])->update(['score'=>$request->score[$a]]);




        }
        Session::flash('success',"$request->apprisal_name Apprisal Information Succesfully Updated");
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        apprisals::where('apprisal_id',$id)->delete();
        apprisal_goals::where('parent',$id)->delete();

        Session::flash('success',"This Apprisal Information Succesfully Delete");
        return Redirect::back();
    }

    public function student_apprisal_edit($id){
        $apprisal_info=apprisals::where('apprisal_id',$id)->first();
        $apprisal_component=apprisal_goals::where('parent',$id)->get();
        $medium=ov_setup_model::where('type','Medium')->get();


        return view('admin.apprisal.Edit.student_apprisal_edit',['apprisal_template'=>apprisal_component_model::all(),'apprisal_info'=>$apprisal_info,'apprisal_component'=>$apprisal_component,'medium'=>$medium]);

    }

    public function pdf()
    {

        $html = view('admin.apprisal.Export.Apprisal_pdf',['apprisals'=>apprisals::all()])->render();

        return PDF::load($html)->show();


    }

    public function excel()
    {
        Excel::create('Apprisal Excel', function($excel)
        {
            $excel->sheet('Excel sheet', function($sheet)
            {
                $sheet->setOrientation('landscape');

                $sheet->loadview('admin.apprisal.Export.apprisal_excel',['apprisals'=>apprisals::all()]);
            });
        })->export('xls');



    }
}
