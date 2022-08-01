<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\api_unathorized;
use App\students;
use App\teacher_model;
use App\notice_board_model;
use App\manage_subject_model;
use App\templet_article_model;
class api_controller extends Controller
{

	public function check_authrized_api($token,$encrypt_email,$encrypt_password)
	{
		$TOKEN=$_ENV['APP_SECRET_KEY'];
    	
    	if($TOKEN == $token)
    	{
    		$email_decrypt=md5('api@api.com');
    		if($email_decrypt == $encrypt_email)
    		{
    			$find_user=User::where('email','api@api.com')->first();
    			$get_password=$find_user->password;
    			if($get_password == $encrypt_password)
    			{
    				return 'Authorized';
    			}
    		}
    		else
    		{
    			echo "Unathorized User";
    		}
    		//5911d00c64b30daaa92f40a85486ffb7

    		
    	}
    	else
    	{
    		echo "TOKEN MISMATCH";
    	}
}


    public function student_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$find_data=students::select('student_name','type','class','roll','reg_number','section','department','session','batch','shift','medium')->where('status','Active')->get();
    		return json_encode($find_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }


    public function teacher_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$teacher_data=teacher_model::select('teacher_id','teacher_name','fathers_name','mothers_name','birth_date','gender','religion','mobile_no','designation','type','job_type','work_department','medium','marital_status')->where('status','Teacher')->get();
    		return json_encode($teacher_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }



    public function staff_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$staff_data=teacher_model::select('teacher_name','fathers_name','mothers_name','birth_date','gender','religion','mobile_no','designation','type','job_type','work_department','medium','marital_status')->where('status','Staff')->get();
    		return json_encode($staff_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }



    public function notice_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$notice_data=notice_board_model::all();
    		return json_encode($notice_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }


    public function subject_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$subject_data=manage_subject_model::all();
    		return json_encode($subject_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }



      public function library_data($token,$encrypt_email,$encrypt_password)
    {
    	$authorized_check=$this->check_authrized_api($token,$encrypt_email,$encrypt_password);
    	if($authorized_check == "Authorized")
    	{
    		$library_data=templet_article_model::all();
    		return json_encode($library_data);
    	}
    	else
    	{
    		$this->information_store();
    		echo "You Are Unathorized User";
    	}

    }





    public function information_store()
    {
    	$information=$_SERVER;

    	$save_unathorized=new api_unathorized;
    	$information_json=json_encode($information);
    	$save_unathorized->unathorized_ip=$_SERVER['REMOTE_ADDR'];
    	$save_unathorized->information=$information_json;
    	$save_unathorized->save();
    	
    }
}
