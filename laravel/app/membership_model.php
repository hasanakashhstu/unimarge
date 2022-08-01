<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membership_model extends Model
{
  
  
    protected $table='membership';
    protected $primaryKey='member_id';
     protected $fillable = ['member_id', 'member_name', 'roll_number','reg_number','status','email','phone','from_date','to_date','teacher_id','teacher_name','teacher_phone','teacher_email','type'];
      public  function student_roles_rule(){
  		return [
	    'member_name' => 'required',
	    'roll_number' => 'required',
	    'status' => 'required',
	    'email' => 'required',
	    'from_date' => 'required',
	    'to_date' => 'required',
	    'type'=>'required'
	    ];
	}

	public  function teacher_roles_rule(){
  		return [
	    'teacher_name' => 'required',
	    'teacher_id' => 'required',
	    'status' => 'required',
	    'teacher_email' => 'required',
	    'from_date' => 'required',
	    'to_date' => 'required',
	    'type'=>'required'
	    ];
	}
}
