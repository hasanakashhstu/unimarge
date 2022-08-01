<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class manage_department_model extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_name', 'class_name', 'medium', 'department_head_teacher_id', 'description', 'department_code', 'faculty_name', 'image'];
    protected $table = 'manage_department';
    protected $primaryKey = 'id';



    public function validation_rule()
    {
        return [
            'department_name' => 'required',
            'department_code' => 'required',
            'faculty_name' => 'required',
            'image' => 'required',

        ];
    }

    public function validation_edit_rule()
    {
        return [
            'department_name' => 'required',
            'department_code' => 'required',
            'faculty_name' => 'required',
            'image' => 'nullable',

        ];
    }

    public function teachers()
    {
        return $this->hasMany(teacher_model::class, 'department_id', 'id');
    }

    public function departmentHead()
    {
        return $this->belongsTo(teacher_model::class, 'department_head_teacher_id');
    }

    public function getFaculty()
    {
        return $this->belongsTo(manage_faculty_model::class, 'faculty_name');
    }
}
