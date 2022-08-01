<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_student_educational_q extends Model
{
	protected $table='applicant_student_educational_q';
	protected $primaryKey='eqalification_id';
    protected $fillable =['applicant_id', 'exam_name', 'borad','reg_no','roll_no','group','passing_year','gpa'];
    
    
}
