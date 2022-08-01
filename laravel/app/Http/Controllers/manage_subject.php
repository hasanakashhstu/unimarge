<?php

namespace App\Http\Controllers;

use App\manage_department_model;
use Illuminate\Http\Request;
use App\manage_class_model;
use App\teacher_model;
use App\manage_subject_model;
use App\component_model;
use App\subject_component;
use App\ov_setup_model;
use Session;
use Validator;
use DB;
class manage_subject extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
         $manage_subject=new manage_subject_model;
        $validation=Validator::make($request->all(),$manage_subject->validation_rule());
        if($validation->fails())
        {
            return back()->withInput()->WithErrors($validation);
        }
        else
        { 

            $manage_subject_data=$request->all();
            

            $manage_subject->fill($manage_subject_data)->save();
            foreach ($request->component_id as $key => $value) {
                        if($request->component_id!=''):
                          $subject_component_data=new subject_component;
                          
                          $subject_component_data->subject_id=$request->id;
                          $subject_component_data->component_id=$request->component_id[$key];
                          $subject_component_data->total_mark=$request->total_mark[$key];
                          $subject_component_data->pass_mark=$request->percentage[$key];
                          $subject_component_data->save();
                        endif;
  
            }  
              
        Session::flash('success',"$request->subject_name Infomation Are successfully Inserted");
        return back()->with('success',"$request->subject_name Infomation Are successfully Inserted");
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
        $medium=ov_setup_model::where('type','Medium')->get();
        $department=manage_department_model::all();
       $subject_list = manage_subject_model::join('manage_department','manage_department.id','=','manage_subject.department')->where('manage_subject.class',$id)->get();
        return view('admin.subject.manage_subject',['teacher'=>teacher_model::all(),'request_class'=>$id,'subject_list'=>$subject_list,'component_data'=>component_model::all(),'medium'=>$medium,'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $medium=ov_setup_model::where('type','Medium')->get();
        $component_data=DB::table('subject_component')->join('component','subject_component.component_id','component.component_id')->where('subject_id',$id)->get();
        $department=manage_department_model::all();
        return view('admin.subject.Edit.manage_subject_edit',['all_component'=>component_model::all(),'particular_component_data'=>$component_data,'subject_info'=>manage_subject_model::where('id',$id)->first(),'request_class'=>$id,'class_list'=>manage_class_model::all(),'teacher_list'=>teacher_model::all(),'medium'=>$medium,'department'=>$department]);
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
        manage_subject_model::where('id',$id)->first()->fill($request->all())->save();
        $subject_component_data=new subject_component;

        

        if($request->component_id[0] != "")
        {
            

                foreach ($request->component_id as $key => $value) {
                        if($request->total_mark[$key] !='')
                        {
                           
                           $have=DB::table('subject_component')->where('subject_component_id',$request->component_id[$key])->first();
                           if($have)
                           {
                           
                                 DB::table('subject_component')->where('subject_component_id',$request->component_id[$key])->update([
                                    'total_mark'=>$request->total_mark[$key],
                                    'pass_mark'=>$request->pass_mark[$key],
                                ]);
                           }
                           else
                           {
                                
                                $subject_component_data=new subject_component;
                              
                                  $subject_component_data->subject_id=$id;
                                  $subject_component_data->component_id=$request->component_id[$key];
                                  $subject_component_data->total_mark=$request->total_mark[$key];
                                  $subject_component_data->pass_mark=$request->pass_mark[$key];
                                  $subject_component_data->save();
                           }
                         }  
                        else
                        {        $subject_component_data=new subject_component;
                              
                                  $subject_component_data->subject_id=$id;
                                  $subject_component_data->component_id=$request->component_id[$key];
                                  $subject_component_data->total_mark=0;
                                  $subject_component_data->pass_mark=0;
                                  $subject_component_data->save();   
                              
                        }
  
                } 


        }
       
        




        
                       

        Session::flash('success',"$request->subject_name Infomation Are successfully Updated");
       return back()->with('success',"$request->subject_name Infomation Are successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        manage_subject_model::where('id',$id)->delete();
        Session::flash('success','Delete Operation Successfully Completed');
        return back()->with('success','Delete Operation Successfully Completed');
    }
}