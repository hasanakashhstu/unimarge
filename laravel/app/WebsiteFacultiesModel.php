<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteFacultiesModel extends Model
{
    protected $table='website_faculties';
    protected $primaryKey='website_faculties_id';
    protected $fillable=['website_faculties_name','department_head','msg_from_head','lab_info'];

    public  function validation(){
	  	return [
		    'website_faculties_name' => 'required',
		    'department_head' => 'required',
		    'msg_from_head' => 'required',
		    'lab_info' => 'required',
		];
	}
}
