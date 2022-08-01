<?php

namespace App\Http\Controllers;
use App\Mail\AplicantStudentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\academic_syllebus_model;
use App\aplicant_student_model;
use App\applicant_faculty_choose_model;
use App\applicant_student_child_model;
use App\applicant_student_educational_q;
use App\applicant_student_office_copy_model;
use App\blood_group_model;
use App\board_name_model;
use App\botModel;
use App\class_routine_model;
use App\degree_name_model;
use App\dependent_relation_model;
use App\Dept_SetupModel;
use App\districts_model;
use App\divisions_model;
use App\exam_list_model;
use App\exam_name_model;
use App\former_head_model;
use App\general_settings_model;
use App\group_name_model;
use App\LiveClass;
use App\Mail\WebsiteContactMail;
use App\manage_class_model;
use App\manage_department_model;
use App\manage_section_model;
use App\manage_subject_model;
use App\maritial_model;
use App\nationality_model;
use App\notice_board_model;
use App\ov_setup_model;
use App\parents_info_model;
use App\profession_model;
use App\question_paper_model;
use App\quota_model;
use App\reference_model;
use App\religion_model;
use App\semester_model;
use App\session_choose_model;
use App\students;
use App\teacher_model;
use App\unions_model;
use App\upazilas_model;
use App\WebsiteContactModel;
use App\WebsiteCourseModel;
use App\WebsiteEventModel;
use App\WebsiteEventsModel;
use App\WebsiteFacultiesModel;
use App\WebsiteFeesStuctureModel;
use App\WebsiteManagementModel;
use App\WebsiteNewsModel1;
use App\WebsiteNewsModel;
use App\WebsiteSetupModel;
use App\WebsiteSliderModel;
use App\program_type_model;
use App\year_model;
use App\AdmissionSetupModel;
use File;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator;
// Alal-21-06(Start)
use App\manage_dormitory_model;

// Alal-21-06(End)

class WebsiteController extends Controller {

    public function Home() {
        $data['notice'] = notice_board_model::latest()->take(15)->get();
        $data['about_us'] = WebsiteSetupModel::first();
        $data['course'] = WebsiteCourseModel::limit(3)->get();
        $data['department'] = manage_department_model::all();
        $data['recentEvents'] = WebsiteEventsModel::where('start_date', '<', date('Y-m-d'))->latest('start_date')->take(10)->get();
        $data['upcommingEvents'] = WebsiteEventsModel::where('start_date', '>=', date('Y-m-d'))->latest('start_date')->take(10)->get();
        $data['website_setup'] = WebsiteSetupModel::first();
        $our_management = WebsiteManagementModel::all();
        $data['founder'] = collect($our_management)->where('designation', 'Founder')->toArray();
        $data['chairman'] = collect($our_management)->where('designation', 'Chairman')->toArray();
        $data['contact'] = general_settings_model::first();
        $data['slider'] = WebsiteSliderModel::all();
        $data['news'] = WebsiteNewsModel1::latest()->take(15)->get();

        return view('website.home', $data);
    }

    public function Notice() {
        $data['notice'] = notice_board_model::latest('notice_id')->paginate(15);
        return view('website.notice', $data);
    }

    public function SingleNotice($id) {
        $data['notice'] = notice_board_model::findOrFail($id);
        return view('website.single_notice', $data);
    }

    public function WebsiteSetup() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.backend.website_setup', $data);
    }

    public function AdmissionSetup() {
        $data['setups'] = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();

        $data['manage_department'] = manage_department_model::get();
        $data['session_choose_data'] = session_choose_model::get();
        $data['program_type'] = program_type_model::get();
        $data['status']['Active'] = "Active";
        $data['status']['Inactive'] = "Inactive";
        return view('website.backend.admission_setup', $data);
    }

    public function AdmissionSetupSave(Request $request) {

        $requested_data = request()->except(['_token']);
        $AdmissionSetupModel = new AdmissionSetupModel;
        $validation = Validator::make($requested_data, $AdmissionSetupModel->validation()); //5th validation
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }
        AdmissionSetupModel::insert($requested_data);
        Session::flash('success', "Admission Setup Successfully Added");
        return Redirect::back();
    }

    public function AdmissionSetupEdit($id) {

        $admission_setup = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->where('admission_setup.admission_setup_id', $id)
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();

        $data['status']['Active'] = "Active";
        $data['status']['Inactive'] = "Inactive";
        $data['admission_setup'] = $admission_setup[0];
        return view('website.backend.admission_setup_edit', $data);
    }

    public function AdmissionSetupUpdate(request $request, $id) {
        $data = AdmissionSetupModel::findOrFail($id);

        $requested_data = request()->except(['_token']);

        $save_data['application_deadline'] = $requested_data['application_deadline'];
        $save_data['date_of_admission_test'] = $requested_data['date_of_admission_test'];
        $save_data['status'] = $requested_data['status'];
        $AdmissionSetupModel = new AdmissionSetupModel;
        $validation = Validator::make($requested_data, $AdmissionSetupModel->validation()); // validation
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $data->fill($save_data)->save();
            Session::flash('success', "Admission Setup Successfully Updated");
            return Redirect::back();
        }
    }

    public function AdmissionSetupDelete($id) {
        AdmissionSetupModel::where('admission_setup_id', $id)->delete();
        Session::flash('success', "Admission Setup Successfully Deleted");
        return Redirect::back();
    }

    public function WebsiteSetupUpdate(Request $request) {
        $data = WebsiteSetupModel::findOrFail($request->website_setup_id);
        $requested_data = $request->all();
        //        dd($requested_data);
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

            //Teacher Image Upload
            if ($request->hasfile('image')) {
                $file_path = 'img/backend/overview/';
                $file_name = time() . '.jpg';
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path . $file_name;
            }
            //Teacher  Image Upload

            $data->fill($requested_data)->save();

            Session::flash('success', 'Settings Updated');
            return back()->with('success', 'Settings Updated');
        }
    }

    public function OurManagement() {
        $data['our_management'] = WebsiteManagementModel::all();
        return view('website.backend.management', $data);
    }

    public function OurManagementAdd(Request $request) {

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

    public function OurManagementDelete($id) {
        $data = WebsiteManagementModel::findOrFail($id);
        if (File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }

    public function OurManagementEdit($id) {
        $data['our_management'] = WebsiteManagementModel::findOrFail($id);
        return view('website.backend.management_edit', $data);
    }

    public function OurManagementUpdate(Request $request, $id) {
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

    public function AboutUs() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.about_us', $data);
    }

    public function bot() {

        $data['bot_chairman'] = botModel::first();
        // $data['bot'] = botModel::where('bot_id', '!=', 1)->get();
        // $data['bot']  = DB::table('bot')->orderBy('bot_id', 'desc')->take(3)->get();
        $data['bot'] = botModel::all();
        return view('website.bot', $data);
    }

    public function message_bot_chairman() {
        $data['bot_chairman'] = botModel::first();
        $data['website_setup'] = WebsiteSetupModel::first();
        //        dd($data['website_setup']);
        return view('website.message_bot_chairman', $data);
    }

    public function message_bot_vc() {
        //$data['teacher'] = teacher_model::join('teacher_address_child', 'teachers.teacher_id', '=', 'teacher_address_child.parent')->where('designation', 'principal')->first();
        $data['teacher'] = teacher_model::join('teacher_address_child', 'teachers.teacher_id', '=', 'teacher_address_child.parent')->where('designation', 'principal')->first();
        // echo '<pre>';
        // print_r($data);
        // die;
        $data['website_setup'] = WebsiteSetupModel::first();

        // echo '<pre>';
        // print_r($data);
        // die;
        return view('website.message_bot_vc', $data);
    }

    public function overview() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.overview', $data);
    }

    public function mission_vision() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.mission_vision_final', $data);
    }

    public function syndicate() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.syndicate', $data);
    }

    public function academic() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.academic', $data);
    }

    public function office_chairperson() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.department_view', $data);
    }

    public function test() {
        $data['website_setup'] = WebsiteSetupModel::first();
        $date = \Carbon\Carbon::today()->subDays(60);
        $data['notice'] = notice_board_model::where('created_at', '>=', $date)->latest()->get();
        $data['about_us'] = WebsiteSetupModel::first();
        $data['course'] = WebsiteCourseModel::limit(3)->get();
        $data['event'] = WebsiteEventModel::whereIn('type', ['1', '2'])->get();

        return view('website.department_view', $data);
    }

    public function tution_fees() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tution_fees', $data);
    }

    public function faculty_member_list() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.faculty_member_list', $data);
    }

    public function student_advisor(manage_department_model $department) {
        $data['department'] = $department;
        $data['student_advisor'] = teacher_model::where('department_id', $department->id)->where('job_type', 'Student Advisor')->first();

        return view('website.faculty_student_advisor', $data);
    }

    public function former_head(manage_department_model $department) {
        $data['department'] = $department;
        $data['departmentHead'] = $department->departmentHead;

        return view('website.former_head', $data);
    }

    public function former_head_add() {

        $data['former_head'] = former_head_model::join('manage_department', 'former_head.department_id', '=', 'manage_department.id')->where('former_head.department_id', $id)->first();
        $data['department'] = manage_subject_model::groupby('subject_name')->get();
        return view('website.faculty_student_advisor_add', $data);
    }

    public function former_head_Update(Request $request) {
        $data = WebsiteSetupModel::findOrFail($request->website_setup_id);
        $requested_data = $request->all();
        //        dd($requested_data);
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

            //Teacher Image Upload
            if ($request->hasfile('image')) {
                $file_path = 'img/backend/overview/';
                $file_name = time() . '.jpg';
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path . $file_name;
            }
            //Teacher  Image Upload

            $data->fill($requested_data)->save();

            Session::flash('success', 'Settings Updated');
            return back()->with('success', 'Settings Updated');
        }
    }

    public function office_chief_advisor() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_chief_advisor', $data);
    }

    public function office_vcice_chancellor() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_vcice_chancellor', $data);
    }

    public function office_vcice_pro_chancellor() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_vcice_pro_chancellor', $data);
    }

    public function office_treasurer() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_treasurer', $data);
    }

    public function office_dean() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_dean', $data);
    }

    public function office_registrar() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_registrar', $data);
    }

    public function office_library() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_library', $data);
    }

    public function office_proctor() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_proctor', $data);
    }

    public function office_director_finance() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_director_finance', $data);
    }

    public function office_controller_examination() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.office_controller_examination', $data);
    }

    public function Admission_test() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_test', $data);
    }

    public function Admission_test_result() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_test_result', $data);
    }

    public function Admission_contact() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_contact', $data);
    }

    public function apply_online() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.apply_online', $data);
    }

    public function Admission_eligibility() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_eligibility', $data);
    }

    public function Admission_guidelines() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_guidelines', $data);
    }

    public function Admission_process() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_process', $data);
    }

    public function Admission_transfer_guidelines() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.Admission_transfer_guidelines', $data);
    }

    public function tuition_other_fees() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tuition_other_fees', $data);
    }

    public function tuition_fee_calculator() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tuition_fee_calculator', $data);
    }

    public function tuition_guidelines() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tuition_guidelines', $data);
    }

    public function tuition_scholarship() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tuition_scholarship', $data);
    }

    public function tuition_waiver_calculator() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.tuition_waiver_calculator', $data);
    }

    public function History() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.history', $data);
    }

    public function MissionVision() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.mission_vision', $data);
    }

    public function PrincipleMessage() {
        $data['website_setup'] = WebsiteSetupModel::first();
        return view('website.principle_message', $data);
    }

    public function StudentInfo($id, $slug) {
        $slug_semester = explode("-", $slug);
        $semester = ucwords(implode(" ", $slug_semester));
        $dept_data = manage_department_model::where('department_code', $id)->first();

        $data['department'] = $dept_data->department_name;

        $data['student_info'] = students::where('department', $data['department'])->where('class', $semester)->paginate(15);
        return view('website.student_info', $data);
    }

    public function ClassRoutine($id, $slug) {
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

    public function CourseMaterial($id, $slug) {
        $slug_semester = explode("-", $slug);
        $data['semester'] = ucwords(implode(" ", $slug_semester));
        $dept_data = manage_department_model::where('department_code', $id)->first();
        $data['department'] = $dept_data->department_name;

        $data['syllebus'] = academic_syllebus_model::where('class_name', $data['semester'])->where('department', $data['department'])->first();

        $data['question'] = question_paper_model::where('class_name', $data['semester'])->where('department', $data['department'])->first();

        $data['website_setup'] = WebsiteSetupModel::first();

        return view('website.course_material', $data);
    }

    public function liveClass() {
        $data['live_classes'] = LiveClass::orderBy('start_time', 'desc')->get();

        return view('website.liveClass', $data);
    }

    public function CitizenCharter() {
        $data['citizen_charter'] = WebsiteSetupModel::first();
        return view('website.citizen_charter', $data);
    }

    public function Contact() {
        $data['contact'] = WebsiteContactModel::all();
        return view('website.contact', $data);
    }

    public function FacultiesMsgFromHead($id) {
        $data['faculties'] = WebsiteFacultiesModel::where('website_faculties_name', $id)
                ->join('teacher', 'teacher.teacher_id', '=', 'website_faculties.department_head')
                ->first();
        return view('website.faculties_msg_from_head', $data);
    }

    public function FacultiesAboutDept($id) {
        $data['department'] = manage_department_model::where('department_name', $id)->first();
        return view('website.faculties_about_department', $data);
    }

    public function FacultiesTeacherInfo($id) {
        // $sub_wise_teacher = manage_subject_model::where('department',$id)->get()->toArray();
        // $teacher_name = collect($sub_wise_teacher)->unique('teacher')->pluck('teacher');
        // $data['teacher_info'] = teacher_model::whereIn('teacher_name',$teacher_name)->get();
        $data['teacher_info'] = teacher_model::where('job_type', $id)->orderBy('sort_index', 'ASC')->paginate(15);

        $data['department'] = $id;

        return view('website.faculties_teacher_info', $data);
    }

    public function FacultiesDepartmentInfo($id) {
        $data['department'] = manage_department_model::where('department_code', $id)->firstOrFail();
        $data['manage_department'] = manage_department_model::get();
        $data['general_settings'] = general_settings_model::first();
        $data['notice'] = notice_board_model::where('notice_department', $id)->latest()->take(15)->get();
        $data['gallery'] = WebsiteEventModel::where('department', $data['department']->id)->latest()->get();
        $data['recentEvents'] = WebsiteEventsModel::where('department', $data['department']->id)->where('start_date', '<', date('Y-m-d'))->latest('start_date')->take(10)->get();
        $data['upcommingEvents'] = WebsiteEventsModel::where('department', $data['department']->id)->where('start_date', '>=', date('Y-m-d'))->latest('start_date')->take(10)->get();
        $data['departments'] = manage_department_model::all();
        $data['news'] = WebsiteNewsModel1::where('department', $data['department']->id)->latest()->take(15)->get();
        $data['message'] = Dept_SetupModel::where('department', $data['department']->id)->first();
        $data['teacher_info'] = teacher_model::where('status', 'teacher')->where('department_id', $data['department']->id)->orderBy('sort_index', 'ASC')->get();

        return view('website.department_view', $data);
    }

    public function department_wise_faculty(manage_department_model $department) {

        $data['department'] = $department;
        $data['teachers'] = teacher_model::where('department_id', $department->id)->latest()->get();

        return view('website.department_wise_faculty', $data);
    }

    public function faculty_profile($id) {
        $data['teacher_info'] = teacher_model::join('manage_department', 'teacher.department_id', '=', 'manage_department.id')
                        ->join('teacher_address_child', 'teacher.teacher_id', '=', 'teacher_address_child.parent')
                        ->join('teacher_qualification_child', 'teacher.teacher_id', '=', 'teacher_qualification_child.parent')
                        ->where('teacher.teacher_id', $id)->where('teacher.status', 'teacher')->select('teacher.*', 'manage_department.department_name', 'teacher_address_child.*', 'teacher_qualification_child.*')->orderBy('sort_index', 'ASC')->first();

        $data['bot_chairman'] = botModel::first();
        $data['bot'] = botModel::where('bot_id', '!=', 1)->get();

        return view('website.individual_faculty_data', $data);
    }

    public function department_wise_tution(manage_department_model $department) {
        $data['department'] = $department;
        $data['feesStructure'] = WebsiteFeesStuctureModel::where('department', $department->id)->first();

        return view('website.department_wise_tution', $data);
    }

    public function newsByDepartment($id) {
        $data['department'] = manage_department_model::findOrFail($id);
        $data['newsList'] = WebsiteNewsModel::where('department', $id)->latest()->paginate(15);

        return view('website.news_by_department', $data);
    }

    public function galleriesByDepartment($id) {
        $data['department'] = manage_department_model::findOrFail($id);
        $data['galleries'] = WebsiteEventModel::where('department', $id)->latest()->get();

        return view('website.galleries_by_department', $data);
    }

    public function searchcourse(Request $request) {
        $subject = manage_subject_model::where('department', $request->department_code)->get();

        foreach ($subject as $subject_list) {
            echo "<option value='$subject_list->id'>$subject_list->subject_name</option>";
        }
    }

    public function contact_us(Request $request) {

        $data['contact'] = general_settings_model::first();
        //        dd($data['contact']);

        return view('website.contact_us', $data);
    }

    public function FacultiesNonTechInstructor() {
        $data['teacher_info'] = teacher_model::where('type', 'Non-Tech')->orderBy('sort_index', 'ASC')->paginate(15);

        return view('website.faculties_non_tech_instructor', $data);
    }

    public function FacultiesStaffInfo($id) {
        $data['staff_info'] = teacher_model::where('status', 'staff')->paginate(15);
        $data['department'] = $id;

        return view('website.faculties_staff_info', $data);
    }

    public function FacultiesLabInfo($id) {
        $data['faculties'] = WebsiteFacultiesModel::where('website_faculties_name', $id)
                ->join('teacher', 'teacher.teacher_id', '=', 'website_faculties.department_head')
                ->first();
        return view('website.faculties_lab_info', $data);
    }

    public function OnlineAdmissionSubmit(Request $request, $id) {
        $requested_data = $request->all();
        $requested_data['applicant_id'] = time();

        $admission_setup = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->where('admission_setup.admission_setup_id', $id)
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();

        foreach ($requested_data as $key => $data) {
            if ($data == '----No Data Found----' || $data == '--Select--' || $data == '----select----') {
                $requested_data[$key] = null;
            }
        }
        if ($request->exam_name) {
            if ($requested_data['exam_name'][0] == '--Select--' || $requested_data['exam_name'][0] == null) {
                Session::flash('error', "Minimum one Educational History Required");
                return back()->withInput();
            }
        } else {
            Session::flash('error', "Minimum one Educational History Required");
            return back()->withInput();
        }


        if ($requested_data['attached_photo_name']) {
            $file_path_photo = "img/backend/aplicant_student/";
            $file_name_photo = $requested_data['applicant_id'] . "_photo.jpg";
            $requested_data['attached_photo_name']->move($file_path_photo, $file_name_photo);
        }
        if ($requested_data['attached_signature_name']) {
            $file_path_signature = "img/backend/aplicant_student/";
            $file_name_signature = $requested_data['applicant_id'] . "_signature.jpg";
            $requested_data['attached_signature_name']->move($file_path_signature, $file_name_signature);
        }


        //data process for aplicant_student table
        $student_info['applicant_id'] = $requested_data['applicant_id'];
        $student_info['student_name'] = $requested_data['student_name'];
        $student_info['student_name_bangla'] = $requested_data['student_name_bangla'];
        $student_info['birth_date'] = $requested_data['birth_date'];
        $student_info['nid_birth'] = $requested_data['nid_birth'];
        $student_info['birth_registration'] = $requested_data['birth_registration'];
        $student_info['religion'] = $requested_data['religion'];
        $student_info['nationality'] = $requested_data['nationality'];
        $student_info['maritial'] = $requested_data['maritial'];
        $student_info['blood_group'] = $requested_data['blood_group'];
        $student_info['income_guardian'] = $requested_data['income_guardian'];
        $student_info['phone'] = $requested_data['phone'];
        $student_info['email'] = $requested_data['email'];
        $student_info['father_mobile_no'] = $requested_data['father_mobile_no'];
        $student_info['mother_mobile_no'] = $requested_data['mother_mobile_no']; //

        $student_info['father_name_bangla'] = $requested_data['father_name_bangla'];
        $student_info['father_name'] = $requested_data['father_name'];
        $student_info['father_national_id_no'] = $requested_data['father_national_id_no']; //
        $student_info['father_occupation'] = $requested_data['father_occupation']; //

        $student_info['mother_name_bangla'] = $requested_data['mother_name_bangla'];
        $student_info['mother_name'] = $requested_data['mother_name'];
        $student_info['mother_national_id_no'] = $requested_data['mother_national_id_no']; //
        $student_info['mother_occupation'] = $requested_data['mother_occupation']; //

        $student_info['physically_challenged'] = $requested_data['physically_challenged'];

        $student_info['credit_transfer'] = $requested_data['credit_transfer'];
        $student_info['credit_name_of_university'] = $requested_data['credit_name_of_university'];
        $student_info['credit'] = $requested_data['credit'];
        $student_info['cgpa'] = $requested_data['cgpa'];
        $student_info['transfer_year'] = $requested_data['year']; //
        $student_info['semester'] = $requested_data['semester'];

        $student_info['degree_name'] = $admission_setup[0]->program_type;
        $student_info['session_choose'] = $admission_setup[0]->session_name;
        $student_info['session'] = $admission_setup[0]->year;
        $student_info['department'] = $admission_setup[0]->department_id;

        $student_info['attached_photo_name'] = $file_name_photo;
        $student_info['attached_signature_name'] = $file_name_signature;
        $student_info['payment_transaction_id'] = $requested_data['payment_transaction_id'];
        $student_info['payment_mobile_no'] = $requested_data['payment_mobile_no'];
        $student_info['hall_of_residence'] = $requested_data['hall_of_residence'];
        // aplicant_student_model::insert($student_info); //insert aplicant_student table

        $applicant_student_child['parent'] = $requested_data['applicant_id'];
        $applicant_student_child['division'] = $requested_data['division'];
        $applicant_student_child['home_district'] = $requested_data['home_district'];
        $applicant_student_child['upazilas'] = $requested_data['upazilas'];
        $applicant_student_child['unions'] = $requested_data['unions'];
        $applicant_student_child['village_name'] = $requested_data['village_name'];

        $applicant_student_child['post_office'] = $requested_data['post_office'];
        $applicant_student_child['present_division'] = $requested_data['present_division'];
        $applicant_student_child['present_home_district'] = $requested_data['present_home_district'];
        $applicant_student_child['present_upazilas'] = $requested_data['present_upazilas'];
        $applicant_student_child['present_unions'] = $requested_data['present_unions'];
        $applicant_student_child['present_village_name'] = $requested_data['present_village_name'];
        $applicant_student_child['present_post_office'] = $requested_data['present_post_office'];

        $applicant_student_child['legal_gurdian_name'] = $requested_data['legal_gurdian_name'];
        $applicant_student_child['legal_gurdian_name_bangla'] = $requested_data['legal_gurdian_name_bangla'];
        $applicant_student_child['legal_gurdian_relation'] = $requested_data['legal_gurdian_relation'];
        $applicant_student_child['legal_gurdian_occupation'] = $requested_data['legal_gurdian_occupation'];
        $applicant_student_child['legal_gurdian_nid_no'] = $requested_data['legal_gurdian_nid_no'];
        $applicant_student_child['legal_gurdian_contact_no'] = $requested_data['legal_gurdian_contact_no'];
        $applicant_student_child['legal_gurdian_address'] = $requested_data['legal_gurdian_address'];

        $applicant_student_child['local_gurdian_name'] = $requested_data['local_gurdian_name'];
        $applicant_student_child['local_gurdian_name_bangla'] = $requested_data['local_gurdian_name_bangla'];
        $applicant_student_child['local_gurdian_relation'] = $requested_data['local_gurdian_relation'];
        $applicant_student_child['local_gurdian_occupation'] = $requested_data['local_gurdian_occupation'];
        $applicant_student_child['local_gurdian_nid_no'] = $requested_data['local_gurdian_nid_no'];
        $applicant_student_child['local_gurdian_contact_no'] = $requested_data['local_gurdian_contact_no'];
        $applicant_student_child['local_gurdian_address'] = $requested_data['local_gurdian_address'];

        //applicant_student_child_model::insert($applicant_student_child); //insert in applicant_student_child_model //2nd insert

        if ($requested_data['exam_name'][0]) {
            foreach ($requested_data['exam_name'] as $key => $exam_value) {
                $file_path = null;
                $file_name = null;
                if ($requested_data['image_name'][$key]) {
                    $file_path = "img/backend/aplicant_student/marksheet/";
                    $file_name = $requested_data['applicant_id'] . '_' . $requested_data['passing_year'][$key] . ".jpg";
                    $requested_data['image_name'][$key]->move($file_path, $file_name);
                }
                $qualification_data = [
                    'applicant_id' => $requested_data['applicant_id'],
                    'exam_name' => $requested_data['exam_name'][$key],
                    'borad' => $requested_data['borad'][$key],
                    'reg_no' => $requested_data['reg_no'][$key],
                    'roll_no' => $requested_data['roll_no'][$key],
                    'group' => $requested_data['group'][$key],
                    'passing_year' => $requested_data['passing_year'][$key],
                    'gpa' => $requested_data['gpa'][$key],
                    'image_name' => $file_name,
                    'image_path' => $file_path,
                ];
                // applicant_student_educational_q::insert($qualification_data); //insert into applicant_student_educational_q 5th insert
            }
        }

        $applicant_reference['applicant_id'] = $requested_data['applicant_id'];
        $applicant_reference['reference_name'] = $requested_data['reference_name'];
        $applicant_reference['reference_designation'] = $requested_data['reference_designation'];
        $applicant_reference['reference_institute_name'] = $requested_data['reference_institute_name'];
        $applicant_reference['reference_id_no'] = $requested_data['reference_id_no'];
        $applicant_reference['reference_mobile_no'] = $requested_data['reference_mobile_no'];
        $applicant_reference['reference_name1'] = $requested_data['reference_name1'];
        $applicant_reference['reference_designation1'] = $requested_data['reference_designation1'];
        $applicant_reference['reference_institute_name1'] = $requested_data['reference_institute_name1'];
        $applicant_reference['reference_id_no1'] = $requested_data['reference_id_no1'];
        $applicant_reference['reference_mobile_no1'] = $requested_data['reference_mobile_no1'];
        //reference_model::insert($applicant_reference); //insert in reference_model  4th insert

        $faculty_choose['applicant_id'] = $requested_data['applicant_id'];
        $faculty_choose['department'] = $admission_setup[0]->department_id;
        $faculty_choose['shift'] = $admission_setup[0]->session_name;
        //applicant_faculty_choose_model::insert($faculty_choose); //inseret in faculty_choose  5th table
        // echo '<pre>';
        // print_r($applicant_reference);
        // die;


       // $applicant_admit['admit_card'] = DB::table('applicant_student')->orderBy('applicant_id', 'desc')->take(1)->get();
        
        $email = $requested_data['email'];
        $mail['email'] = $email;
        $mail['id'] = $faculty_choose['applicant_id'];
        Mail::to($email)->send(new AplicantStudentMail($mail));

        session()->flash('success', "$request->student_name Information Succesfully inserted and login information sent");
        return Redirect::back();
       // return view('website.admission-form-submission', $applicant_admit);
    }

    public function OnlineAdmission($id) {
        $admission_setup = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->where('admission_setup.admission_setup_id', $id)
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();

        $data['admission_setup'] = $admission_setup[0];

        $data['degree_name_data'] = degree_name_model::get();
        $data['session_choose_data'] = session_choose_model::get();
        $data['session'] = ov_setup_model::where('type', 'Session')->get();
        $data['department_name'] = manage_department_model::all();

        $data['dormitory_name'] = manage_dormitory_model::all();

        $dept = manage_department_model::all();
        $data['department'] = collect($dept)->unique('department_code');

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

        $data['religion_data'] = religion_model::get();
        /*
          echo '<pre>';
          print_r( $data['religion_data']);
          die;
         * 
         */
        $data['quota_data'] = quota_model::get();
        $data['semester_data'] = semester_model::get();
        $data['profession_data'] = profession_model::get();
        $data['dependent_relation_data'] = dependent_relation_model::get();

        return view('website.online_admission', $data);
    }

// Online Admission(Alal:14-06) work start
    public function OnlineAdmissionFrontPage() {
        return view('website.online_admission_front');
    }

    // Alal(05-07-22) Start
    public function OnlineAdmissionNewApplicant() {
        $date = date("Y-m-d");
        $data = array();
        $data['undergraduates'] = array();
        $data['graduates'] = array();
        $admission_setup = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->where('admission_setup.status', 'Active')
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();
        foreach ($admission_setup as $key => $admission) {
            if (strtotime($admission->application_deadline) + 86400 > strtotime($date)) {
                if ($admission->program_type == 'Graduate') {
                    $data['graduates'][$key]['id'] = $admission->admission_setup_id;
                    $data['graduates'][$key]['department_name'] = $admission->department_name;
                    $data['graduates'][$key]['session_name'] = $admission->session_name;
                    $data['graduates'][$key]['application_deadline'] = date("F j, Y", strtotime($admission->application_deadline));
                    $data['graduates'][$key]['date_of_admission_test'] = date("F j, Y", strtotime($admission->date_of_admission_test));
                } else {
                    $data['undergraduates'][$key]['id'] = $admission->admission_setup_id;
                    $data['undergraduates'][$key]['department_name'] = $admission->department_name;
                    $data['undergraduates'][$key]['session_name'] = $admission->session_name;
                    $data['undergraduates'][$key]['application_deadline'] = date("F j, Y", strtotime($admission->application_deadline));
                    $data['undergraduates'][$key]['date_of_admission_test'] = date("F j, Y", strtotime($admission->date_of_admission_test));
                }
            }
        }
        return view('website.application_form_front', $data);
    }

    public function OnlineAdmissionStudentLogin() {
        return view('login.student_login_applicant');
        // return view('login.student_login');
    }
    // Alal(05-07-22) End

    public function OnlineAdmissionStudentAdmitCard() { // @Alal: 07-07-22
        return view('website.online-admission-student-admit-card');
    }

    public function OnlineAdmissionStudentAdmitCardFront(Request $request) { // @Alal: 12-07-22

        // echo '<pre>';
        // print_r($request->applicant_id);
        // die;
        // $request->validate([
        //     'applicant_id'=> 'required',
        //     'email'=> 'required|email|unique:applicant_student'
        // ]);


        $applicant_id    = aplicant_student_model::where('applicant_id','=',$request->applicant_id)->first();
        $applicant_email = aplicant_student_model::where('email','=',$request->email)->first();

        if($applicant_email){
            if($applicant_id){
                $admit_data['admit_card'] = DB::table('applicant_student')
                ->where('applicant_student.applicant_id', '=', $request->applicant_id)
                ->get();
                // echo '<pre>';
                // print_r($admit_data);
                // die;
                return view('website.online-admission-student-admit-card', $admit_data);
            }else{
                return back()->with('applicant_id','Applicant ID not correct!'); 
            }
        }else{
            return back()->with('email','Applicant Email not correct!');
        }

        
    }

    public function OnlineInstruction() {
        return view('website.online_admission_instruction');
    }

    public function AdmissionEligibility() {
        return view('website.admission_eligibility');
    }

    public function ImportantDates() {
        return view('website.important_dates');
    }

    public function ApplicationFormFront() {
        $date = date("Y-m-d");
        $data = array();
        $data['undergraduates'] = array();
        $data['graduates'] = array();
        $admission_setup = DB::table('admission_setup')
                ->join('session_choose', 'admission_setup.session', '=', 'session_choose.id')
                ->join('manage_department', 'admission_setup.department_id', '=', 'manage_department.id')
                ->join('program_type', 'program_type.id', '=', 'admission_setup.program_type')
                ->where('admission_setup.status', 'Active')
                ->select('admission_setup.*', 'session_choose.name as session_name', 'manage_department.department_name', 'program_type.program_type')
                ->get();
        foreach ($admission_setup as $key => $admission) {
            if (strtotime($admission->application_deadline) + 86400 > strtotime($date)) {
                if ($admission->program_type == 'Graduate') {
                    $data['graduates'][$key]['id'] = $admission->admission_setup_id;
                    $data['graduates'][$key]['department_name'] = $admission->department_name;
                    $data['graduates'][$key]['session_name'] = $admission->session_name;
                    $data['graduates'][$key]['application_deadline'] = date("F j, Y", strtotime($admission->application_deadline));
                    $data['graduates'][$key]['date_of_admission_test'] = date("F j, Y", strtotime($admission->date_of_admission_test));
                } else {
                    $data['undergraduates'][$key]['id'] = $admission->admission_setup_id;
                    $data['undergraduates'][$key]['department_name'] = $admission->department_name;
                    $data['undergraduates'][$key]['session_name'] = $admission->session_name;
                    $data['undergraduates'][$key]['application_deadline'] = date("F j, Y", strtotime($admission->application_deadline));
                    $data['undergraduates'][$key]['date_of_admission_test'] = date("F j, Y", strtotime($admission->date_of_admission_test));
                }
            }
        }

        return view('website.application_form_front', $data);
    }

    public function OnlineAdmissionPayment() {
        return view('website.online_admission_payment');
    }

    public function AdmissionGuidline() {
        return view('website.admission_guidline');
    }

    public function AdmissionContact() {
        return view('website.admission_contact_info');
    }

    // Online Admission(Alal:17-06) work end

    /*
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
     */

    public function AddOnlineAdmission(Request $request) {
        $t = time();
        echo 'aaa';
        die;
        $requested_data = $request->all();
        echo '<pre>';
        print_r($requested_data);
        die;

        $requested_data['relation'] = 'Guardian';
        //$requested_data['class'] = 'First Semester';
        $requested_data['admission_test'] = 'Admission Test';
        //$requested_data['section'] = 'Please Frist Fill Class';
        $requested_data['Applicant'] = 'Please Frist Fill Class';
        $requested_data['batch'] = '0';
        //$requested_data['medium'] = 'TISI';
        $requested_data['applicant_id'] = time();

        $aplicant_student = new aplicant_student_model;
        $aplicant_student->fill($request->all())->save();

        //1st table
        //        $data = new aplicant_student_model;
        /* $requested_data['medium'] = '';
          $requested_data['department'] = '';
          $requested_data['class'] = '';
          $requested_data['section'] = '';
          $requested_data['shift'] = ''; */
        //        $data->fill($requested_data)->save();
        //        $data->fill($request->all())->save();
        //1st table
        //batch apply program insert
        if (!empty($request->medium)) {
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
        if (!empty($requested_data['post_office']) or!empty($requested_data['home_district']) or!empty($requested_data['division']) or!empty($requested_data['village_name'])) {
            $applicant_student_child_model = new applicant_student_child_model;
            //            $applicant_student_child_model['parent'] = $requested_data['applicant_id'];
            $applicant_student_child_model['parent'] = $aplicant_student->applicant_id;
            $applicant_student_child_model->fill($request->all())->save();
        }
        //2nd table
        //3rd table
        if (!empty($requested_data['reference_name']) or!empty($requested_data['reference_designation'])) {
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
                    $fil_name = $requested_data['applicant_id'] . '_' . $request->exam_name[$key] . ".jpg";

                    $request->marksheet[$key]->move($file_path, $fil_name);
                }
            }
            applicant_student_educational_q::insert($qualification_data);
        }
        //educationa qualification
        //        dd($requested_data);
        //photo
        if ($request->attached_photo) {
            $file_path = "img/backend/aplicant_student/";
            //            $fil_name = $requested_data['applicant_id'].".jpg";
            $fil_name = $aplicant_student->applicant_id . ".jpg";
            $request->file('attached_photo')->move($file_path, $fil_name);
        }
        //photo
        //Attachments
        if ($request->attached_signature) {
            $file_path = "img/backend/aplicant_student/signature/";
            //            $fil_name = $requested_data['applicant_id'].".jpg";
            $fil_name = $aplicant_student->applicant_id . ".jpg";
            $request->file('attached_signature')->move($file_path, $fil_name);
        }
        //Attachments
        //4th table
        if (!empty($request->inspection_no) or!empty($request->reference)) {
            $office_copy_data = [
                //                'applicant_id' => $requested_data['applicant_id'],
                'applicant_id' => $aplicant_student->applicant_id,
                'inspection_no' => $requested_data['inspection_no'],
                'reference' => $requested_data['reference'],
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

    public function AddOnlineAdmission12(Request $request) {
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

    public function Gallery() {
        $data['gallery'] = WebsiteEventModel::latest()->get();
        return view('website.gallery', $data);
    }

    public function Course($id) {
        $data['course'] = WebsiteCourseModel::where('course_category_id', $id)->get();
        return view('website.course', $data);
    }

    public function CourseSingle($id) {
        $data['course'] = WebsiteCourseModel::findOrFail($id);
        return view('website.single_course', $data);
    }

    public function FeesStructure($id) {
        $data['fees_structure'] = WebsiteFeesStuctureModel::where('department', $id)->first();
        return view('website.fees_structure', $data);
    }

    public function MailSent(Request $request) {
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

    public function Result() {
        $data['exam'] = exam_list_model::where('publish', 'Yes')->get();
        return view('website.result_index', $data);
    }

    public function district_filter($id) {
        return districts_model::where('division_id', $id)->get();
    }

    public function upozila_filter($id) {
        return upazilas_model::where('district_id', $id)->get();
    }

    public function unions_filter($id) {
        return unions_model::where('upazilla_id', $id)->get();
    }

    public function faculty_department($id) {
        return manage_department_model::where('faculty_name', $id)->get(); //fixed by akash @6/2/2022 
    }

    public function class_section($id) {
        return manage_section_model::where('class', $id)->get();
    }

    public function department_program($id) {

        return manage_class_model::where('class_department', $id)->get();
    }

    public function district_filter1($id) {
        return districts_model::where('division_id', $id)->get();
    }

    public function upozila_filter1($id) {
        return upazilas_model::where('district_id', $id)->get();
    }

}
