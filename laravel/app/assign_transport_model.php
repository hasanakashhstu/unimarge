<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assign_transport_model extends Model
{
    protected $table='assign_transport';
    protected $primaryKey='transport_id';
    protected $fillable=['route_name','name_transport','transport_color','number_of_transport','student_roll','route_fare','transport_id'];

      public  function roles_rule(){
  		return [
	    'route_name' => 'required',
	     'name_transport' => 'required',
	    'transport_color' => 'required',
	    'number_of_transport' => 'required',
	    'transport_color' => 'required',
	    'student_roll' => 'required',
		'route_fare' => 'required',
	    
	    ];
     }
}
