<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_office_copy_model extends Model
{
    protected $table="student_office_copy";
    protected $primaryKey="id";
    protected $fillable=['student_roll','inspection_no','reference'];
}
