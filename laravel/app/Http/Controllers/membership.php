<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\membership_model;
use Session;
use Validator;
use Redirect;
class membership extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Libray.membership',["library_teacher_data"=>membership_model::where('type','Teacher')->get(),'library_student_data'=>membership_model::where('type','Student')->orderBy('roll_number','DESC')->get()]);
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
        
        $membership_info=new membership_model;
        if($request->type=="Teacher")
        {
            $validation=Validator::make($request->all(),$membership_info->teacher_roles_rule());
        }
        else
        {
            $validation=Validator::make($request->all(),$membership_info->student_roles_rule());
        }
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
            if($request->type=="Teacher")
            {
                $member_data=[
                    'member_id'=>time(),
                    'teacher_id'=>$request->teacher_id,
                    'teacher_name'=>$request->teacher_name,
                    'teacher_email'=>$request->teacher_email,
                    'teacher_phone'=>$request->teacher_phone ? $request->teacher_phone : '',
                    'from_date'=>$request->from_date,
                    'to_date'=>$request->to_date,
                    'status'=>$request->status,
                    'type'=>$request->type
                ];
            }
            else
            {
                $member_data=[
                    'member_id'=>time(),
                    'member_name'=>$request->member_name,
                    'roll_number'=>$request->roll_number,
                    'reg_number'=>$request->reg_number ? $request->reg_number : '',
                    'status'=>$request->status,
                    'email'=>$request->email,
                    'phone'=>$request->phone ? $request->phone :'',
                    'from_date'=>$request->from_date,
                    'to_date'=>$request->to_date,
                    'status'=>$request->status,
                    'type'=>$request->type
                ];
            }
            membership_model::insert($member_data);

          Session::flash('success',"$request->member_name Information are Successfully Inserted");
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
        return view('admin.Libray.Edit.membership_edit',['membership_data'=>membership_model::where('member_id',$id)->first()]); 
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
        $membership_info=membership_model::where('member_id',$id)->first();

        if($membership_info->type=="Teacher")
            {
                $member_data=[
                    'from_date'=>$request->from_date,
                    'to_date'=>$request->to_date,
                    'status'=>$request->status,
                ];
            }
            else
            {
                $member_data=[
                    'from_date'=>$request->from_date,
                    'to_date'=>$request->to_date,
                    'status'=>$request->status,
                ];
            }
            $membership_info->update($member_data);
        Session::flash('success',"Member Information are Successfully Update");
        return back()->with('success',"Member Information are Successfully Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       membership_model::where('member_id',$id)->delete();
       Session::flash('success','Delete Operation Successfully Inserted');
       return Redirect::back();
    }
    public function membership_data_get(Request $request)
    {
       return membership_model::where('roll_number',$request->roll_number)->first();
       
    }
}
