<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteContactModel extends Model
{
    protected $table='website_contact';
    protected $primaryKey='id';
    protected $fillable=['name','designation','phone','email'];

    public  function validation(){
	  	return [
		    'name' => 'required',
		    'designation' => 'required',
		    'phone' => 'required',
		    'email' => 'required',
		];
	}
}
