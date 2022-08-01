<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark_child extends Model
{
    protected $primaryKey='parents';
    protected $table='manage_mark_child';
    protected $fillable=['exam_id','exam_name','class_name','section_name','department_name','subject','entry_here'];
}
