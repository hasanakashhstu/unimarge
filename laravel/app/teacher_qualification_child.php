<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher_qualification_child extends Model
{
    use SoftDeletes;

    protected $table = 'teacher_qualification_child';
    protected $primaryKey = 'parent';
    protected $fillable = ['parent', 'degree_name', 'board_name', 'passing_year', 'department_name'];
}
