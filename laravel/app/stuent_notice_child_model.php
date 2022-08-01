<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stuent_notice_child_model extends Model
{
    	protected $table='stuent_notice_child';
    	protected $primaryKey='notice_id';

    	protected $fillable=['notice_id','sw_student_name','sw_student_email','sw_student_roll','sw_student_class','sw_student_section'];
}
