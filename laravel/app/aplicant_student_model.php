<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aplicant_student_model extends Model
{
//    protected $fillable = ['applicant_id', 'student_name', 'parent_name','relation','session','class','admission_test','department','section','birth_date','gender','postal_code','phone','email','batch','shift','medium','is_family_member_of_hem_section','father_name','mother_name','spouse_name','nationality','maritial','blood_group','nid_birth','phone_family','physically_challenged','credit_transfer','credit','cgpa','date_application','degree_name','session_choose'];

    protected $fillable = ['applicant_id', 'student_name', 'parent_name','relation','admission_test','birth_date','gender','postal_code','phone','email','batch','is_family_member_of_hem_section','father_name','mother_name','spouse_name','nationality','maritial','blood_group','nid_birth','phone_family','physically_challenged','credit_transfer','credit_name_of_university','credit_completed_semester','credit','cgpa','date_application','admission_status','degree_name','session_choose', 'session','payment_transaction_id', 'payment_mobile_no', 'attached_photo', 'attached_signature', 'dependent_relation', 'dependent_profession', 'dependent_mobile_no', 'dependent_nid', 'dependent_monthly_income', 'dependent_no_of_brothers', 'dependent_no_of_sisters', 'dependent_no_of_edu_brothers', 'dependent_no_of_edu_sisters','religion'];
    protected $table='applicant_student';
    // protected $primaryKey='applicant_id';
    protected $primaryKey='applicant_id';

    public  function roles_rule(){

  		return [
	    'student_name' => 'required',
	    // 'parent_name' => 'required',
	    // 'relation' => 'required',
//	    'session' => 'required',
//	    'class' => 'required',
//	    'admission_test' => 'required',
//	    'department' => 'required',
//	    'birth_date' => 'required',
//	    'gender' => 'required',
//		'postal_code' => 'required',
//	    'phone' => 'required',
//	    'email' => 'required',
	    'image'=>'image|mimes:jpeg,png',
	    'signature'=>'signature|mimes:jpeg,png',
	    ];
	}

	public function website_validation(){
	    return ['student_name' => 'required',
//			    'parent_name' => 'required',
//			    'relation' => 'required',
//			    'session' => 'required',
			    'class' => 'required',
//			    'admission_test' => 'required',
			    'department' => 'required',
			    'birth_date' => 'required',
			    'gender' => 'required',
//				'postal_code' => 'required',
			    'phone' => 'required',
			    'email' => 'required',
			];
	}
}
