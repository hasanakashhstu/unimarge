<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_student_child_model extends Model {

    protected $fillable = ['parent', 'post_office', 'home_district', 'division', 'upazilas', 'unions', 'village_name', 'present_post_office', 'present_home_district', 'present_division', 'present_upazilas', 'present_unions', 'present_village_name'];
    protected $table = 'applicant_student_child';
    protected $primaryKey = 'parent';

    public function validation() {
        return ['division' => 'required',
            'home_district' => 'required',
            'upazilas' => 'required',
            'unions' => 'required',
            'post_office' => 'required',
            'village_name' => 'required',
            'present_division' => 'required',
            'present_home_district' => 'required',
            'present_upazilas' => 'required',
            'present_unions' => 'required',
            'present_post_office' => 'required',
            'present_village_name' => 'required',
            'dependent_relation' => 'required',
            'dependent_profession' => 'required',
            'dependent_mobile_no' => 'required',
            'dependent_monthly_income' => 'required',
            'dependent_no_of_brothers' => 'required',
            'dependent_no_of_sisters' => 'required',
            'dependent_no_of_edu_brothers' => 'required',
            'dependent_no_of_edu_sisters' => 'required',
            'dependent_no_of_edu_sisters' => 'required',
            'dependent_nid' => 'required',
            'legal_gurdian_name' => 'required',
            'legal_gurdian_name_bangla' => 'required',
            'legal_gurdian_relation' => 'required',
            'legal_gurdian_occupation' => 'required',
            'legal_gurdian_nid_no' => 'required',
            'legal_gurdian_contact_no' => 'required',
            'legal_gurdian_address' => 'required',
            
            'local_gurdian_name' => 'required',
            'local_gurdian_name_bangla' => 'required',
            'local_gurdian_relation' => 'required',
            'local_gurdian_occupation' => 'required',
            'local_gurdian_nid_no' => 'required',
            'local_gurdian_contact_no' => 'required',
            'local_gurdian_address' => 'required',
        ];
    }

}
