<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reference_model extends Model {

    protected $table = 'applicant_reference_tbl';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'applicant_id', 'reference_name', 'reference_designation', 'reference_institute_name', 'reference_id_no', 'reference_mobile_no', 'reference_name1', 'reference_designation1', 'reference_institute_name1', 'reference_id_no1', 'reference_mobile_no1'];

    public function validation() {
        return ['reference_name' => 'required',
            'reference_designation' => 'required',
            'reference_institute_name' => 'required',
            'reference_id_no' => 'required',
            'reference_mobile_no' => 'required',
            'reference_name1' => 'required',
            'reference_designation1' => 'required',
            'reference_institute_name1' => 'required',
            'reference_id_no1' => 'required',
            'reference_mobile_no1' => 'required',
        ];
    }

}
