<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assign_dormitory_model extends Model
{
     protected $table='assign_dormitory';
    protected $primaryKey='assign_dormitory_id';
    protected $fillable=['title','student_name','student_roll','department','student_roll','semester','dormitory_no','dormitory_name','room_number','description','assign_dormitory_id','seat_number','arrive_date'];

      public  function roles_rule(){
  		return [
	    'title' => 'required',
	    'student_name' => 'required',
	    'student_roll' => 'required',
	    'department' => 'required',
	    'semester'  =>'required',
		'dormitory_no' => 'required',
		'dormitory_name' => 'required',
	    'room_number' => 'required',
		'description' => 'required',
		'seat_number'=>'required',
		'arrive_date'=>'required'
	    ];
     }
}
    