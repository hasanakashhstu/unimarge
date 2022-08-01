<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accountant_model extends Model
{
    protected $table='accountant';
    protected $primaryKey='accontant_id';
    protected $fillable=[
                        'medium',
                        'teacher_name',
                        'fathers_name',
                         'mothers_name',
                         'birth_date',
                         'gender',
                         'religion',
                         'mobile_no',
                         'job_type',
                         'work_department',
                         'marital_status',
                        'accontant_id',
                         'accountant_name'];


   public function validation()
    {
        return [
           'accountant_name'=>'required',
           'medium'=>'required',
            'fathers_name'=>'required',
            'mothers_name'=>'required',
            'birth_date'=>'required',
            'gender'=>'required',
            'marital_status'=>'required',
            'religion'=>'required',
            'mobile_no'=>'required',
            'job_type'=>'required',
            'work_department'=>'required'
        ];
    } 
}
