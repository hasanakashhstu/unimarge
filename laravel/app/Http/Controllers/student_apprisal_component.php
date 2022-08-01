<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\apprisal_component_model;
use App\apprisal_templete_child;
use Redirect;
class student_apprisal_component extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.apprisal.student_apprisal_component');
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
        
        $apprisal= new apprisal_component_model;
        $validation=Validator::make($request->all(),$apprisal->validation());
        if($validation->fails())
        {
           return back()->withErrors($validation); 
        }
        else
        {
            
            $data=$request->all();
            $data=array_set($data,'title',str_slug($request->title,'-'));
            $apprisal->fill($data)->save();
            for($i=0;$i<count($request->kra);$i++)
            {
                $component_goal=new apprisal_templete_child;
                $component_goal->kra=$request->kra[$i];
                $component_goal->weightage=$request->weightage[$i];
                $component_goal->parent=$request->template_id;
                $component_goal->save(); 
            }

            Session::flash('success','New Apprisal Template Are created');
            return redirect('/apprisal_template_report');        
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
        $template_details=apprisal_component_model::where('template_id',$id)->first();
        $tamplate_child_details=apprisal_templete_child::where('parent',$id)->get();

        return view('admin.apprisal.Edit.apprisal_template_edit',['template_details'=>$template_details,'template_child_details'=>$tamplate_child_details]);
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


        $apprisal= new apprisal_component_model;
        $validation=Validator::make($request->all(),$apprisal->validation());
        if($validation->fails())
        {
           return back()->withErrors($validation); 
        }
        else
        {
           
            apprisal_component_model::where('template_id',$id)->first()->fill($request->all())->save();
            // echo "<pre>";
            $component_child=apprisal_templete_child::where('parent',$id)->get();
            // print_r($component_child);
            // echo ($request->kra[0]);
            // exit();
            for($i=0;$i<count($request->kra);$i++)
            {
                // $save_value=apprisal_templete_child::where('id',$component_child[$i]->id)->first();

                if(@$component_child[$i]->id):
                    apprisal_templete_child::where('id',$component_child[$i]->id)->update(['kra'=>$request->kra[$i],'weightage'=>$request->weightage[$i]]);
                else:
                    $save_value=new apprisal_templete_child;
                    $save_value->kra=$request->kra[$i];
                    $save_value->weightage=$request->weightage[$i];
                    $save_value->parent=$request->template_id;
                    $save_value->save();
                endif;
            }

            Session::flash('success',"$request->title Template Updated successfull");
            return Redirect::back();           
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            apprisal_component_model::where('template_id',$id)->delete();
            apprisal_templete_child::where('parent',$id)->delete();
            Session::flash('success','Delete Operation Successfully Complted');
            return Redirect::back(); 
    }
}
