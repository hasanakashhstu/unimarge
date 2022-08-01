<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parent_notice_child_model extends Model
{
    protected $table='parent_notice_child';
    protected $primaryKey='notice_id';

    protected $fillable=['notice_id','pw_parents_name','pw_parents_email','pw_student_name','pw_student_roll'];
}
