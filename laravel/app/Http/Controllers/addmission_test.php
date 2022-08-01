<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aplicant_student_model;
use App\students;
use File;
use Redirect;
use Session;
use Validator;
use App\general_settings_model;
use App\ov_setup_model;
use Hash;
class addmission_test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('permission:ADMISSION_TEST');
     }

    public function index()
    {

        $default_session=general_settings_model::first();
        $applicant_student_addmission_test_wise=aplicant_student_model::select('admission_test')->groupby('admission_test')->get();

        $class=aplicant_student_model::select('class')->groupby('class')->get();
        $batch_info=ov_setup_model::where('type','Batch')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $medium=ov_setup_model::where('type','Medium')->get();
        $session=aplicant_student_model::select('session')->groupby('session')->get();

        $department=aplicant_student_model::select('department')->groupby('department')->get();

    return view("admin.students.admission_test",['admission_test'=>$applicant_student_addmission_test_wise,'class'=>$class,'session'=>$session,'department'=>$department,'general_settings'=>$default_session,'batch'=>$batch_info,'shift'=>$shift,'medium'=>$medium]);
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
        //dd($request->all());

        $validation_check=new students;
        $validation=Validator::make($request->all(),$validation_check->addmission_test());

        if($validation->fails())
        {
            return back()->withErrors($validation);
        }
        else
        {

            if($request->student_name):
                for($i=0;$i<count($request->student_roll);$i++)
                {
                //For Start


                        if($request->result[$i]=="Pass")
                        {

                            $students_data=new students;
                            $students_data->student_name=$request->student_name;
                            $students_data->status="Active";
                            $students_data->department=$request->department;
                            $students_data->roll=$request->student_roll[$i];
                            $students_data->reg_number=$request->student_reg[$i];

                            $students_data->class=$request->class;
                            $students_data->department=$request->department;
                            $students_data->session=$request->session;
                            $students_data->medium=$request->medium;
                            $students_data->shift=$request->shift_enroll[$i];
                            $students_data->batch=$request->batch;
                            $students_data->applicant_id=$request->applicant_id[$i];

                            $password=Hash::make($request->student_roll[$i]); //Password For Hasing
                            $students_data->email=$request->student_roll[$i];
                            $students_data->password=$password;
                            $students_data->save();





                $applicant_student_full_details=aplicant_student_model::where('applicant_id',$request->applicant_id[$i])->first();
                            $my_file="img/backend/aplicant_student/$applicant_student_full_details->applicant_id".".jpg";
                                if (File::exists($my_file))
                                {
                                    $file_name=$request->student_roll[$i];
                                    $dest="img/backend/student/$file_name".".jpg";
                                    File::copy($my_file,$dest);

                                }


                aplicant_student_model::where('applicant_id',$request->applicant_id[$i])->update(['status'=>$request->result[$i]]);

                        }

                //For End
                }
                Session::flash('success','Student information Succesfully Set Admit Student');
                return Redirect::back();

            else:
                Session::flash('error','No Data are In , Which Data are Process ?');
                return Redirect::back();
            endif;
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

    public function check_reg_no_ex(Request $request)
    {
        return students::where('reg_number',$request->reg_no)->first();
    }
}
