<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_component_model extends Model
{
    protected $table='salary_component';
    protected $primaryKey='salary_component_id';
    protected $fillable=['components_name','abbr','type'];

    public  function rules_role(){

  		return [
		    'components_name' => 'required',
		    'abbr' => 'required',
		    'type' => 'required'
		    
			];
	}
}
