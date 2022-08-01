<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\class_routine_model;
use App\class_routine_end_child_model;
use App\class_routine_start_child_model;
use App\manage_subject_model;
use App\manage_section_model;
use App\teacher_model;
use App\article_issue_model;
use App\manage_class_model;
use App\daily_attendance_model;
use App\notice_board_model;
use App\class_notice_child_model;
use App\students;
use App\stuent_notice_child_model;
use App\general_settings_model;
class Student_dashboard extends Controller
{
    public function index()
    {
    	$user_auth_check=Session::get('student_or_parents_login');
    	if($user_auth_check=='Loggedin')
    	{
    	    
	    if(Session::has('class_url')){
            $url = Session::get('class_url');
            Session::forget('class_url');
            return redirect($url);
        }

         $roll=Session::get('roll');
         $class=Session::get('class');
         $students=students::where('roll',$roll)->first();
         $general_setting=general_settings_model::first();
         $issue_book=article_issue_model::where('member_roll',$roll)->get()->count();
         $subject_data=manage_subject_model::where('class',$class)->get()->count();
         $class_teacher=manage_class_model::where('class_name',$class)->first();


         $class_notice=class_notice_child_model::join('notice_board','class_notice_child.notice_id','=','notice_board.notice_id')
                   ->where('class_notice_child.cw_class',$class)->get();

        $student_notice=stuent_notice_child_model::join('notice_board','stuent_notice_child.notice_id','=','notice_board.notice_id')
                             ->where('stuent_notice_child.sw_student_roll',$roll)->get();


        $attendance=daily_attendance_model::where('student_id',$roll)->get()->count();

        $section=class_routine_model::where('class_name',$class)->groupby('section')->get();
        $teacher_details=teacher_model::where('status','Teacher')->get();
        $subject_info_class_wise=manage_subject_model::where('class',$class)->get();
        $section_class_wise=manage_section_model::where('class',$class)->get();

return view('student.index',['class_name'=>$class,'section'=>$section,'subject_info_class_wise'=>$subject_info_class_wise,'section_info_class_wise'=>$section_class_wise,'teacher_detials'=>$teacher_details,'issue_book'=>$issue_book,'subject_data'=>$subject_data,'class_teacher'=>$class_teacher,'attendance'=>$attendance,'class_notice'=>$class_notice,'student_notice'=>$student_notice,'students'=>$students,'general_setting'=>$general_setting]);

    	}
    	else
    	{
    		abort(404);
    	}

    }
}
