<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_educational_qualification_model extends Model
{
    protected $table='student_educational_qualification';
	protected $primaryKey='eqalification_id';
    protected $fillable =['student_roll', 'exam_name', 'borad','reg_no','roll_no','group','passing_year','gpa'];
}
