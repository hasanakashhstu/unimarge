<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_structure_earning_component_model extends Model
{
    	protected $table='salary_structure_earning_component';
    	protected $primaryKey='parent';
		protected $fillable=['parent','earn_component_name','earn_formula','earn_amount'];
}
