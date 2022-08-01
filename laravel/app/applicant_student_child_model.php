<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_student_child_model extends Model
{
    protected $fillable = ['parent', 'post_office', 'home_district','division','upazilas','unions','village_name', 'present_post_office', 'present_home_district','present_division','present_upazilas','present_unions','present_village_name'];
    protected $table='applicant_student_child';
    protected $primaryKey='parent';
}
