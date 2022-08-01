<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark_component_mark_model extends Model
{
    protected $primaryKey='id';
    protected $table='manage_mark_component';
    protected $fillable=['id','student_roll','subject_name','component_id','component_name','component_grade','component_mark','exam_name'];
}
