<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark_student_details_model extends Model
{
      protected $table='mark_student_details';
      protected $primaryKey='student_details_id';
      protected $fillable = ['roll','general_details_id','cgpa','grade_name','comment','student_details_id'];

     
}
