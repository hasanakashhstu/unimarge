<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_section_model extends Model
{
    protected $table='manage_section';
    protected $primaryKey='id';
    protected $fillable=['section_name','nick_name','class'/*,'teacher'*/];

    public function validation()
    {
    	return [
    		'section_name'=>'required',
    		'nick_name'=>'required',
    		'class'=>'required',
//    		'teacher'=>'required'
    	];
    }
}
