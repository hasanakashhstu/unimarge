<?php

namespace App\Http\Controllers;

use App\applicant_faculty_choose_model;
use App\applicant_student_child_model;
use App\applicant_student_educational_q;
use App\applicant_student_hem_info_model;
use App\applicant_student_office_copy_model;
use App\blood_group_model;
use App\board_name_model;
use App\degree_name_model;
use App\dependent_relation_model;
use App\districts_model;
use App\divisions_model;
use App\exam_name_model;
use App\group_name_model;
use App\manage_class_model;
use App\maritial_model;
use App\nationality_model;
use App\parents_info_model;
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
use App\notice_board_model;
use App\class_routine_model;
use App\teacher_model;
use App\manage_subject_model;
use App\manage_section_model;
use App\WebsiteContactModel;
use App\ov_setup_model;
use App\academic_syllebus_model;
use App\general_settings_model;
use App\WebsiteEventModel;
use App\manage_department_model;
use App\WebsiteSetupModel;
use App\WebsiteManagementModel;
use App\WebsiteFacultiesModel;
use App\aplicant_student_model;
use App\WebsiteCourseModel;
use App\WebsiteFeesStuctureModel;
use App\question_paper_model;
use App\exam_list_model;
use App\students;
use App\LiveClass;
use Validator;
use Redirect;
use Session;
use File;
use Mail;
use DB;
use App\Mail\WebsiteContactMail;

class WebsiteController extends Controller
{
    public function Home()
    {
        $date = \Carbon\Carbon::today()->subDays(60);
        $data['notice'] = notice_board_model::where('created_at', '>=', $date)->orderBy('created_at', 'DESC')->get();
        $data['about_us'] = WebsiteSetupModel::first();
        $data['course'] = WebsiteCourseModel::limit(3)->get();
        $data['event'] = WebsiteEventModel::whereIn('type', ['1', '2'])->get();

        return view('website.home', $data);
    }

    public function Notice()
    {
        $data['notice'] = notice_board_model::paginate(15);
        return view('website.notice', $data);
    }

    public function SingleNotice($id)
    {
        $data['notice'] = notice_board_model::findOrFail($id);
        return view('website.single_notice', $data);
    }

    public function WebsiteSetup()
    {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.backend.website_setup', $data);
    }

    public function WebsiteSetupUpdate(Request $request)
    {
        $data = WebsiteSetupModel::findOrFail($request->website_setup_id);
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            if ($request->hasfile('citizen_charter')) {
                if (File::exists($data->citizen_charter)) {
                    File::delete($data->citizen_charter);
                }
                $file_path = "img/";
                $file_name = time() . ".pdf";
                $request->file('citizen_charter')->move($file_path, $file_name);

                $requested_data['citizen_charter'] = $file_path . $file_name;
            }

            $data->fill($requested_data)->save();

            Session::flash('success', 'Settings Updated');
            return back()->with('success', 'Settings Updated');
        }
    }

    public function OurManagement()
    {
        $data['our_management'] = WebsiteManagementModel::all();
        return view('website.backend.management', $data);
    }

    public function OurManagementAdd(Request $request)
    {
        $data = new WebsiteManagementModel;
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            $requested_data = $request->all();

            if ($request->hasfile('image')) {
                $file_path = "img/";
                $file_name = time() . ".jpg";
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path . $file_name;
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
            return Redirect::back();
        }
    }

    public function OurManagementDelete($id)
    {
        $data = WebsiteManagementModel::findOrFail($id);
        if (File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }

    public function OurManagementEdit($id)
    {
        $data['our_management'] = WebsiteManagementModel::findOrFail($id);
        return view('website.backend.management_edit', $data);
    }

    public function OurManagementUpdate(Request $request, $id)
    {
        $data = WebsiteManagementModel::findOrFail($id);
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            $requested_data = $request->all();

            if ($request->hasfile('image')) {
                if (File::exists($data->image)) {
                    File::delete($data->image);
                }
                $file_path = "img/";
                $file_name = time() . ".jpg";
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path . $file_name;
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
            return Redirect::back();
        }
    }

    public function AboutUs()
    {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.about_us', $data);
    }

    public function History()
    {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.history', $data);
    }

    public function MissionVision()
    {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.mission_vision', $data);
    }

    public function PrincipleMessage()
    {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.principle_message', $data);
    }

    public function StudentInfo($id, $slug)
    {
        $slug_semester = explode("-", $slug);
        $semester = ucwords(implode(" ", $slug_semester));
        $dept_data = manage_department_model::where('department_code', $id)->first();

        $data['department'] = $dept_data->department_name;

        $data['student_info'] = students::where('department', $data['department'])->where('class', $semester)->paginate(15);
        return view('website.student_info', $data);
    }

    public function ClassRoutine($id, $slug)
    {
        $slug_semester = explode("-", $slug);
        $semester = ucwords(implode(" ", $slug_semester));
        $dept_data = manage_department_model::where('department_code', $id)->first();
        $data['department'] = $dept_data->department_name;

        $medium = ov_setup_model::where('type', 'Medium')->get();
        $section = class_routine_model::where('class_name', $semester)->groupby('section')->get();
        $department = class_routine_model::where('class_name', $semester)->where('department', $data['department'])->groupby('department')->get();
        $medium_grp = class_routine_model::where('class_name', $semester)->groupby('medium')->get();

        $teacher_details = teacher_model::where('status', 'Teacher')->get();
        $subject_info_class_wise = manage_subject_model::where('class', $semester)->get();
        $section_class_wise = manage_section_model::where('class', $semester)->get();

        return view('website.class_routine', ['class_name' => $semester, 'section' => $section, 'subject_info_class_wise' => $subject_info_class_wise, 'section_info_class_wise' => $section_class_wise, 'teacher_detials' => $teacher_details, 'medium' => $medium, 'medium_grp' => $medium_grp, 'department' => $department, 'department_name' => $data['department'], 'semester' => $semester]);
    }

    public function CourseMaterial($id, $slug)
    {
        $slug_semester = explode("-", $slug);
        $data['semester'] = ucwords(implode(" ", $slug_semester));
        $dept_data = manage_department_model::where('department_code', $id)->first();
        $data['department'] = $dept_data->department_name;

        $data['syllebus'] = academic_syllebus_model::where('class_name', $data['semester'])->where('department', $data['department'])->first();

        $data['question'] = question_paper_model::where('class_name', $data['semester'])->where('department', $data['department'])->first();

        $data['website_setup'] = WebsiteSetupModel::first();

        return view('website.course_material', $data);
    }

    public function liveClass()
    {
        $data['live_classes'] = LiveClass::orderBy('start_time', 'desc')->get();

        return view('website.liveClass', $data);
    }

    public function CitizenCharter()
    {
        $data['citizen_charter'] = WebsiteSetupModel::first();
        return view('website.citizen_charter', $data);
    }

    public function Contact()
    {
        $data['contact'] = WebsiteContactModel::all();
        return view('website.contact', $data);
    }

    public function FacultiesMsgFromHead($id)
    {
        $data['faculties'] = WebsiteFacultiesModel::where('website_faculties_name', $id)
            ->join('teacher', 'teacher.teacher_id', '=', 'website_faculties.department_head')
            ->first();
        return view('website.faculties_msg_from_head', $data);
    }

    public function FacultiesAboutDept($id)
    {
        $data['department'] = manage_department_model::where('department_name', $id)->first();
        return view('website.faculties_about_department', $data);
    }

    public function FacultiesTeacherInfo($id)
    {
        // $sub_wise_teacher = manage_subject_model::where('department',$id)->get()->toArray();
        // $teacher_name = collect($sub_wise_teacher)->unique('teacher')->pluck('teacher');
        // $data['teacher_info'] = teacher_model::whereIn('teacher_name',$teacher_name)->get();
        $data['teacher_info'] = teacher_model::where('job_type', $id)->orderBy('sort_index', 'ASC')->paginate(15);

        $data['department'] = $id;

        return view('website.faculties_teacher_info', $data);
    }

    public function FacultiesNonTechInstructor()
    {
        $data['teacher_info'] = teacher_model::where('type', 'Non-Tech')->orderBy('sort_index', 'ASC')->paginate(15);

        return view('website.faculties_non_tech_instructor', $data);
    }

    public function FacultiesStaffInfo($id)
    {
        $data['staff_info'] = teacher_model::where('status', 'staff')->paginate(15);
        $data['department'] = $id;

        return view('website.faculties_staff_info', $data);
    }

    public function FacultiesLabInfo($id)
    {
        $data['faculties'] = WebsiteFacultiesModel::where('website_faculties_name', $id)
            ->join('teacher', 'teacher.teacher_id', '=', 'website_faculties.department_head')
            ->first();
        return view('website.faculties_lab_info', $data);
    }

    public function OnlineAdmission()
    {
        $dept = manage_department_model::all();
        $data['department'] = collect($dept)->unique('department_code');
        $data['session'] = ov_setup_model::where('type', 'Session')->get();
        $data['shift'] = ov_setup_model::where('type', 'Shift')->get();

        $data['exam_lsit'] = exam_list_model::all();
        $data['parents_data'] = parents_info_model::all();
        $data['manage_class'] = manage_class_model::all();
        $data['department'] = manage_department_model::all();
        $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
        $data['batch'] = general_settings_model::first();
        $data['batch_data'] = ov_setup_model::where('type', 'Batch')->get();
        $data['nationality_data'] = nationality_model::get();
        $data['department_data'] = manage_department_model::get();
        $data['section_data'] = manage_section_model::get();
        $data['maritial_data'] = maritial_model::get();
        $data['blood_group_data'] = blood_group_model::get();
        $data['semester_data'] = semester_model::get();
        $data['year_data'] = year_model::get();


        $data['divisions_data'] = divisions_model::get();
        $data['districts_data'] = districts_model::get();
        $data['upazilas_data'] = upazilas_model::get();
        $data['unions_data'] = unions_model::get();
        $data['exam_name_data'] = exam_name_model::get();
        $data['board_name_data'] = board_name_model::get();
        $data['group_name_data'] = group_name_model::get();
        $data['degree_name_data'] = degree_name_model::get();
        $data['session_choose_data'] = session_choose_model::get();
        $data['religion_data'] = religion_model::get();
        $data['quota_data'] = quota_model::get();
        $data['semester_data'] = semester_model::get();
        $data['profession_data'] = profession_model::get();
        $data['dependent_relation_data'] = dependent_relation_model::get();


        return view('website.online_admission', $data);
    }


    public function AddOnlineAdmission(Request $request)
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
        

       

        //1st table 
        $data = new aplicant_student_model;
        $requested_data['medium'] = '';
        $requested_data['department'] = '';
        $requested_data['class'] = '';
        $requested_data['section'] = '';
        $requested_data['shift'] = '';
        $data->fill($requested_data)->save();
        //1st table 

        //2nd table
        if (!empty($requested_data['post_office']) or !empty($requested_data['home_district']) or !empty($requested_data['division']) or !empty($requested_data['village_name'])) {
            $applicant_student_child_model = new applicant_student_child_model;
            $applicant_student_child_model['parent'] = $requested_data['applicant_id'];          
            $applicant_student_child_model->fill($request->all())->save();
        }
        //2nd table

        //3rd table
        if (!empty($requested_data['reference_name']) or !empty($requested_data['reference_designation'])) {
            $applicant_student_reference_model = new reference_model();
            $applicant_student_reference_model['applicant_id'] = $requested_data['applicant_id'];
            $applicant_student_reference_model->fill($request->all())->save();
        }
        //3rd table

        //betch apply program insert
        if(!empty($request->medium)){
            $choose_program = [];
            foreach ($request->medium as $key => $value) {
                $choose_program[$key]['applicant_id'] = $requested_data['applicant_id'];
                $choose_program[$key]['medium'] = $value;
                $choose_program[$key]['department'] = $request->department[$key];
                $choose_program[$key]['class'] = $request->class[$key];
                $choose_program[$key]['section'] = $request->section[$key];
                $choose_program[$key]['shift'] = $request->shift[$key];
            }
            applicant_faculty_choose_model::insert($choose_program);  

        }
        //betch apply program insert

        //educationa qualification
        if (count($request->exam_name) > 0) {
            foreach ($request->exam_name as $key => $exam_value) {
                $qualification_data[] = [
                    'applicant_id' => $requested_data['applicant_id'],
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

        //photo
        if($request->attached_photo){
            $file_path = "img/backend/aplicant_student/";
            $fil_name = $requested_data['applicant_id'].".jpg";
            $request->file('attached_photo')->move($file_path, $fil_name);

        }
        //photo    

        //Attachments 
        if($request->attached_signature){
            $file_path = "img/backend/aplicant_student/signature/";
            $fil_name = $requested_data['applicant_id'].".jpg";
            $request->file('attached_signature')->move($file_path, $fil_name);   
        }
        //Attachments

        //4th table
        if (!empty($request->inspection_no) or !empty($request->reference)) {
            $office_copy_data = [
                'applicant_id' => $requested_data['applicant_id'],
                'inspection_no' => $requested_data['inspection_no'],
                'reference' => $requested_data['reference']
            ];
            applicant_student_office_copy_model::insert($office_copy_data);
        }
        //4th table
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


    public function AddOnlineAdmission12(Request $request)
    {
        $requested_data = $request->all();
        $requested_data['relation'] = 'Guardian';
        $requested_data['class'] = 'First Semester';
//        $requested_data['admission_test'] = 'Admission Test';
//        $requested_data['section'] = 'Please Frist Fill Class';
        $requested_data['Applicant'] = 'Please Frist Fill Class';
        $requested_data['batch'] = '0';
//        $requested_data['medium'] = 'TISI';
        $requested_data['applicant_id'] = time();
//        $requested_data['is_family_member_of_hem_section'] = 'no';

        $data = new aplicant_student_model;
        $validate = Validator::make($requested_data, $data->website_validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            $data->fill($requested_data)->save();
            Session::flash('success', "Admission successfully");
            return Redirect::back();
        }
    }


    public function Gallery()
    {
        $data['event'] = WebsiteEventModel::whereIn('type', ['1', '3'])->get();
        return view('website.gallery', $data);
    }

    public function Course($id)
    {
        $data['course'] = WebsiteCourseModel::where('course_category_id', $id)->get();
        return view('website.course', $data);
    }

    public function CourseSingle($id)
    {
        $data['course'] = WebsiteCourseModel::findOrFail($id);
        return view('website.single_course', $data);
    }

    public function FeesStructure($id)
    {
        $data['fees_structure'] = WebsiteFeesStuctureModel::where('department', $id)->first();
        return view('website.fees_structure', $data);
    }

    public function MailSent(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $data = $request->all();

            Mail::to($request->email)->send(new WebsiteContactMail($request->all()));

            // Mail::send('website.mail', $data, function($message) use ($data) {
            //   $message->from('hasanali689009@gmail.com');
            //   $message->to('mahadih727@gmail.com');
            //   $message->subject($data['name']);
            // });

            Session::flash('success', "Message Sent Successfully");
            return Redirect::back();
        }
    }

    public function Result()
    {
        $data['exam'] = exam_list_model::where('publish', 'Yes')->get();
        return view('website.result_index', $data);
    }
    public function district_filter($id)
    {
        return districts_model::where('division_id',$id)->get();
    }
    public function upozila_filter($id)
    {
        return upazilas_model::where('district_id',$id)->get();
    }

    public function unions_filter($id)
    {
        return unions_model::where('upazilla_id',$id)->get();
    }

    public function faculty_department($id)
    {
        return manage_department_model::where('medium',$id)->get();
    }

    public function class_section($id)
    {
        return manage_section_model::where('class',$id)->get();
    }

    public function department_program($id)
    {
        return manage_class_model::where('class_department',$id)->get();
    }

    public function district_filter1($id)
    {
        return districts_model::where('division_id',$id)->get();
    }
    public function upozila_filter1($id)
    {
        return upazilas_model::where('district_id',$id)->get();
    }



}
