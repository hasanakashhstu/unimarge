<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_subject_model extends Model
{
    protected $primaryKey='id';
    protected $fillable=['subject_name','class','department','section','medium','teacher','user','subject_code','subject_mark','subject_credit','type','id'];
    protected $table='manage_subject';

    public function validation_rule()
    {
    	return[
    		'subject_name'=>'required',
            'subject_code'=>'required',
            'subject_mark'=>'required',
            'subject_credit'=>'required',
            'class'=>'required',
    		'medium'=>'required',
            'teacher'=>'required',
            'department'=>'required',
            'section'=>'required',
    		'type'=>'required'
    	];
    }
}
