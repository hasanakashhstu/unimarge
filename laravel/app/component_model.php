<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class component_model extends Model
{
     protected $table='component';
    protected $primaryKey='component_id';
    protected $fillable=['component_id','component_name','abbr', 'mark','calculate_percent'];
     public  function roles_rule()
      {
  		return [

  		'component_name'=>'required',
	    'abbr' => 'required'];
      }
}
