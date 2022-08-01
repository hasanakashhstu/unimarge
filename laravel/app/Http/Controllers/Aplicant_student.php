<?php

namespace App\Http\Controllers;

use App\applicant_faculty_choose_model;
use App\blood_group_model;
use App\board_name_model;
use App\degree_name_model;
use App\dependent_relation_model;
use App\districts_model;
use App\divisions_model;
use App\exam_name_model;
use App\group_name_model;
use App\manage_section_model;
use App\maritial_model;
use App\nationality_model;
use App\profession_model;
use App\quota_model;
use App\reference_model;
use App\religion_model;
use App\semester_model;
use App\session_choose_model;
use App\unions_model;
use App\upazilas_model;
use App\year_model;
use Illuminate\Http\Request;
use App\aplicant_student_model;
//use session;
use Session;
use App\applicant_student_child_model;
use Validator;
use File;
use App\exam_list_model;
use App\parents_info_model;
use App\manage_class_model;
use App\manage_department_model;
use Redirect;
use App\general_settings_model;
use App\ov_setup_model;
use Entrust;
use Auth;
use App\user;
use Illuminate\Support\Facades\Input;
use App\applicant_student_educational_q;
use DB;
use App\applicant_student_hem_info_model;
use App\applicant_student_office_copy_model;
class Aplicant_student extends Controller
{
    // public __construct()
    // {
    //     $this->middleware('permission:students')->only('create');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('permission:APPLICANT_STUDENTS'); // if Have Module Permission
       // $this->middleware('permission:STUDENTS')->only; // if Have Module Permission

       // More Example

       // if(Entrust::can('STUDENTS')) {
       //      return Redirect::route();
       //  }
       //  else
       //  {
       //      abort(403);
       //  }

       //More Example

     }

    public function index()
    {


        $session=ov_setup_model::where('type','Session')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $medium=ov_setup_model::where('type','Medium')->get();
        $batch=general_settings_model::first();
        $batch_data=ov_setup_model::where('type','Batch')->get();
        $nationality_data=nationality_model::get();
        $maritial_data=maritial_model::get();
        $blood_group_data=blood_group_model::get();
        $semester_data=semester_model::get();
        $year_data=year_model::get();

        $divisions_data=divisions_model::get();
        $districts_data=districts_model::get();
        $upazilas_data=upazilas_model::get();
        $unions_data=unions_model::get();
        $religion_data=religion_model::get();

        $degree_name_data = degree_name_model::get();
        $session_choose_data = session_choose_model::get();
        $religion_data = religion_model::get();
        $quota_data = quota_model::get();
        $profession_data = profession_model::get();
        $dependent_relation_data = dependent_relation_model::get();
        $exam_name_data = exam_name_model::get();
        $board_name_data = board_name_model::get();
        $group_name_data = group_name_model::get();
        $section_data = manage_section_model::get();



        return view('admin.students.aplicant_student',['exam_lsit'=>exam_list_model::all(),'parents_data'=>parents_info_model::all(),'manage_class'=>manage_class_model::all(),"department"=>manage_department_model::all(),'batch'=>$batch,'session'=>$session,'shift'=>$shift,'medium'=>$medium,'batch_data'=>$batch_data,'nationality_data'=>$nationality_data,'maritial_data'=>$maritial_data,'blood_group_data'=>$blood_group_data,'semester_data'=>$semester_data,'year_data'=>$year_data,'divisions_data'=>$divisions_data,'districts_data'=>$districts_data,'upazilas_data'=>$upazilas_data,'unions_data'=>$unions_data,'religion_data'=>$religion_data,'degree_name_data'=>$degree_name_data,'session_choose_data'=>$session_choose_data,'quota_data'=>$quota_data,'profession_data'=>$profession_data,'dependent_relation_data'=>$dependent_relation_data,'exam_name_data'=>$exam_name_data,'board_name_data'=>$board_name_data,'group_name_data'=>$group_name_data,'section_data'=>$section_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
   
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response --
     */
    /*
    public function store(Request $request)
    {
        
        $check_email=aplicant_student_model::where('email',$request->email)->first();

        if($check_email)
        {
          
            session()->flash('wrong', "Sorry ! Duplicate Email Are Not Allowed");
            $except=['exam_name','borad','reg_no','roll_no','group','passing_year','gpa'];
            return back()->withInput($request->except($except));
        }
        else if(empty($request->class)  or $request->section=="Please Frist Fill Class" or $request->department=="Please Frist Fill Class")
        {
            session()->flash('wrong', "Sorry ! Select Class , Section and Department");
            $except=['exam_name','borad','reg_no','roll_no','group','passing_year','gpa'];
            return back()->withInput($request->except($except));
        }
        else
        {
            DB::beginTransaction();
            $aplicant_student=new aplicant_student_model;
            $validation=Validator::make($request->all(),$aplicant_student->roles_rule());
            if($validation->fails())
            {
                 $except=['exam_name','borad','reg_no','roll_no','group','passing_year','gpa'];
                 return back()->withInput($request->except($except))->withErrors($validation);
            }
            else
            {

                $aplicant_student->fill($request->all())->save();

                if($request->hasfile('image')):
                    $this->image_upload($request,$request->applicant_id);
                endif;

                if(count($request->exam_name)>0)
                {
                    foreach ($request->exam_name as $key => $exam_value)
                    {
                        $qualification_data[]=[
                            'applicant_id'=>$request->applicant_id,
                            'exam_name'=>$request->exam_name[$key],
                            'borad'=>$request->borad[$key],
                            'reg_no'=>$request->reg_no[$key],
                            'roll_no'=>$request->roll_no[$key],
                            'group'=>$request->group[$key],
                            'passing_year'=>$request->passing_year[$key],
                            'gpa'=>$request->gpa[$key],
                        ];
                    }
                    applicant_student_educational_q::insert($qualification_data);
                }

                if(!empty($request->post_office) or !empty($request->home_district) or !empty($request->division) or !empty($request->village_name))
                {
                    $applicant_student_child_model=new applicant_student_child_model;
                    $applicant_student_child_model->fill($request->all())->save();
                }

                if(!empty($request->hem_member_no) or !empty($request->hem_group) or !empty($request->hem_village) or !empty($request->hem_section) or !empty($request->hem_zilla))
                {
                    $hem_info=new applicant_student_hem_info_model;
                    $hem_info->fill($request->all())->save();
                }
                
                if(!empty($request->inspection_no) or !empty($request->reference))
                {
                    $office_copy_data=[
                        'applicant_id'=>$request->applicant_id,
                        'inspection_no'=>$request->inspection_no,
                        'reference'=>$request->reference
                    ];
                    applicant_student_office_copy_model::insert($office_copy_data);
                }

                DB::commit();


                session()->flash('success', "Applicant Information Added Operation Are Succesfully Completed : Thank You ! ");
                return back()->with('success','Applicant Information Added Operation Are Succesfully Completed : Thank You ! ');
            }
        }




    }
    */
    public function store(Request $request)
    {



        $requested_data = $request->all();





        $requested_data['relation'] = 'Guardian';
        //$requested_data['class'] = 'First Semester';
        $requested_data['admission_test'] = 'Admission Test';
        //$requested_data['section'] = 'Please Frist Fill Class';
        $requested_data['Applicant'] = 'Please Frist Fill Class';
        $requested_data['batch'] = '0';
        //$requested_data['medium'] = 'TISI';
        $requested_data['applicant_id'] = time();

        $aplicant_student=new aplicant_student_model;
        $aplicant_student->fill($request->all())->save();



        //1st table
//        $data = new aplicant_student_model;
        /*$requested_data['medium'] = '';
        $requested_data['department'] = '';
        $requested_data['class'] = '';
        $requested_data['section'] = '';
        $requested_data['shift'] = '';*/
//        $data->fill($requested_data)->save();
//        $data->fill($request->all())->save();
        //1st table

//batch apply program insert
        if(!empty($request->medium)){
            $choose_program = [];
            foreach ($request->medium as $key => $value) {
//                $choose_program[$key]['applicant_id'] = $requested_data['applicant_id'];
                $choose_program[$key]['applicant_id'] = $aplicant_student->applicant_id;
                $choose_program[$key]['medium'] = $value;
                $choose_program[$key]['department'] = $request->department[$key];
                $choose_program[$key]['class'] = $request->class[$key];
                $choose_program[$key]['section'] = $request->section[$key];
                $choose_program[$key]['shift'] = $request->shift[$key];
            }
            applicant_faculty_choose_model::insert($choose_program);

        }
        //batch apply program insert





        //2nd table
        if (!empty($requested_data['post_office']) or !empty($requested_data['home_district']) or !empty($requested_data['division']) or !empty($requested_data['village_name'])) {
            $applicant_student_child_model = new applicant_student_child_model;
//            $applicant_student_child_model['parent'] = $requested_data['applicant_id'];
            $applicant_student_child_model['parent'] = $aplicant_student->applicant_id;
            $applicant_student_child_model->fill($request->all())->save();
        }
        //2nd table



        //3rd table
        if (!empty($requested_data['reference_name']) or !empty($requested_data['reference_designation'])) {
            $applicant_student_reference_model = new reference_model();
//            $applicant_student_reference_model['applicant_id'] = $requested_data['applicant_id'];
            $applicant_student_reference_model['applicant_id'] = $aplicant_student->applicant_id;
            $applicant_student_reference_model->fill($request->all())->save();
        }
        //3rd table



        //educationa qualification
        if (count($request->exam_name) > 0) {
            foreach ($request->exam_name as $key => $exam_value) {
                $qualification_data[] = [
//                    'applicant_id' => $requested_data['applicant_id'],
                    'applicant_id' => $aplicant_student->applicant_id,
                    'exam_name' => $request->exam_name[$key],
                    'borad' => $request->borad[$key],
                    'reg_no' => $request->reg_no[$key],
                    'roll_no' => $request->roll_no[$key],
                    'group' => $request->group[$key],
                    'passing_year' => $request->passing_year[$key],
                    'gpa' => $request->gpa[$key],
                ];


                if (@$request->marksheet[$key]) {
                    $file_path = "img/backend/aplicant_student/marksheet/";
                    $fil_name = $requested_data['applicant_id'].'_'.$request->exam_name[$key].".jpg";

                    $request->marksheet[$key]->move($file_path, $fil_name);
                }

            }
            applicant_student_educational_q::insert($qualification_data);
        }
        //educationa qualification

//        dd($requested_data);
        //photo
        if($request->attached_photo){
            $file_path = "img/backend/aplicant_student/";
//            $fil_name = $requested_data['applicant_id'].".jpg";
            $fil_name = $aplicant_student->applicant_id.".jpg";
            $request->file('attached_photo')->move($file_path, $fil_name);

        }
        //photo

        //Attachments
        if($request->attached_signature){
            $file_path = "img/backend/aplicant_student/signature/";
//            $fil_name = $requested_data['applicant_id'].".jpg";
            $fil_name = $aplicant_student->applicant_id.".jpg";
            $request->file('attached_signature')->move($file_path, $fil_name);
        }
        //Attachments

        //4th table
        if (!empty($request->inspection_no) or !empty($request->reference)) {
            $office_copy_data = [
//                'applicant_id' => $requested_data['applicant_id'],
                'applicant_id' => $aplicant_student->applicant_id,
                'inspection_no' => $requested_data['inspection_no'],
                'reference' => $requested_data['reference']
            ];
            applicant_student_office_copy_model::insert($office_copy_data);
        }
        //4th table
        Session::flash('success', "Admission successfully");
        return Redirect::back();
        exit();
        $validate = Validator::make($requested_data, $data->website_validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {

            // validation rules goes here
            Session::flash('success', "Admission successfully");
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
        $session=ov_setup_model::where('type','Session')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $medium=ov_setup_model::where('type','Medium')->get();
        $batch=general_settings_model::first();
        $nationality_data=nationality_model::get();
        $maritial_data=maritial_model::get();
        $blood_group_data=blood_group_model::get();

//        New Edition
        $batch_data=ov_setup_model::where('type','Batch')->get();
        $semester_data=semester_model::get();
        $year_data=year_model::get();

        $divisions_data=divisions_model::get();
        $districts_data=districts_model::get();
        $upazilas_data=upazilas_model::get();
        $unions_data=unions_model::get();

        $degree_name_data = degree_name_model::get();
        $session_choose_data = session_choose_model::get();
        $religion_data = religion_model::get();
        $quota_data = quota_model::get();
        $profession_data = profession_model::get();
        $dependent_relation_data = dependent_relation_model::get();
        $exam_name_data = exam_name_model::get();
        $board_name_data = board_name_model::get();
        $group_name_data = group_name_model::get();
        $section_data = manage_section_model::get();
//        New Edition



        $educational_qualifincations=applicant_student_educational_q::where('applicant_id',$id)->get();
        $applicant_reference=reference_model::where('applicant_id',$id)->get();
        $applicant_apply_choose=applicant_faculty_choose_model::where('applicant_id',$id)->get();
        $hem_section_info=applicant_student_hem_info_model::where('applicant_id',$id)->first();
        $office_copy_data=applicant_student_office_copy_model::where('applicant_id',$id)->first();

        return view('admin.students.applicant_student_edit',['applicant_student'=>aplicant_student_model::where('applicant_id',$id)->first(),'aplicant_student_child'=>applicant_student_child_model::where('parent',$id)->first(),'exam_lsit'=>exam_list_model::all(),'parents_data'=>parents_info_model::all(),'manage_class'=>manage_class_model::all(),"department_data"=>manage_department_model::all(),'batch'=>$batch,'session'=>$session,'shift'=>$shift,'medium'=>$medium,'educational_qualifincations'=>$educational_qualifincations,'applicant_reference'=>$applicant_reference,'applicant_apply_choose'=>$applicant_apply_choose,'hem_section_info'=>$hem_section_info,'office_copy_data'=>$office_copy_data,'nationality_data'=>$nationality_data,'maritial_data'=>$maritial_data,'blood_group_data'=>$blood_group_data,'semester_data'=>$semester_data,'year_data'=>$year_data,'divisions_data'=>$divisions_data,'districts_data'=>$districts_data,'upazilas_data'=>$upazilas_data,'unions_data'=>$unions_data,'religion_data'=>$religion_data,'degree_name_data'=>$degree_name_data,'session_choose_data'=>$session_choose_data,'quota_data'=>$quota_data,'profession_data'=>$profession_data,'dependent_relation_data'=>$dependent_relation_data,'exam_name_data'=>$exam_name_data,'board_name_data'=>$board_name_data,'group_name_data'=>$group_name_data,'section_data'=>$section_data,'batch_data'=>$batch_data]);

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
        
        $aplicant_student=new aplicant_student_model;
        $validation=Validator::make($request->all(),$aplicant_student->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
            DB::beginTransaction();
            if($request->hasfile('image')):
                $this->image_upload($request,$id);
            endif;

            if(count($request->exam_name)>0)
            {
                applicant_student_educational_q::where('applicant_id',$id)->delete();
                foreach ($request->exam_name as $key => $exam_value)
                {
                    $qualification_data[]=[
                        'applicant_id'=>$request->applicant_id,
                        'exam_name'=>$request->exam_name[$key],
                        'borad'=>$request->borad[$key],
                        'reg_no'=>$request->reg_no[$key],
                        'roll_no'=>$request->roll_no[$key],
                        'group'=>$request->group[$key],
                        'passing_year'=>$request->passing_year[$key],
                        'gpa'=>$request->gpa[$key],
                    ];
                }
                applicant_student_educational_q::insert($qualification_data);
            }

            $data=array_except($request->all(),['_method','_token','post_office','home_district','division','village_name']);

           aplicant_student_model::where('applicant_id',$id)->first()->fill($data)->save();
           applicant_student_child_model::where('parent',$id)->first()->fill($request->all())->save();
           if($request->is_family_member_of_hem_section=="yes")
           {
                $prev_hem_data=applicant_student_hem_info_model::where('applicant_id',$id)->first();
                if($prev_hem_data)
                {
                    $prev_hem_data->fill($request->all())->save();
                }
                else
                {
                    if(!empty($request->hem_member_no) or !empty($request->hem_group) or !empty($request->hem_village) or !empty($request->hem_section) or !empty($request->hem_zilla))
                    {
                        $new_hem_info=new applicant_student_hem_info_model;
                        $new_hem_info->fill($request->all())->save();
                    }
                    
                }
           }
           if($request->is_family_member_of_hem_section=="no")
           {
                $prev_hem_data=applicant_student_hem_info_model::where('applicant_id',$id)->first();
                if($prev_hem_data)
                {
                    $prev_hem_data->delete();
                }
           }

            if(!empty($request->inspection_no) or !empty($request->reference))
            {
                $prev_data=applicant_student_office_copy_model::where('applicant_id',$id)->first();
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
                        'applicant_id'=>$id,
                        'inspection_no'=>$request->inspection_no,
                        'reference'=>$request->reference
                    ];
                    applicant_student_office_copy_model::insert($office_copy_data);
                }
            }
            DB::commit();
            session()->flash('success', "$request->student_name Information Succesfully Updated");
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
       aplicant_student_model::where('applicant_id',$id)->delete();
       applicant_student_child_model::where('parent',$id)->delete();
       applicant_student_educational_q::where('applicant_id',$id)->delete();
       applicant_student_office_copy_model::where('applicant_id',$id)->delete();

        $my_file="img/backend/aplicant_student/$id".".jpg";

        if (File::exists($my_file))
        {
           File::Delete($my_file);
        }

    }

    public function image_upload(Request $request,$applicant_id)
    {
        $file_path="img/backend/aplicant_student";
        $fil_name=$applicant_id.'.jpg';
        $request->file('image')->move($file_path,$fil_name);
    }
    public function remove_ex_edu_data(Request $request)
    {
       $deleted=applicant_student_educational_q::where('eqalification_id',$request->eqalification_id)->delete();
       return $deleted ? '200' : '403';
    }


}
