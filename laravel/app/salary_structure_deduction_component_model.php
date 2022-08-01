<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_structure_deduction_component_model extends Model
{
    	protected $table='salary_structure_deduction_component';
    	protected $primaryKey='parent';
		protected $fillable=['parent','deduction_component_name','deduction_formula','deduction_amount'];
}
