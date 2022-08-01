<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expense_model extends Model
{
    protected $table='expense';
    protected $primaryKey='expense_id';
    protected $fillable=['journal_title','journal_type','asset_account','expense_account','amount_method','bank_name','cheque_no','status','remark','expense_id'];

    public  function expence_validate(){

  		return [
		    'journal_title' => 'required',
		    'journal_type' => 'required',
		   	
		    'amount_method' => 'required',
		    'status' => 'required',
		    
		    
			];
	}
}
