<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_structure_model extends Model
{
    	protected $table='salary_structure';
    	protected $primaryKey='payroll_structure_id';
		protected $fillable=['payroll_structure_id','title','status','frequency','payment_acount','expense_acount'];

		public function General_validation()
		{
			return [
	            'payroll_structure_id' => 'required',
		        'title' => 'required',
	            'status'=>'required',
	            'frequency.*' => 'required',
	            'payment_acount' => 'required',
	            'expense_acount' => 'required',

	            'earn_component_name.*'=>'required',
	            // 'earn_formula.*'=>'required|required_if:earn_component_name,0',
	            // 'earn_component_name.*'=>'required|required_if:earn_formula,0',


	            'deduction_component_name.*'=>'required',
	            // 'deduction_formula.*'=>'required|required_if:deduction_amount,0',
	            // 'deduction_amount.*'=>'required|required_if:deduction_formula,0',

	            'teacher_or_staff_name.*'=>'required',
	            'from_date.*'=>'required',
	            'base.*'=>'required',
	            

           ];
		}
}

