<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_student_hem_info_model extends Model
{
    protected $table="applicant_student_hem_info";
    protected $primaryKey="applicant_student_hem_info_id";
    protected $fillable=['hem_member_no','hem_group','hem_village','hem_section','hem_zilla','applicant_id'];
}
