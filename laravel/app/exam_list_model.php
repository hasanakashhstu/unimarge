<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_list_model extends Model
{
    protected $table='exam_list';
    protected $primaryKey='id';
    protected $fillable=['exam_name','controller','exam_start_date','exam_end_date','publish'];

    public  function store_rules(){

  		return [
		    'exam_name' => 'required',
		    'controller' => 'required',
		    'exam_start_date' => 'required',
		    'exam_end_date' => 'required',
		    'publish' => 'required'
		    
			];
	}
}
