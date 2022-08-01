<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class salary_structure_teacher_staff_details_model extends Model
{
	use SoftDeletes;

	protected $table = 'salary_structure_teacher_staff_details';
	protected $primaryKey = 'parent';
	protected $fillable = ['parent', 'teacher_or_staff_name', 'from_date', 'base', 'variable'];
}
