<?php

namespace App\Http\Controllers;

use App\blood_group_model;
use App\board_name_model;
use App\degree_name_model;
use App\dependent_relation_model;
use App\districts_model;
use App\divisions_model;
use App\exam_name_model;
use App\group_name_model;
use App\income_model;
use App\maritial_model;
use App\nationality_model;
use App\profession_model;
use App\quota_model;
use App\religion_model;
use App\semester_model;
use App\session_choose_model;
use App\student_reference_model;
use App\unions_model;
use App\upazilas_model;
use App\year_model;
use Illuminate\Http\Request;
use App\students_child;
use App\students;
use App\parents_info_model;
use App\manage_class_model;
use Redirect;
use Session;
use App\manage_section_model;
use App\teacher_model;
use Validator;
use Hash;
use App\ov_setup_model;
use App\general_settings_model;
use App\make_autoname;
use App\student_educational_qualification_model;
use App\student_hem_info_model;
use DB;
use App\manage_department_model;
use App\student_office_copy_model;

class admit_student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $session = ov_setup_model::where('type', 'Session')->get();
        $shift = ov_setup_model::where('type', 'Shift')->get();
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $batch_data = ov_setup_model::where('type', 'Batch')->get();
        $batch = general_settings_model::first();
        $obj = new make_autoname;
        $name = $obj->autoname();
        $nationality_data=nationality_model::get();
        $maritial_data=maritial_model::get();
        $blood_group_data=blood_group_model::get();
        $year_data=year_model::get();

        $manage_class = manage_class_model::all();
        $divisions_data = divisions_model::get();
        $districts_data = districts_model::get();
        $upazilas_data = upazilas_model::get();
        $unions_data = unions_model::get();
        $exam_name_data = exam_name_model::get();
        $board_name_data = board_name_model::get();
        $group_name_data = group_name_model::get();
        $degree_name_data = degree_name_model::get();
        $session_choose_data = session_choose_model::get();
        $religion_data = religion_model::get();
        $quota_data = quota_model::get();
        $semester_data = semester_model::get();
        $profession_data = profession_model::get();
        $dependent_relation_data = dependent_relation_model::get();
        
        return view('admin.students.admit_student', ['parents_data' => parents_info_model::select('name', 'parent_id')->get(), 
        'class_data' => manage_class_model::select('class_name', 'id')->get(),
        'manage_section' => Manage_section_model::select('section_name')->get(),
        'batch_data' => $batch_data, 
        'session' => $session,
        'shift' => $shift, 
        'autoname' => $name, 
        'medium' => $medium, 
        'teacher_data' => teacher_model::where('status', 'Teacher')->get(), 
        'batch' => $batch,
        'nationality_data'=>$nationality_data,
        'maritial_data'=>$maritial_data,
        'blood_group_data'=>$blood_group_data,
        'semester_data'=>$semester_data,
        'year_data'=>$year_data,
        'manage_class'=>$manage_class,
        'divisions_data'=>$divisions_data,
        'districts_data'=>$districts_data,
        'upazilas_data'=>$upazilas_data,
        'unions_data'=>$unions_data,
        'exam_name_data'=>$exam_name_data,
        'board_name_data'=>$board_name_data,
        'group_name_data'=>$group_name_data,
        'degree_name_data'=>$degree_name_data,
        'session_choose_data'=>$session_choose_data,
        'religion_data'=>$religion_data,
        'quota_data'=>$quota_data,
        'profession_data'=>$profession_data,
        'dependent_relation_data'=>$dependent_relation_data]);
    }
    
    public function roll_number_generate(Request $request)
    {
        $department_code = manage_department_model::where('class_name', $request->class_name)
            ->where('department_name', $request->department_name)
            ->first();
        $last_roll = students::where('class', $request->class_name)->where('department', $request->department_name)
            ->where('session', $request->session)
            ->orderBy('id', 'DESC')
            ->pluck('roll')
            ->toArray();
        $session_explode = explode('-', $request->session)[0];
        $requested_session = substr($session_explode, 2);
        $latest_roll = '';
        if ($last_roll) {
            $latest_roll = $last_roll[0] + 1;
        } else {
            $latest_roll = $department_code->department_code . $requested_session . '101';
        }
        return (int)$latest_roll;
        
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $make_autoname = new make_autoname;
        $students_obj = new students;
        $validation = Validator::make($request->all(), $students_obj->roles_rule());
        
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            


            DB::beginTransaction();
            $check_validaity = students::where('reg_number', $request->reg_number)
            ->orWhere('email', $request->email)
            ->first();

            if (!$check_validaity):
                $Data = $request->all();
                //$Data=array_set($Data,'roll',$make_autoname->autoname());
                $Data = array_add($Data, 'status', 'Active');
                if (empty($request->email)):
                    echo "here";
                    $Data = array_set($Data, 'email', $request->roll);
                endif;
                if ($request->password):
                    $Data = array_set($Data, 'password', Hash::make($request->password));
                else:
                    $Data = array_set($Data, 'password', Hash::make($make_autoname->autoname()));
                endif;
                $students_obj->fill($Data)->save();
                
                
                if (count($request->exam_name) > 0) {
                    foreach ($request->exam_name as $key => $exam_value) {
                        $qualification_data[] = [
                            'student_roll' => 0,
                            'exam_name' => $request->exam_name[$key],
                            'borad' => $request->borad[$key],
                            'reg_no' => $request->reg_no[$key],
                            'roll_no' => $request->roll_no[$key],
                            'group' => $request->group[$key],
                            'passing_year' => $request->passing_year[$key],
                            'gpa' => $request->gpa[$key],
                        ];
                    }
                    student_educational_qualification_model::insert($qualification_data);
                }
                
                
                if (!empty($request->post_office)):
                    $students_child_obj = new students_child;
                    $students_child_data = $request->all();
                    $students_child_data = array_add($students_child_data, 'roll', $students_obj->roll);
                    $students_child_obj->fill($students_child_data)->save();
                endif;

                // if (!empty($request->reference_name)):
                //     $student_reference_obj = new student_reference_model();
                //     $student_reference_data = $request->all();
                //     $student_reference_data = array_add($students_child_data, 'roll', $students_obj->roll);
                //     $student_reference_obj->fill($students_child_data)->save();
                // endif;

                if (!empty($request->credit_fee)):
                    $students_child_obj = new income_model();
                    $students_child_data = $request->all();
                    $students_child_data = array_add($students_child_data, 'roll', $students_obj->roll);
                    $students_child_obj->fill($students_child_data)->save();
                endif;
                
                if (!empty($request->hem_member_no) or !empty($request->hem_group) or !empty($request->hem_village) or !empty($request->hem_section) or !empty($request->hem_zilla)) {
                    $hem_info = new student_hem_info_model;
                    $hem_data = $request->all();
                    $hem_data = array_add($hem_data, 'student_roll', $students_obj->roll);
                    $hem_info->fill($hem_data)->save();
                }
                
                if (!empty($request->inspection_no) or !empty($request->reference)) {
                    $office_copy_data = [
                        'student_roll' => $students_obj->roll,
                        'inspection_no' => $request->inspection_no,
                        'reference' => $request->reference
                    ];
                    student_office_copy_model::insert($office_copy_data);
                }
                DB::commit();
                
                if ($request->hasfile('student_image')):
                    $file_path = "img/backend/student";
                    $file_name = $request->roll . ".jpg";
                    $request->file('student_image')->move($file_path, $file_name);
                
                endif;
                Session::flash('success', "New Student Information Are Successfully Added");
                return Redirect::back();
            else:
                Session::flash('wrong', "Sorry Dupliacte Regestration Number Or Email Are Not Allowed");
                return Redirect::back();
            endif;
        }
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $educational_qualifincations = student_educational_qualification_model::where('student_roll', $id)->get();
        $hem_section_info = student_hem_info_model::where('student_roll', $id)->first();
        $office_copy_data = student_office_copy_model::where('student_roll', $id)->first();
        
        return view('admin.students.Edit.admit_student_edit', ['parents_data' => parents_info_model::select('name', 'parent_id')->get(), 'class_data' => manage_class_model::select('class_name', 'id')->get(), 'manage_section' => Manage_section_model::select('section_name')->get(), 'students_data' => students::where('roll', $id)->first(), 'teacher_data' => teacher_model::where('status', 'Teacher')->get(), 'educational_qualifincations' => $educational_qualifincations, 'hem_section_info' => $hem_section_info, 'office_copy_data' => $office_copy_data, 'nationality_data' => nationality_model::select('nationality', 'id')->get()]);
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
