<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dormitory_model extends Model
{
   protected $table='manage_dormitory';
    protected $primaryKey='manage_dormitory_id';
    protected $fillable=['dormitory_title','dormitory_author','dormitory_no','dormitory_name','dormitory_floor','total_room_number','dormitory_location','description','manage_dormitory_id','total_seat_number'];

     public  function roles_rule(){
  		return [
	    'dormitory_title' => 'required',
	    'dormitory_author' => 'required',
	    'dormitory_no' => 'required',
	    'dormitory_name' => 'required',
	    'dormitory_floor' => 'required',
		'total_room_number' => 'required',
	    'dormitory_location' => 'required',
	    'description' => 'required',
	    'total_seat_number'=>'required'
	    ];
	}

}
