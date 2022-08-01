<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_component_model extends Model
{
    protected $primaryKey='invoice_component_id';
    protected $fillable=['component_name','set_max_value','set_min_value','payment_term','income_account','asset_account','invoice_component_id'];
    protected $table='invoice_component';

    public function validation_rule()
    {
    	return[
            'component_name'=>'required',
            'income_account'=>'required',
    		'asset_account'=>'required',
    		'payment_term'=>'required'
    	];
    }
}
