<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_templete_model extends Model
{
    protected $primaryKey='id';
    protected $fillable=['templete_json','medium'];
    protected $table='invoice_templete';


    public  function roles_rule(){

  		return [
	    'invoice_type' => 'required'
	    ];
	}
}
