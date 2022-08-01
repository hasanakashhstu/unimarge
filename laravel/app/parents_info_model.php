<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parents_info_model extends Model
{
    protected $table='parents_info';
    protected $primaryKey='parent_id';
    protected $fillable=['name','email','password','phone','gender','profession','monthly_salary','parent_id'];

      public  function roles_rule(){
  		return [
	    'name' => 'required',
	    'email' => 'required',
	    'password' => 'required',
	    'phone' => 'required|numeric',
	    'gender' => 'required',
		'profession' => 'required',
	    'parents_image' => 'image|mimes:jpeg,png'
	    ];
	}
  
}
