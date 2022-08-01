<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    
    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';
    protected $fillable = [
        'status',
        'teacher_name',
        'fathers_name',
        'mothers_name',
        'photo',
        'birth_date',
        'gender',
        'religion',
        'mobile_no',
        'designation',
        'type',
        'job_type',
        'work_department',
        'medium',
        'marital_status',
        'teacher_id',
        'department_id',
        'user_id',
        'email',
        'employment_id',
        'social_network_1',
        'social_network_2',
        'social_network_3',
        'social_network_4',
        'faculty_id',
    ];


    public function validation()
    {
        return [
            'teacher_name' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'mobile_no' => 'required',
            // 'job_type'=>'required',
            'work_department' => 'required',
            'medium' => 'nullable',
            'employment_id' => 'required',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'social_network_1' => 'required',
            'social_network_2' => 'required',
            'social_network_3' => 'required',
            'social_network_4' => 'required',
            'faculty_id' => 'required|integer',

        ];
    }

    public function validation_edit()
    {
        return [
            'teacher_name' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'mobile_no' => 'required',
            // 'job_type' => 'required',
            'employment_id' => 'required',
            'work_department' => 'required',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'faculty_id' => 'required|integer',
        ];
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'teacher_id');
    }

    public function awardHonours()
    {
        return $this->hasMany(AwardHonour::class, 'teacher_id');
    }

    public function department()
    {
        return $this->belongsTo(manage_department_model::class, 'department_id');
    }

    public function address()
    {
        return $this->hasOne(teacher_address_child::class, 'parent');
    }
}
