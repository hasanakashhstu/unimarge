<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_class_model extends Model
{
    protected $id='id';
    protected $table='manage_class';
    protected $fillable=['class_name','numeric_name','class_teacher','subject','class_department','class_program_type','class_code'];


    public function validation_rule()
    {
    	return [
    		'class_name'=>'required',
//    		'numeric_name'=>'required',
//    		'class_teacher'=>'required'
    	];
    }
}
