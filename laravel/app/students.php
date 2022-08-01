<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'status', 'student_name', 'type', 'parent_name', 'relation', 'class', 'roll', 'reg_number', 'birth_date', 'gender', 'reponsible_teacher', 'phone', 'mobile', 'status', 'section', 'department', 'password', 'session', 'batch', 'shift', 'medium', 'is_family_member_of_hem_section'];
    protected $table = 'students';
    
    
    public function roles_rule()
    {
        
        return [
            'student_name' => 'required',
            // 'parent_name' => 'required',
            //'section' => 'required',
            'class' => 'required',
            // 'reg_number' => 'required',
            'birth_date' => 'required',
            'student_image' => 'image|mimes:jpeg',
        ];
    }
    
    
    public function admit_bulk_student_rules()
    {
        
        return [
            'class' => 'required',
            'department' => 'required',
            'section' => 'required',
            'student_name.*' => 'required',
            'roll.*' => 'required',
            'reg_number.*' => 'required',
            'shift' => 'required',
            'medium' => 'required',
        
        
        ];
    }
    
    
    public function student_info_edit()
    {
        
        return [
            'student_name' => 'required',
            // 'parent_name' => 'required',
            // 'relation' => 'required',
            'class' => 'required',
            'roll' => 'required',
            'reg_number' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'student_image' => 'image|mimes:jpeg',
        ];
    }
    
    
    public function addmission_test()
    {
        
        return [
            'student_roll.*' => 'required',
            'student_reg.*' => 'required',
            'result.*' => 'required',
            'admission_test' => 'required',
            'class' => 'required',
            'department' => 'required',
        
        
        ];
    }
    
}
