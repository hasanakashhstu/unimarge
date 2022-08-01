<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteManagementModel extends Model
{
    protected $table='website_management';
    protected $primaryKey='website_management_id';
    protected $fillable=['name','designation','image'];

    public  function validation(){
	  	return [
		    'name' => 'required',
		    'designation' => 'required',
		    'image' => 'required',
		];
	}
}
