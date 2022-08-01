<?php

namespace App\Http\Controllers;

use App\Mail\AplicantStudentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Validator;
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
use App\aplicant_student_model;
use App\applicant_student_child_model;
use File;
use App\exam_list_model;
use App\manage_faculty_model;
use App\parents_info_model;
use App\manage_class_model;
use App\manage_department_model;
use Redirect;
use App\general_settings_model;
use App\ov_setup_model;
use App\applicant_student_educational_q;
use DB;
use App\applicant_student_hem_info_model;
use App\applicant_student_office_copy_model;
// Alal-27-06-22(Start)
use App\manage_dormitory_model;

// Alal-27-06-22(End)

class Aplicant_student extends Controller {
    // public __construct()
    // {
    //     $this->middleware('permission:students')->only('create');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
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

    public function index() {
        $session = ov_setup_model::where('type', 'Session')->get();
        $shift = ov_setup_model::where('type', 'Shift')->get();
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $faculty = manage_faculty_model::get();
        $batch = general_settings_model::first();
        $batch_data = ov_setup_model::where('type', 'Batch')->get();
        $nationality_data = nationality_model::get();
        $maritial_data = maritial_model::get();
        $blood_group_data = blood_group_model::get();
        $semester_data = semester_model::get();
        $year_data = year_model::get();
        $divisions_data = divisions_model::get();
        $districts_data = districts_model::get();
        $upazilas_data = upazilas_model::get();
        $unions_data = unions_model::get();
        $religion_data = religion_model::get();
        $degree_name_data = degree_name_model::get();
        $session_choose_data = session_choose_model::get();
        $quota_data = quota_model::get();
        $profession_data = profession_model::get();
        $dependent_relation_data = dependent_relation_model::get();
        $exam_name_data = exam_name_model::get();
        $board_name_data = board_name_model::get();
        $group_name_data = group_name_model::get();
        $section_data = manage_section_model::get();

         $dormitory_name = manage_dormitory_model::all(); //@Alal

        return view('admin.students.aplicant_student', ['exam_lsit' => exam_list_model::all(), 'parents_data' => parents_info_model::all(), 'manage_class' => manage_class_model::all(), "department_name" => manage_department_model::all(), 'batch' => $batch, 'session' => $session, 'shift' => $shift, 'medium' => $medium, 'batch_data' => $batch_data, 'nationality_data' => $nationality_data, 'maritial_data' => $maritial_data, 'blood_group_data' => $blood_group_data, 'semester_data' => $semester_data, 'year_data' => $year_data, 'divisions_data' => $divisions_data, 'districts_data' => $districts_data, 'upazilas_data' => $upazilas_data, 'unions_data' => $unions_data, 'religion_data' => $religion_data, 'degree_name_data' => $degree_name_data, 'session_choose_data' => $session_choose_data, 'quota_data' => $quota_data, 'profession_data' => $profession_data, 'dependent_relation_data' => $dependent_relation_data, 'exam_name_data' => $exam_name_data, 'board_name_data' => $board_name_data, 'group_name_data' => $group_name_data, 'section_data' => $section_data, 'faculty' => $faculty, 'dormitory_name' => manage_dormitory_model::all()]);
   
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }


    public function store(Request $request) {
        $requested_data = $request->all();
        $requested_data['applicant_id'] = time();

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

        $student_info['degree_name'] = $requested_data['degree_name'];
        $student_info['session_choose'] = $requested_data['session_choose'];
        $student_info['session'] = $requested_data['session'];
        $student_info['department'] = $requested_data['department'];

        $student_info['attached_photo_name'] = $file_name_photo;
        $student_info['attached_signature_name'] = $file_name_signature;
        $student_info['payment_transaction_id'] = $requested_data['payment_transaction_id'];
        $student_info['payment_mobile_no'] = $requested_data['payment_mobile_no'];
        $student_info['hall_of_residence'] = $requested_data['hall_of_residence'];

        aplicant_student_model::insert($student_info); //insert aplicant_student table

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
        applicant_student_child_model::insert($applicant_student_child); //insert in applicant_student_child_model //2nd insert

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
                applicant_student_educational_q::insert($qualification_data); //insert into applicant_student_educational_q 5th insert
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
        reference_model::insert($applicant_reference); //insert in reference_model  4th insert

        $faculty_choose['applicant_id'] = $requested_data['applicant_id'];
        $faculty_choose['department'] = $requested_data['department'];
        $faculty_choose['shift'] = $requested_data['session_choose'];
        applicant_faculty_choose_model::insert($faculty_choose); //inseret in faculty_choose  5th table
        
        $email= $requested_data['email'];
		$mail['email']=$email;
		$mail['id']=$faculty_choose['applicant_id'];
        Mail::to($email)->send(new AplicantStudentMail($mail));
        

         session()->flash('success', "$request->student_name Information Succesfully inserted and login information sent");
            return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $educational_qualifincations = applicant_student_educational_q::where('applicant_id', $id)->get();

        // $applicant_reference = reference_model::where('applicant_id', $id)->get();
        $applicant_reference = reference_model::where('applicant_id', $id)->get();
        $applicant_apply_choose = applicant_faculty_choose_model::where('applicant_id', $id)->get();
        $hem_section_info = applicant_student_hem_info_model::where('applicant_id', $id)->first();
        $office_copy_data = applicant_student_office_copy_model::where('applicant_id', $id)->first();
        applicant_student_educational_q::insert($qualification_data);

        return view('admin.students.applicant_student_edit', ['applicant_student' => aplicant_student_model::where('applicant_id', $id)->first(), 'aplicant_student_child' => applicant_student_child_model::where('parent', $id)->first(), 'exam_lsit' => exam_list_model::all(), 'parents_data' => parents_info_model::all(), 'manage_class' => manage_class_model::all(), "department_data" => manage_department_model::all(), 'batch' => $batch, 'session' => $session, 'shift' => $shift, 'medium' => $medium, 'educational_qualifincations' => $educational_qualifincations, 'applicant_reference' => $applicant_reference, 'applicant_apply_choose' => $applicant_apply_choose, 'hem_section_info' => $hem_section_info, 'office_copy_data' => $office_copy_data, 'nationality_data' => $nationality_data, 'maritial_data' => $maritial_data, 'blood_group_data' => $blood_group_data, 'semester_data' => $semester_data, 'year_data' => $year_data, 'divisions_data' => $divisions_data, 'districts_data' => $districts_data, 'upazilas_data' => $upazilas_data, 'unions_data' => $unions_data, 'religion_data' => $religion_data, 'degree_name_data' => $degree_name_data, 'session_choose_data' => $session_choose_data, 'quota_data' => $quota_data, 'profession_data' => $profession_data, 'dependent_relation_data' => $dependent_relation_data, 'exam_name_data' => $exam_name_data, 'board_name_data' => $board_name_data, 'group_name_data' => $group_name_data, 'section_data' => $section_data, 'batch_data' => $batch_data]);
    }

    public function view_all($id) {
        // print_r($data['educational_qualifincations'][0]->applicant_id);
        $educational_qualifincations = applicant_student_educational_q::where('applicant_id', $id)->get();

        $applicant_student = aplicant_student_model::where('applicant_id', $id)->first();
        $applicant_student_child = applicant_student_child_model::where('parent', $id)->first();
        $applicant_reference = reference_model::where('applicant_id', $id)->get();
        $applicant_faculty_choose = applicant_faculty_choose_model::where('applicant_id', $id)->get();

        //basic info
        $array['student_name'] = $applicant_student->student_name;
        $array['student_name_bangla'] = $applicant_student->student_name_bangla;
        $array['religion'] = religion_model::where('id', $applicant_student->religion)->get();
        $array['nationality'] = nationality_model::where('id', $applicant_student->nationality)->get();
        $array['birth_date'] = $applicant_student->birth_date;
        $array['blood_group'] = blood_group_model::where('id', $applicant_student->blood_group)->get();
        $array['maritial'] = maritial_model::where('id', $applicant_student->maritial)->get();
        $array['nid_birth'] = $applicant_student->nid_birth;
        $array['birth_registration'] = $applicant_student->birth_registration;
        $array['income_guardian'] = $applicant_student->income_guardian;
        $array['degree'] = $applicant_student->degree_name;
        $array['session_choose'] = $applicant_student->session_choose;
        $array['session'] = $applicant_student->session;
        //basic info end
        //father info
        $array['father_name_bangla'] = $applicant_student->father_name_bangla;
        $array['father_name'] = $applicant_student->father_name;
        $array['father_national_id_no'] = $applicant_student->father_national_id_no;
        $array['father_occupation'] = $applicant_student->father_occupation;
        $array['father_mobile_no'] = $applicant_student->father_mobile_no;
        //end of father info
        //mother info
        $array['mother_name_bangla'] = $applicant_student->mother_name_bangla;
        $array['mother_name'] = $applicant_student->mother_name;
        $array['mother_national_id_no'] = $applicant_student->mother_national_id_no;
        $array['mother_occupation'] = $applicant_student->mother_occupation;
        $array['mother_mobile_no'] = $applicant_student->mother_mobile_no;
        //end of mother info
        //qualification start
        foreach ($educational_qualifincations as $key => $qualifincations) {
            $array['qualifincations'][$key]['exam_name'] = $qualifincations->exam_name;
            $array['qualifincations'][$key]['borad'] = $qualifincations->borad;
            $array['qualifincations'][$key]['reg_no'] = $qualifincations->reg_no;
            $array['qualifincations'][$key]['roll_no'] = $qualifincations->roll_no;
            $array['qualifincations'][$key]['group'] = $qualifincations->group;
            $array['qualifincations'][$key]['passing_year'] = $qualifincations->passing_year;
            $array['qualifincations'][$key]['gpa'] = $qualifincations->gpa;
        }
        //credit transfer 
        $array['credit_transfer'] = $applicant_student->credit_transfer;
        $array['credit_name_of_university'] = $applicant_student->credit_name_of_university;
        $array['credit'] = $applicant_student->credit;
        $array['cgpa'] = $applicant_student->cgpa;
        $array['transfer_year'] = $applicant_student->transfer_year;
        $array['semester'] = $applicant_student->semester;
        //credit transfer end 
        //PAYMENT info
        $array['payment_transaction_id'] = $applicant_student->payment_transaction_id;
        $array['payment_mobile_no'] = $applicant_student->payment_mobile_no;
        //payment info end
        //address

        $array['division'] = divisions_model::where('id', $applicant_student_child->division)->get();
        $array['home_district'] = districts_model::where('id', $applicant_student_child->home_district)->get();
        $array['upazilas'] = upazilas_model::where('id', $applicant_student_child->upazilas)->get();
        $array['unions'] = unions_model::where('id', $applicant_student_child->unions)->get();
        $array['post_office'] = $applicant_student_child->post_office;
        $array['village_name'] = $applicant_student_child->village_name;

        $array['present_division'] = divisions_model::where('id', $applicant_student_child->present_division)->get();
        $array['present_home_district'] = districts_model::where('id', $applicant_student_child->present_home_district)->get();
        $array['present_upazilas'] = upazilas_model::where('id', $applicant_student_child->present_upazilas)->get();
        $array['present_unions'] = unions_model::where('id', $applicant_student_child->present_unions)->get();
        $array['present_post_office'] = $applicant_student_child->post_office;
        $array['present_village_name'] = $applicant_student_child->village_name;
        //end address
        //legal_gurdian
        $array['legal_gurdian_name'] = $applicant_student_child->legal_gurdian_name;
        $array['legal_gurdian_name_bangla'] = $applicant_student_child->legal_gurdian_name_bangla;
        $array['legal_gurdian_relation'] = $applicant_student_child->legal_gurdian_relation;
        $array['legal_gurdian_occupation'] = $applicant_student_child->legal_gurdian_occupation;
        $array['legal_gurdian_nid_no'] = $applicant_student_child->legal_gurdian_nid_no;
        $array['legal_gurdian_contact_no'] = $applicant_student_child->legal_gurdian_contact_no;
        $array['legal_gurdian_address'] = $applicant_student_child->legal_gurdian_address;
        //end legal_gurdian
        //local_gurdian 
        $array['local_gurdian_name'] = $applicant_student_child->local_gurdian_name;
        $array['local_gurdian_name_bangla'] = $applicant_student_child->local_gurdian_name_bangla;
        $array['local_gurdian_relation'] = $applicant_student_child->local_gurdian_relation;
        $array['local_gurdian_occupation'] = $applicant_student_child->local_gurdian_occupation;
        $array['local_gurdian_nid_no'] = $applicant_student_child->local_gurdian_nid_no;
        $array['local_gurdian_contact_no'] = $applicant_student_child->local_gurdian_contact_no;
        $array['local_gurdian_address'] = $applicant_student_child->local_gurdian_address;
        //end local_gurdian
        //refarance

        $array['reference_name'] = $applicant_reference[0]->reference_name;
        $array['reference_designation'] = $applicant_reference[0]->reference_designation;
        $array['reference_institute_name'] = $applicant_reference[0]->reference_institute_name;
        $array['reference_id_no'] = $applicant_reference[0]->reference_id_no;
        $array['reference_mobile_no'] = $applicant_reference[0]->reference_mobile_no;
        $array['reference_name1'] = $applicant_reference[0]->reference_name1;
        $array['reference_designation1'] = $applicant_reference[0]->reference_designation1;
        $array['reference_institute_name1'] = $applicant_reference[0]->reference_institute_name1;
        $array['reference_id_no1'] = $applicant_reference[0]->reference_id_no1;
        $array['reference_mobile_no1'] = $applicant_reference[0]->reference_mobile_no1;
        //end refarance
        //hall
        $array['hall_of_residence'] = manage_dormitory_model::where('manage_dormitory_id', $applicant_student->hall_of_residence)->get();
        //end hall
        //deparment
        $array['department'] = manage_department_model::where('id', $applicant_faculty_choose[0]->department)->get();
        //end deparment
        /*
          $array['gender'] = $applicant_student->gender;
          $array['phone'] = $applicant_student->phone;
          $array['email'] = $applicant_student->email;
          $array['father_name'] = $applicant_student->father_name;
          $array['mother_name'] = $applicant_student->mother_name;
         * 
         */
        $array['attached_photo_name'] = $applicant_student->attached_photo_name;
        $array['attached_signature_name'] = $applicant_student->attached_signature_name;
        $array['payment_transaction_id'] = $applicant_student->payment_transaction_id;
        $array['applied_date'] = $applicant_student->created_at->format('m/d/Y');

        return view('admin.students.applicant_student_view', $array);


   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
          $session = ov_setup_model::where('type', 'Session')->get();
        $shift = ov_setup_model::where('type', 'Shift')->get();
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $faculty = manage_faculty_model::get();
        $batch = general_settings_model::first();
        $batch_data = ov_setup_model::where('type', 'Batch')->get();
        $nationality_data = nationality_model::get();
        $maritial_data = maritial_model::get();
        $blood_group_data = blood_group_model::get();
        $semester_data = semester_model::get();
        $year_data = year_model::get();
        $divisions_data = divisions_model::get();
        $districts_data = districts_model::get();
        $upazilas_data = upazilas_model::get();
        $unions_data = unions_model::get();
        $religion_data = religion_model::get();
        $degree_name_data = degree_name_model::get();
        $session_choose_data = session_choose_model::get();
        $quota_data = quota_model::get();
        $profession_data = profession_model::get();
        $dependent_relation_data = dependent_relation_model::get();
        $exam_name_data = exam_name_model::get();
        $board_name_data = board_name_model::get();
        $group_name_data = group_name_model::get();
        $section_data = manage_section_model::get();
        $educational_qualifincations = applicant_student_educational_q::where('applicant_id', $id)->get();
        $applicant_reference = reference_model::where('applicant_id', $id)->get();
        $applicant_apply_choose = applicant_faculty_choose_model::where('applicant_id', $id)->get();
        $hem_section_info = applicant_student_hem_info_model::where('applicant_id', $id)->first();
        $office_copy_data = applicant_student_office_copy_model::where('applicant_id', $id)->first();
        

       
        return view('admin.students.applicant_student_edit', ['applicant_student' => aplicant_student_model::where('applicant_id', $id)->first(), 'aplicant_student_child' => applicant_student_child_model::where('parent', $id)->first(), 'exam_lsit' => exam_list_model::all(),"department_name" => manage_department_model::all(), 'parents_data' => parents_info_model::all(), 'manage_class' => manage_class_model::all(), "department_data" => manage_department_model::all(), 'batch' => $batch, 'session' => $session, 'shift' => $shift, 'medium' => $medium, 'educational_qualifincations' => $educational_qualifincations, 'applicant_reference' => $applicant_reference, 'applicant_apply_choose' => $applicant_apply_choose, 'hem_section_info' => $hem_section_info, 'office_copy_data' => $office_copy_data, 'nationality_data' => $nationality_data, 'maritial_data' => $maritial_data, 'blood_group_data' => $blood_group_data, 'semester_data' => $semester_data, 'year_data' => $year_data, 'divisions_data' => $divisions_data, 'districts_data' => $districts_data, 'upazilas_data' => $upazilas_data, 'unions_data' => $unions_data, 'religion_data' => $religion_data, 'degree_name_data' => $degree_name_data, 'session_choose_data' => $session_choose_data, 'quota_data' => $quota_data, 'profession_data' => $profession_data, 'dependent_relation_data' => $dependent_relation_data, 'exam_name_data' => $exam_name_data, 'board_name_data' => $board_name_data, 'group_name_data' => $group_name_data, 'section_data' => $section_data, 'batch_data' => $batch_data, 'dormitory_name' => manage_dormitory_model::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $aplicant_student = new aplicant_student_model;
        $validation = Validator::make($request->all(), $aplicant_student->roles_rule());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            DB::beginTransaction();
            if ($request->hasfile('image')):
                $this->image_upload($request, $id);
            endif;

            if (count($request->exam_name) > 0) {
                applicant_student_educational_q::where('applicant_id', $id)->delete();
                foreach ($request->exam_name as $key => $exam_value) {
                    $qualification_data[] = [
                        'applicant_id' => $request->applicant_id,
                        'exam_name' => $request->exam_name[$key],
                        'borad' => $request->borad[$key],
                        'reg_no' => $request->reg_no[$key],
                        'roll_no' => $request->roll_no[$key],
                        'group' => $request->group[$key],
                        'passing_year' => $request->passing_year[$key],
                        'gpa' => $request->gpa[$key],
                    ];
                }
                applicant_student_educational_q::insert($qualification_data);
            }

            $data = array_except($request->all(), ['_method', '_token', 'post_office', 'home_district', 'division', 'village_name']);

            aplicant_student_model::where('applicant_id', $id)->first()->fill($data)->save();
            applicant_student_child_model::where('parent', $id)->first()->fill($request->all())->save();
            if ($request->is_family_member_of_hem_section == "yes") {
                $prev_hem_data = applicant_student_hem_info_model::where('applicant_id', $id)->first();
                if ($prev_hem_data) {
                    $prev_hem_data->fill($request->all())->save();
                } else {
                    if (!empty($request->hem_member_no) or!empty($request->hem_group) or!empty($request->hem_village) or!empty($request->hem_section) or!empty($request->hem_zilla)) {
                        $new_hem_info = new applicant_student_hem_info_model;
                        $new_hem_info->fill($request->all())->save();
                    }
                }
            }
            if ($request->is_family_member_of_hem_section == "no") {
                $prev_hem_data = applicant_student_hem_info_model::where('applicant_id', $id)->first();
                if ($prev_hem_data) {
                    $prev_hem_data->delete();
                }
            }

            if (!empty($request->inspection_no) or!empty($request->reference)) {
                $prev_data = applicant_student_office_copy_model::where('applicant_id', $id)->first();
                if ($prev_data) {
                    $office_copy_data = [
                        'inspection_no' => $request->inspection_no,
                        'reference' => $request->reference
                    ];
                    $prev_data->update($office_copy_data);
                } else {
                    $office_copy_data = [
                        'applicant_id' => $id,
                        'inspection_no' => $request->inspection_no,
                        'reference' => $request->reference
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
    public function destroy($id) {
        aplicant_student_model::where('applicant_id', $id)->delete();
        applicant_student_child_model::where('parent', $id)->delete();
        applicant_student_educational_q::where('applicant_id', $id)->delete();
        applicant_student_office_copy_model::where('applicant_id', $id)->delete();

        $my_file = "img/backend/aplicant_student/$id" . ".jpg";

        if (File::exists($my_file)) {
            File::Delete($my_file);
        }
    }

    public function image_upload(Request $request, $applicant_id) {
        $file_path = "img/backend/aplicant_student";
        $fil_name = $applicant_id . '.jpg';
        $request->file('image')->move($file_path, $fil_name);
    }

    public function remove_ex_edu_data(Request $request) {
        $deleted = applicant_student_educational_q::where('eqalification_id', $request->eqalification_id)->delete();
        return $deleted ? '200' : '403';
    }

}
