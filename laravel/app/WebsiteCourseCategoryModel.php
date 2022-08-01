<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteCourseCategoryModel extends Model
{
    protected $table='website_course_category';
    protected $primaryKey='id';
    protected $fillable=['name','description'];

    public  function validation(){
	  	return [
		    'name' => 'required',
		    'description' => 'required',
		];
	}
}
