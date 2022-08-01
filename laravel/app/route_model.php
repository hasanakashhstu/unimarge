<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class route_model extends Model
{
  protected $table='route_info';
    protected $primaryKey='route_id';
    protected $fillable=['name','fare','distance','hour','from','to','route_id'];

      public  function roles_rule(){
  		return [
	    'name' => 'required',
	    'fare' => 'required',
	    'distance' => 'required',
	    'hour' => 'required',
	    'from' => 'required',
		'to' => 'required',
	    
	    ];
     }

}

