<?php

namespace App\Http\Controllers;

use App\academic_syllebus_model;
use App\accountant_model;
use App\aplicant_student_model;
use App\apprisals;
use App\apprisal_component_model;
use App\article_issue_model;
use App\article_model;
use App\assign_dormitory_model;
use App\assign_transport_model;
use App\chart_of_accounts_model;
use App\component_model;
use App\create_admin_model;
use App\dormitory_model;
use App\exam_list_model;
use App\expense_model;
use App\general_settings_model;
use App\invoice_component_model;
use App\invoice_model;
use App\make_autoname;
use App\manage_class_model;
use App\manage_department_model;
use App\manage_mark_component_details_model;
use App\manage_mark_general_details_model;
use App\manage_section_model;
use App\manage_subject_model;
use App\manage_transport_model;
use App\membership_model;
use App\ov_setup_model;
use App\parents_info_model;
use App\permission_role_model;
use App\Role;
use App\route_model;
use App\salary_slip_model;
use App\stock_article_model;
use App\students;
use App\students_child;
use App\student_educational_qualification_model;
use App\student_hem_info_model;
use App\student_office_copy_model;
use App\Teacher;
use App\teacher_model;
use App\templet_article_model;
use App\user_access_model;
use Entrust;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Session;
use DB;

class ischool_report extends Controller {

    public function applicant_student_report() {
        abort_if(Auth::user()->cannot('view student'), 403);
        $data['applicant_student'] = DB::table('applicant_student')
                ->join('manage_department', 'manage_department.id', '=', 'applicant_student.department')
                ->select('applicant_student.*', 'manage_department.department_name')
                ->orderBy('applicant_id', 'desc')
                ->get();


        return view('admin.students.applicant_student_report', $data);
    }

    public function applicant_student_admit_card(Request $request) {
        date('H:i:s', time());
        $system_name = Session::get('school.system_name');
        $school_eiin = Session::get('school.school_eiin');
        $address = Session::get('school.address');
        $country = Session::get('school.country');
        $postal_code = Session::get('school.postal_code');
        $exam_venue = Session::get('school.admission_exam_venue');
        $exam_start_time = Session::get('school.admission_exam_time');
        $exam_end_time = Session::get('school.admission_exam_end_time');
        // return
        // echo Form::label('name','Name',['class'=>'control-label','title'=>'name']);
        $markshet_data = aplicant_student_model::where('applicant_id', $request->id)->first();

        $markshet = "<div class='modal-body'>";
        $markshet .= "<div class='text-center' style='background: #1F262D;color: #fff;padding: 1%;'>$system_name</div>";
        $markshet .= "<div class='text-left'>School EIIN : $school_eiin</div>";
        $markshet .= "<div class='text-left'>$address - $postal_code</div>";
        $markshet .= "<div class='text-left'>$country</div>";

        $markshet .= "<div class='text-center'><div class='text-left' style='font-family: Barcode;font-size:50px;margin-top: 3%;'>$request->id</div><div  style='text-align:center;margin-top:10px'><br></br>Permission Letter Cum Addmission Card (Center Copy / Admit Card) <hr></div>";
        $markshet .= "</div>";
        $markshet .= "<div style='float: left; width: 30%'>";

        $markshet .= "<div><img style='height: 144px;margin-top: 3%;width: 70%;border: 1px black solid;' src=\"img/backend/aplicant_student/$request->id.jpg\" onerror=\"this.src='img/blankavatar.png'\"  class='img-responsive'></div>";

        $markshet .= "<div style='font-size:11px;border: 1px black solid;height: 35px;width: 70%;margin-top: 2%;'>$markshet_data->student_name</div>";

        $markshet .= "</div>";

        $markshet .= "<div style='float: left; width: 70%'>";

        $markshet .= "<table>";

        $markshet .= "<tr>";
        $markshet .= "<td>Student ID</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->applicant_id</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Student Name</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->student_name</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>$markshet_data->relation Name</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->parent_name</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Session</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->session</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Semester</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->class</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Department</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->department</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Birth Date</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->birth_date</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Gender</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->gender</td>";
        $markshet .= "<tr>";

        $markshet .= "<tr>";
        $markshet .= "<td>Phone</td>";
        $markshet .= "<td>:</td>";
        $markshet .= "<td>$markshet_data->phone</td>";
        $markshet .= "<tr>";

        $markshet .= "</table>";
        $markshet .= "</div>";
        $markshet .= "<div class='text-left'><br><br></br>Examination Hall : $exam_venue</div>";
        $markshet .= "<div class='text-left'><hr>Exam Time : <input disabled='disabled' type='time' value=\"$exam_start_time\"> To <input type='time' disabled='disabled' value=\"$exam_end_time\"> </div>";

        $markshet .= "</div>";

        echo $markshet;
    }

    public function student_print($roll) {
        $students_parents_info = students::select('parent_name')->where('roll', $roll)->first();

        $student_child_info = students_child::select('roll')->where('roll', $roll)->first();
        $educational_info = student_educational_qualification_model::where('student_roll', $roll)->get();
        $office_copy_data = student_office_copy_model::where('student_roll', $roll)->first();
        $hem_info = student_hem_info_model::where('student_roll', $roll)->first();

        if ($student_child_info && $students_parents_info) {

            $data = students::join('students_child', 'students.roll', '=', 'students_child.roll')
                            ->join('parents_info', 'students.parent_name', '=', 'parents_info.parent_id')
                            ->where('students.roll', $roll)->first();

            return view('admin.students.student_print', ['student_data' => $data, 'educational_info' => $educational_info, 'office_copy_data' => $office_copy_data, 'hem_info' => $hem_info]);
        } else {
            echo "Sorry ! Please Fill This Student Neccessary Information For print Purpose Go To -> <a href=\"/student_information/$roll/edit\">Click Here<a/>";
        }
    }

    public function teacher_info_report() {
        abort_if(Auth::user()->cannot('view teacher'), 403);

        $data['teacher_report'] = Teacher::where('status', 'teacher')->latest()->get();

        return view('admin.Teacher_Staff.teacher_report', $data);
    }

    public function teacher_sort_update(Request $request) {
        $array = $request->all_teacher_data;
        if (count($array) > 0) {
            foreach ($array as $sort) {
                $teacher = teacher_model::where('teacher_id', $sort['id'])->first();
                if ($teacher) {
                    $teacher->sort_index = $sort['sort_id'];
                    $teacher->save();
                }
            }
        }

        return response()->json(['status' => 2000, 'message' => 'Successfully Updated'], 200);
    }

    public function parentreport() {
        abort_if(Auth::user()->cannot('view parent'), 403);

        return view('admin.Parents.parent_report', ['parents_info' => parents_info_model::all()]);
    }

    public function staff_report() {
        return view('admin.Teacher_Staff.staff_report', ['staff_information' => teacher_model::where('status', 'staff')->get()]);
    }

    public function daily_attendance_report() {
        abort_if(Auth::user()->cannot('view attendence'), 403);

        $medium = ov_setup_model::where('type', 'Medium')->get();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.Attendance.daily_attendance_report', ['class_data' => manage_class_model::all(), 'general' => general_settings_model::first(), 'medium' => $medium, 'session_get' => $session]);
    }

    public function payment_history() {
        return view('admin.Account.payment_history');
    }

    public function tabulation_sheet() {
        abort_if(Auth::user()->cannot('view report'), 403);

        $class = manage_class_model::all();
        $exam = exam_list_model::all();
        $default_session = general_settings_model::first();
        $all_session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.exam.tabulation_sheet', ['class' => $class, 'exam' => $exam, 'default_session' => $default_session, 'all_session' => $all_session]);
    }

    public function tabulation_data_get(Request $request) {

        abort_if(Auth::user()->cannot('view report'), 403);

        $student_data = students::where('class', $request->class_name)->where('session', $request->session)->get();

        $table = "<table class='table table-bordered'>";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th>Student Name</th>";
        $table .= "<th>Student Roll</th>";
        $subject_data = manage_subject_model::where('class', $request->class_name)->get();
        foreach ($subject_data as $subject_data_value) {
            $table .= "<th>$subject_data_value->subject_name</th>";
        }
        $table .= "<th>Total</th>";
        $table .= "<th>Average Grade Point</th>";
        $table .= "</tr>";
        $table .= "</thead>";

        $table .= "<tbody>";
        $table .= "<tr>";
        foreach ($student_data as $student_data_value) {
            $table .= "<td>$student_data_value->student_name</td>";
            $table .= "<td>$student_data_value->roll</td>";
            $total = 0;
            $total_mark = 0;
            foreach ($subject_data as $subject_data_mark_disto) {
                $t = manage_mark_general_details_model::leftJoin('manage_subject', 'mark_general_details.subject', '=', 'manage_subject.id')
                        ->where('mark_general_details.class_name', $request->input('class_name'))
                        ->where('mark_general_details.exam_name', $request->input('exam_name'))
                        ->where('mark_general_details.subject', $subject_data_mark_disto->id)
                        ->first();
                $t['mark'] = manage_mark_component_details_model::where('general_details_id', $t['general_details_id'])->where('roll', $student_data_value->roll)->sum('component_mark');

                $mark_find = isset($t["mark"]) && $t["mark"] > 0 ? $t["mark"] : 0;
                $table .= "<td>$mark_find</td>";
                if ($mark_find == '--') {
                    $total = 0;
                } else {
                    $total = $total + $mark_find;
                }
                $total_mark = $total_mark + $mark_find;
            }
            $table .= "<td>$total_mark</td>";
            $avg = $total_mark / count($subject_data);
            //IF ANY MARK IS EMPTY
            if ($avg == 0) {
                $avg = "Please Manage Mark First";
            }
            $table .= "<td>" . number_format((float) $avg, 2, '.', '') . "</td>";
            $table .= "</tr>";
        }
        $table .= "</tbody>";

        $table .= "</table>";
        echo $table;
    }

    public function student_apprisal_report() {
        $apprisal = apprisals::all();
        return view('admin.apprisal.student_apprisal_report', ['apprisals' => $apprisal]);
    }

    public function create_admin_report() {
        return view('admin.RBAC.create_admin_report');
    }

    public function accountant_excle() {

        Excel::create('Account Report Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Account.Export.accountant_excle', ['accountet_list' => accountant_model::all()]);
            });
        })->export('xls');
    }

    public function accountant_pdf() {

        $html = view('admin.Account.Export.accountant_pdf', ['accountet_list' => accountant_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function expense_excel() {

        Excel::create('Expense Report Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Account.Export.expense_excel', ['expense_info' => expense_model::all()]);
            });
        })->export('xls');
    }

    public function expense_pdf() {

        $html = view('admin.Account.Export.expense_pdf', ['expense_info' => expense_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function salary_slip_report_excle() {

        Excel::create('Salary Slip Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.payroll.Export.salary_slip_report_excle', ['salary_slip_info' => salary_slip_model::all()]);
            });
        })->export('xls');
    }

    public function salary_slip_report_pdf() {

        $html = view('admin.payroll.Export.salary_slip_report_pdf', ['salary_slip_info' => salary_slip_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function invoice_excel() {

        Excel::create('Invoice Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Account.Export.invoice_excel', ['invoice_data' => invoice_model::all()]);
            });
        })->export('xls');
    }

    public function invoice_pdf() {

        $html = view('admin.Account.Export.invoice_pdf', ['invoice_data' => invoice_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function invoice_component_excel() {

        Excel::create('Invoice Component Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Account.Export.invoice_component_excel', ["invoice_component_data" => invoice_component_model::all()]);
            });
        })->export('xls');
    }

    public function invoice_component_pdf() {

        $html = view('admin.Account.Export.invoice_component_pdf', ["invoice_component_data" => invoice_component_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function chart_of_account_excel() {

        Excel::create('Chart of Account Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Account.Export.chart_of_account_excel', ['accounts' => chart_of_accounts_model::all()]);
            });
        })->export('xls');
    }

    public function chart_of_account_pdf() {

        $html = view('admin.Account.Export.chart_of_account_pdf', ['accounts' => chart_of_accounts_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function create_admin_Excel_report() {

        Excel::create('Admin Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.RBAC.create_admin_excel_report', ['create_admin_data' => $data]);
            });
        })->export('xls');
        // $data=create_admin_model::all();
        // return view('admin.RBAC.create_admin_excel_report',['create_admin_data'=>$data]);
    }

    public function create_admin_pdf_report() {
        $data = create_admin_model::all();
        $html = view('admin.RBAC.create_admin_report', ['create_admin_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function route_excle() {

        Excel::create('Route Excle', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Transport.Export.route_excle', ['route_info' => route_model::all()]);
            });
        })->export('xls');
        // $data=create_admin_model::all();
        // return view('admin.RBAC.create_admin_excel_report',['create_admin_data'=>$data]);
    }

    public function route_pdf() {

        $html = view('admin.Transport.Export.route_pdf', ['route_info' => route_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function assign_transport_excle() {

        Excel::create('Assign Transport Excle', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Transport.Export.assign_transport_excle', ['assign_transport' => assign_transport_model::all()]);
            });
        })->export('xls');
    }

    public function assign_transport_pdf() {

        $html = view('admin.Transport.Export.assign_transport_pdf', ['assign_transport' => assign_transport_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function manage_transport_pdf() {

        $html = view('admin.Transport.Export.manage_transport_pdf', ['manage_transport_info' => manage_transport_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function manage_transport_excle() {

        Excel::create('Manage Transport Excle', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = create_admin_model::all();
                $sheet->loadview('admin.Transport.Export.manage_transport_excle', ['manage_transport_info' => manage_transport_model::all()]);
            });
        })->export('xls');
    }

    public function staff_report_pdf() {
        $data = teacher_model::where('status', 'staff')->get();
        $html = view('admin.Teacher_Staff.Export.staff_report_pdf', ['staff_report_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function teacher_report_pdf() {
        $data = teacher_model::where('status', 'teacher')->get();
        $html = view('admin.Teacher_Staff.Export.teacher_report_pdf', ['teacher_report_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function teacher_report_excle() {

        Excel::create('Teacher Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Teacher_Staff.Export.teacher_report_excle', ['teacher_report_data' => teacher_model::where('status', 'teacher')->get()]);
            });
        })->export('xls');
    }

    public function staff_report_excle() {

        Excel::create('Staff Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Teacher_Staff.Export.staff_report_excle', ['staff_report_data' => teacher_model::where('status', 'staff')->get()]);
            });
        })->export('xls');
    }

    public function daily_attendance_pdf() {
        // $student_info=students::where('class',$request->class_name)
        //          ->Where('section',$request->section)
        //          ->Where('department',$request->Department_info)->get();
        //      // echo $request->from_date_info;
        //      $date1=date_create((string)$request->from_date_info);
        //      $date2=date_create((string)$request->to_date_info);
        //      $found_date_diff=date_diff($date1,$date2);
        //      $date_diff=$found_date_diff->format('%d');
        //      $from_date=$request->from_date_info;
        //       $from_date=date('d-m-Y',strtotime($from_date));
        //       $table="<table class=\"table table-bordered data-table\">";
        //          $table.="<thead>";
        //              $table.="<tr>";
        //                   $table.="<th>Student Name</th>";
        //                  $table.="<th>Roll</th>";
        //                  for ($i=0;$i<$date_diff;$i++){
        //                      $calculate_date = strtotime($from_date . ' +1 day');
        //                      $from_date=date('d-m-Y',$calculate_date);
        //                   $table.="<th class=\"date\">$from_date</th>";
        //                   }
        //              $table.="</tr>";
        //          $table.="</thead>";
        //          $table.="<tbody>";
        //            foreach ($student_info as $value) {
        //              $table.="<tr>";
        //                  $table.="<td>$value->student_name</td>";
        //                  $table.="<td>$value->roll</td>";
        //                  $request_date=$request->from_date_info;
        //                  for ($i=0;$i<$date_diff;$i++)
        //                   {
        //                      $a = strtotime($request_date . ' +1 day');
        //                      $request_date=date('d-m-Y',$a);
        //                        $match_values=daily_attendance_model::where('student_id',$value->roll)->where('date',$request_date)->where('status','Present')->first();
        //                       if($match_values)
        //                       {
        //                           $table.="<td><input type=\"checkbox\" checked/></td>";
        //                       }
        //                       else
        //                       {
        //                           $table.="<td><input type=\"checkbox\"/></td>";
        //                       }
        //                   }
        //          }
        //          $table.="</tbody>";
        //      $table.="</table>";

        $data = templet_article_model::all();
        $html = view('admin.Attendance.Export.daily_attendance_pdf', ['data' => $data])->render();
        return PDF::load($html)->show();
    }

    public function templete_article_pdf() {
        $data = templet_article_model::all();
        $html = view('admin.Libray.Export.templete_article_pdf', ['templet_article_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function templete_article_excle() {

        Excel::create('Templete Article Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.templete_article_excle', ['templet_article_data' => templet_article_model::all()]);
            });
        })->export('xls');
    }

    public function stock_article_pdf() {
        $data = stock_article_model::all();
        $html = view('admin.Libray.Export.stock_article_pdf', ['stock_article_info' => $data])->render();

        return PDF::load($html)->show();
    }

    public function stock_article_excle() {

        Excel::create('Stock Article Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.stock_article_excle', ['stock_article_info' => stock_article_model::all()]);
            });
        })->export('xls');
    }

    public function article_pdf() {
        $data = article_model::all();
        $html = view('admin.Libray.Export.article_pdf', ['article_info' => $data])->render();

        return PDF::load($html)->show();
    }

    public function article_excle() {

        Excel::create(' Article Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.article_excle', ['article_info' => article_model::all()]);
            });
        })->export('xls');
    }

    public function membership_pdf() {
        $data = membership_model::all();
        $html = view('admin.Libray.Export.membership_pdf', ['membership_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function membership_excle() {

        Excel::create('Membership Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.membership_excle', ['membership_data' => membership_model::all()]);
            });
        })->export('xls');
    }

    public function article_issue_pdf() {
        $data = article_issue_model::where('status', 'Issue')->get();
        $html = view('admin.Libray.Export.article_issue_pdf', ['article_issue_info' => $data])->render();

        return PDF::load($html)->show();
    }

    public function article_issue_excle() {

        Excel::create(' Article Issue Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.article_issue_excle', ['article_issue_info' => article_issue_model::where('status', 'Issue')->get()]);
            });
        })->export('xls');
    }

    public function article_recive_pdf() {
        $data = article_issue_model::where('status', 'Recived')->get();
        $html = view('admin.Libray.Export.article_recive_pdf', ['article_recive_info' => $data])->render();

        return PDF::load($html)->show();
    }

    public function article_recive_excle() {

        Excel::create(' Article Recived Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Libray.Export.article_recive_excle', ['article_recive_info' => article_issue_model::where('status', 'Recived')->get()]);
            });
        })->export('xls');
    }

    public function manage_dormitory_pdf() {
        $data = dormitory_model::all();
        $html = view('admin.Dormitory.Export.manage_dormitory_pdf', ['dormitory_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function manage_dormitory_excle() {

        Excel::create('Manage Dormitory Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Dormitory.Export.manage_dormitory_excle', ['dormitory_data' => dormitory_model::all()]);
            });
        })->export('xls');
    }

    public function assign_dormitory_excle() {

        Excel::create('Assign Dormitory Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Dormitory.Export.assign_dormitory_excle', ['assign_dormitory_data' => assign_dormitory_model::all()]);
            });
        })->export('xls');
    }

    public function assign_dormitory_pdf() {
        $data = assign_dormitory_model::all();
        $html = view('admin.Dormitory.Export.assign_dormitory_pdf', ['assign_dormitory_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function academic_syllabus_download($class, $subject) {
        if (Entrust::can('ACADEMIC_SYLLABUS')) {
            $id = $class . "_" . $subject;
            if (file_exists("img/backend/academic_syllabus/$id.pdf")) {
                return response()->download("img/backend/academic_syllabus/$id.pdf");
            } else {
                Session::flash('Error', 'File Not Exist');
                return back();
            }
        } else {
            abort(403);
        }
    }

    public function create_role_pdf_report() {
        $data = Role::all();
        $html = view('admin.RBAC.Export.create_role_pdf', ['role_data' => $data])->render();

        return PDF::load($html)->show();
    }

    public function create_role_Excel_report() {

        Excel::create('Role Excel', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.RBAC.Export.create_role_excel', ['role_info' => role::all()]);
            });
        })->export('xls');
    }

    public function manage_section_pdf() {
        $html = view('admin.class.Export.manage_section_pdf', ['section_list' => manage_section_model::all(), 'groupby_class' => manage_section_model::groupby('class')->get()])->render();

        return PDF::load($html)->show();
    }

    public function manage_section_excle() {
        Excel::create('Manage Section Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.class.Export.manage_section_excle', ['section_list' => manage_section_model::all(), 'groupby_class' => manage_section_model::groupby('class')->get()]);
            });
        })->export('xls');
    }

    public function manage_department_pdf() {
        $html = view('admin.class.Export.manage_department_pdf', ['department' => manage_department_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function manage_department_excle() {
        Excel::create('Manage Department Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.class.Export.manage_department_excle', ['department' => manage_section_model::all(), 'groupby_class' => manage_department_model::all()]);
            });
        })->export('xls');
    }

    public function role_based_permission_pdf_report() {
        $data = permission_role_model::groupby('role_id')->get();
        $html = view('admin.RBAC.Export.role_based_permission_pdf', ['role_based_permission' => $data])->render();

        return PDF::load($html)->show();
    }

    public function role_permission_excel() {
        Excel::create('Role Based Permission', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $data = permission_role_model::groupby('role_id')->get();
                $sheet->loadview('admin.RBAC.Export.role_based_permission_excel', ['role_based_permission' => $data]);
            });
        })->export('xls');
    }

    public function user_access_export() {

        $html = view('admin.RBAC.Export.user_access_export_pdf', ['user_access' => user_access_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function user_access_export_excel() {
        Excel::create('User Access Excel Sheet', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.RBAC.Export.user_access_export_excel', ['user_access' => user_access_model::all()]);
            });
        })->export('xls');
    }

    public function parents_report_pdf() {
        $html = view('admin.Parents.Export.parents_report_export_as_pdf', ['parents_info' => parents_info_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function parents_report_excel() {
        Excel::create('Parents Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.Parents.Export.parents_report_excel', ['parents_info' => parents_info_model::all()]);
            });
        })->export('xls');
    }

    public function component_pdf() {
        $html = view('admin.subject.Export.component_pdf', ['component_data' => component_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function component_excel() {
        Excel::create('Component Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.subject.Export.component_excel', ['component_data' => component_model::all()]);
            });
        })->export('xls');
    }

    public function manage_class_pdf() {
        $html = view('admin.class.Export.class_report_pdf', ['manage_class' => manage_class_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function manage_class_excel() {
        Excel::create('Class Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.class.Export.class_report_excle', ['manage_class' => manage_class_model::all()]);
            });
        })->export('xls');
    }

    public function applicant_student_pdf() {
        $html = view('admin.students.Export.applicant_student_pdf_report', ['applicant_student' => aplicant_student_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function applicant_student_excel() {
        Excel::create('Applicant Student', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.students.Export.applicant_student_excel', ['applicant_student' => aplicant_student_model::all()]);
            });
        })->export('xls');
    }

    public function academic_syllabus_pdf() {
        $html = view('admin.class.Export.academic_syllabus_pdf', ['academic_syllabus' => academic_syllebus_model::all()])->render();

        return PDF::load($html)->show();
    }

    public function academic_syllabus_excle() {
        Excel::create('Academic Syllabus Report', function ($excel) {
            $excel->sheet('Excel sheet', function ($sheet) {
                $sheet->setOrientation('landscape');
                $sheet->loadview('admin.class.Export.academic_syllabus_excle', ['academic_syllabus' => academic_syllebus_model::all()]);
            });
        })->export('xls');
    }

    public function admission_test_student(Request $request) {

        $addmission_student_list = aplicant_student_model::where('admission_test', $request->addmission_test)
                        ->where('department', $request->department)
                        ->where('session', $request->session)
                        ->where('shift', $request->shift)
                        ->where('batch', $request->batch)
                        ->where('medium', $request->medium)
                        ->where('status', 'Applicant')->get();

        $table = "<table class=\"table table-bordered table-striped\">";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th style=\"width: 20%\">Student Name</th>";
        $table .= "<th style=\"width: 10%\">Result</th>";
        $table .= "<th style=\"width: 15%\"class=''>Class</th>";
        $table .= "<th style=\"width: 15%\"class=''>Department</th>";
        $table .= "<th style=\"width: 15%\"class=''>Roll No</th>";
        $table .= "<th style=\"width: 15  %\"class=''>Regestration No</th>";
        $table .= "<th style=\"width: 15  %\"class=''>Shift Enrol</th>";
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody>";

        foreach ($addmission_student_list as $key => $addmission_student_list_data) {

            $table .= "<tr style=\"text-align: center;\">";
            $table .= "<td>$addmission_student_list_data->student_name <input  name='student_name' type='hidden' value=\"$addmission_student_list_data->student_name\"><input  name='applicant_id[]' type='hidden' value=\"$addmission_student_list_data->applicant_id\"></td>";

            $table .= "<td>";
            $table .= "<select style=\"width:100px\" name=\"result[]\" onclick=\"this_test(this)\" class=\"addmission_student_status\">";
            $table .= "<option value=\"Pass\">Pass</option>";
            $table .= "<option value=\"Fail\">Fail</option>";
            $table .= "</select>";
            $table .= "</td>";

            $table .= "<td>$addmission_student_list_data->class <input name='class' type='hidden' value=\"$addmission_student_list_data->class\"></td>";
            $table .= "<td>$addmission_student_list_data->department <input name='department' type='hidden' value=\"$addmission_student_list_data->department\"> </td>";

            $roll_generate = new make_autoname;
            $roll = $roll_generate->autoname() + $key;

            $table .= "<td><input name=\"student_roll[]\" disabled value=\"$roll\" class=\"student_roll_rege\" type='text'>
                  <input name=\"student_roll[]\" value=\"$roll\" class=\"student_roll_rege\" type='hidden'></td>";
            $table .= "<td><input name=\"student_reg[]\" class=\"student_roll_rege\" type='text'></td>";

            $shift = ov_setup_model::where('type', 'Shift')->get();

            $table .= "<td>";
            $table .= "<select style=\"width:100px\" name=\"shift_enroll[]\" onclick=\"this_test(this)\" class=\"addmission_student_status\">";
            $table .= "<option>$addmission_student_list_data->shift</option>";

            foreach ($shift as $value) {
                $table .= "<option value=\"$value->type_name\">$value->type_name</option>";
            }

            $table .= "</select>";
            $table .= "</td>";

            $table .= "</tr>";
        }

        $table .= "</tbody>";
        $table .= "</table>";

        echo $table;
    }

    public function Class_w_section_filter(Request $request) {

        echo "<option value=''>Choose Section Name</option>";
        $section_data = manage_section_model::groupby('section_name')->where('class', $request->class_name)->get();

        foreach ($section_data as $section_data_table) {
            echo "<option>$section_data_table->section_name</option>";
        }
    }

    public function class_w_department_filter(Request $request) {

        $department_data = manage_department_model::groupby('department_name')->where('class_name', $request->class_name)->get();
        echo "<option value=''>Choose Department Name</option>";
        foreach ($department_data as $department_data_table) {
            echo "<option>$department_data_table->department_name</option>";
        }
    }

    public function department_wise_subject_get(Request $request) {
        $subject_data = manage_subject_model::where('class', $request->class_name)
                ->where('section', $request->section_info)
                ->where('department', $request->department)
                ->get();
        echo "<option value=''>Choose Subject</option>";
        foreach ($subject_data as $subject_data_table) {
            echo "<option value='$subject_data_table->id'>$subject_data_table->subject_name</option>";
        }
    }

    public function apprisal_template_report() {

        return view('admin.apprisal.Report.apprisal_template_report', ['student_apprisal_report' => apprisal_component_model::all()]);
    }

    public function notice_board_student_data_get(Request $request) {

        return students::where('roll', $request->student_roll)->first();
    }

    public function teacher_data_get_for_library(Request $request) {
        return teacher_model::where('employment_id', $request->teacher_id)->where('status', 'Teacher')->first();
    }

    public function class_data_check(Request $request) {

        return manage_class_model::where('class_name', $request->class_name)->first();
    }

    public function class_wise_subject(Request $request) {

        $subject_data = manage_subject_model::where('class', $request->class_name)->get();
        // echo "<option>Choose Subject</option>";
        foreach ($subject_data as $subject_data_list) {
            echo "<option>$subject_data_list->subject_name</option>";
        }
    }

    public function class_wise_department(Request $request) {

        $department_data = manage_department_model::where('class_name', $request->class_name)->get();
        // echo "<option>Choose Subject</option>";
        foreach ($department_data as $department_data_list) {
            echo "<option>$department_data_list->department_name</option>";
        }
    }

    //   return students::where('roll',$request->student_roll)->first();
    // }
    public function student_data_get(Request $request) {
        return students::where('roll', $request->student_roll)->first();
    }

    public function route_wise_data(Request $request) {
        return route_model::where('name', $request->route_name)->first();
    }

    public function transport_wise_data(Request $request) {
        return manage_transport_model::where('name_of_transport', $request->name_transport)->first();
    }

    public function member_wise_data(Request $request) {
        return membership_model::where('roll_number', $request->roll_number)->first();
    }

    public function member_wise_teacher_data(Request $request) {
        return membership_model::where('teacher_id', $request->teacher_id)->first();
    }

    public function article_id_wise_data(Request $request) {

        return article_model::where('accession_code', $request->article_id)->first();
    }

    public function article_id_issue_data(Request $request) {
        return article_issue_model::where('article_id', $request->article_id)->where('status', 'Issue')->first();
    }

    public function article_filter_data(Request $request) {
        return templet_article_model::where('article_name', $request->article_name)->first();
    }

    public function notice_board_teacher_data_get(Request $request) {
        return teacher_model::where('teacher_name', $request->teacher_name)->first();
    }

    public function notice_board_class_data_get(Request $request) {
        return manage_department_model::join('manage_section', 'manage_department.class_name', '=', 'manage_section.class')
                        ->where('manage_department.class_name', $request->class_name)->first();
    }

    public function notice_board_parents_data_get(Request $request) {
        return parents_info_model::where('name', $request->parents_name)->first();
    }

    public function notice_board_students_data_get(Request $request) {
        return students::join('parents_info', 'students.parent_name', '=', 'parents_info.parent_id')
                        ->where('students.roll', $request->student_roll)->first();

        //return students::where('roll',$request->student_roll)->first();
    }

    public function salary_structure_teacher_name() {
        $teacer_name = teacher_model::all();

        foreach ($teacer_name as $teacer_name_data) {
            echo "<option value=$teacer_name_data->teacher_id>$teacer_name_data->teacher_name</option>";
        }
    }

    public function class_w_subject_filter(Request $request) {

        $subject_name = manage_subject_model::where('class', $request->class_name)->get();
        echo "<option>Chose Subject Name</option>";
        foreach ($subject_name as $subject_name_data) {
            echo "<option>$subject_name_data->subject_name</option>";
        }
    }

    public function class_w_subject_filter_another(Request $request) {
        $subject_name = manage_subject_model::where('class', $request->class_name)->get();
        echo "<option>Chose Subject Name</option>";
        foreach ($subject_name as $subject_name_data) {
            echo "<option value=" . $subject_name_data->id . ">$subject_name_data->subject_name</option>";
        }
    }

}
