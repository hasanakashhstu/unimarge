<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Session;
use Redirect;
use App\parents_info_model;
use App\manage_class_model;
use App\parents_info_child_model;
use App\students_child;
use App\teacher_model;
use Validator;
use Hash;
use File;
use App\ov_setup_model;
use App\student_educational_qualification_model;
use App\student_hem_info_model;
use DB;
use App\student_office_copy_model;
class student_information extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Session::flash('error','You Are Going True Wrong Track');
        return Redirect::back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
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
         return view('admin.students.student_information',['student_data_table'=>students::where('class',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session=ov_setup_model::where('type','Session')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $batch=ov_setup_model::where('type','Batch')->get();
        $medium=ov_setup_model::where('type','Medium')->get();

        $educational_qualifincations=student_educational_qualification_model::where('student_roll',$id)->get();
        $hem_section_info=student_hem_info_model::where('student_roll',$id)->first();
        $office_copy_data=student_office_copy_model::where('student_roll',$id)->first();

        return view('admin.students.Edit.admit_student_edit',['students_data'=>students::where('roll',$id)->first(),'parents_data'=>parents_info_model::all(),'class_data'=>manage_class_model::all(),'student_child'=>students_child::where('roll',$id)->first(),'session'=>$session,'shift'=>$shift,'medium'=>$medium,'batch'=>$batch,'teacher_data'=>teacher_model::all(),'educational_qualifincations'=>$educational_qualifincations,'hem_section_info'=>$hem_section_info,'office_copy_data'=>$office_copy_data]);
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
        $students_obj=new students;
        $validation=Validator::make($request->all(),$students_obj->student_info_edit());
        if($validation->fails())
        {
            $data=array_except($request->all(),['_method','_token','exam_name','borad','reg_no','roll_no','group','passing_year','gpa']);
             return back()->withInput($data)->withErrors($validation);
        }
        else
        {

            DB::beginTransaction();
            $Data=$request->all();
            if($request->password){
                $Data=array_set($Data,'password',Hash::make($request->password));
            }
            $students_obj->where('roll',$id)->first()->fill($Data)->save();

            if(!empty($request->exam_name) && count($request->exam_name)>0)
            {
                student_educational_qualification_model::where('student_roll',$id)->delete();
                foreach ($request->exam_name as $key => $exam_value)
                {
                    $qualification_data[]=[
                        'student_roll'=>$id,
                        'exam_name'=>$request->exam_name[$key],
                        'borad'=>$request->borad[$key],
                        'reg_no'=>$request->reg_no[$key],
                        'roll_no'=>$request->roll_no[$key],
                        'group'=>$request->group[$key],
                        'passing_year'=>$request->passing_year[$key],
                        'gpa'=>$request->gpa[$key],
                    ];
                }
                student_educational_qualification_model::insert($qualification_data);
            }


            if(!empty($request->post_office) or !empty($request->home_district) or !empty($request->division) or !empty($request->village_name)):
                if(students_child::where('roll',$id)->first()):
                students_child::where('roll',$id)->first()->fill($request->all())->save();
                else:
                    $students_child_obj=new students_child;
                    $students_child_obj->fill($request->all())->save();
                endif;
            endif;

           if($request->is_family_member_of_hem_section=="yes")
           {
                $prev_hem_data=student_hem_info_model::where('student_roll',$id)->first();
                if($prev_hem_data)
                {
                    $prev_hem_data->fill($request->all())->save();
                }
                else
                {

                    if(!empty($request->hem_member_no) or !empty($request->hem_group) or !empty($request->hem_village) or !empty($request->hem_section) or !empty($request->hem_zilla))
                    {
                          $new_hem_info=new student_hem_info_model;
                          $new_hem_data=$request->all();
                          $new_hem_data=array_add($new_hem_data,'student_roll',$id);
                          $new_hem_info->fill($new_hem_data)->save();
                    }
                  
                }
           }
           if($request->is_family_member_of_hem_section=="no")
           {
                $prev_hem_data=student_hem_info_model::where('student_roll',$id)->first();
                if($prev_hem_data)
                {
                    $prev_hem_data->delete();
                }
           }

           if(!empty($request->inspection_no) or !empty($request->reference))
            {
                $prev_data=student_office_copy_model::where('student_roll',$id)->first();
                if($prev_data)
                {
                    $office_copy_data=[
                    'inspection_no'=>$request->inspection_no,
                    'reference'=>$request->reference
                    ];
                    $prev_data->update($office_copy_data);
                }
                else
                {
                    $office_copy_data=[
                        'student_roll'=>$id,
                        'inspection_no'=>$request->inspection_no,
                        'reference'=>$request->reference
                    ];
                    student_office_copy_model::insert($office_copy_data);
                }
            }
            DB::commit();

            if($request->hasfile('student_image')):
                $file_path="img/backend/student/";
                $file_name=$request->roll.".jpg";
                $request->file('student_image')->move($file_path,$file_name);

            endif;
            Session::flash('success',"$request->student_name ($request->roll) Profile are Succesfully Update");
            return Redirect::to('/admit_student');
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
        students::where('roll',$id)->delete();
        students_child::where('roll',$id)->delete();
        student_educational_qualification_model::where('student_roll',$id)->delete();
        student_hem_info_model::where('student_roll',$id)->delete();
        student_office_copy_model::where('student_roll',$id)->delete();

         $my_file="img/backend/student/$id".".jpg";
                if (File::exists($my_file))
                {
                    File::delete($my_file);

                }
         Session::flash('success',"Successfully Deletd This Student Information");
         return Redirect::back();


        // if($request->hasfile('student_image')):
        //         $file_path="img/backend/student/";
        //         $file_name=$request->roll.".jpg";
        //         $request->file('student_image')->move($file_path,$file_name);

        //     endif;
    }
  public function ex_student_information($student_roll)
   {

    $student_info=students::where('roll',$student_roll)->first();
    $parents_info=parents_info_model::join('parents_info_child','parents_info.parent_id','=','parents_info_child.parent')->where('parents_info.parent_id',$student_info->parent_name)->first();
    return view('admin.students.ex_student_information',['student_data'=>$student_info,'parents_data'=>$parents_info]);
   }

   public function remove_ex_student_edu_data(Request $request)
   {
       $deleted=student_educational_qualification_model::where('eqalification_id',$request->eqalification_id)->delete();
       return $deleted ? '200' : '403';
   }
}
