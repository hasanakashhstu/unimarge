<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aplicant_student_model extends Model {

    protected $fillable = ['applicant_id', 'student_name','father_name_bangla','mother_name_bangla','student_name_bangla', 'parent_name', 'relation', 'session', 'class', 'admission_test', 'department', 'section', 'birth_date', 'gender', 'postal_code', 'phone', 'email', 'batch', 'shift', 'medium', 'is_family_member_of_hem_section', 'father_name', 'mother_name', 'spouse_name', 'nationality', 'maritial', 'blood_group', 'nid_birth', 'phone_family', 'physically_challenged', 'credit_transfer', 'credit', 'cgpa', 'date_application', 'admission_status', 'semester', 'year', 'reg_no', 'student_id', 'degree_name', 'session_choose'];
    protected $table = 'applicant_student';
    protected $primaryKey = 'applicant_id';

    public function validation() {
        return ['student_name' => 'required',
            'father_name_bangla' => 'required',
            'mother_name_bangla' => 'required',
            'student_name_bangla' => 'required',
            'father_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nationality' => 'required',
            'maritial' => 'required',
            'blood_group' => 'required',
            'nid_birth' => 'required',
            'phone_family' => 'required',
            'credit_transfer' => 'required',
            'degree_name' => 'required',
            'session_choose' => 'required',
            'session' => 'required',
            'attached_photo' => 'required',
            'attached_signature' => 'required',
            'payment_transaction_id' => 'required',
            'payment_mobile_no' => 'required',
            
        ];
    }

    public function credit_transfer() {
        return ['student_name' => 'required',
            'father_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nationality' => 'required',
            'maritial' => 'required',
            'blood_group' => 'required',
            'nid_birth' => 'required',
            'phone_family' => 'required',
            'credit_transfer' => 'required',
            'degree_name' => 'required',
            'session_choose' => 'required',
            'session' => 'required',
            'attached_photo' => 'required',
            'attached_signature' => 'required',
            'payment_transaction_id' => 'required',
            'payment_mobile_no' => 'required',
            'credit_name_of_university' => 'required',
            'semester' => 'required',
            'credit' => 'required',
            'cgpa' => 'required',
            'date_application' => 'required',
            'admission_status' => 'required',
            'father_name_bangla' => 'required',
            'mother_name_bangla' => 'required',
            'student_name_bangla' => 'required',
        ];
    }

    public function website_validation() {
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
