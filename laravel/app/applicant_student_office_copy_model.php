<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_student_office_copy_model extends Model
{
    protected $table="applicant_student_office_copy";
    protected $primaryKey="id";
    protected $fillable=['applicant_id','inspection_no','reference'];
}
