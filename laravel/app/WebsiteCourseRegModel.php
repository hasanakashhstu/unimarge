<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteCourseRegModel extends Model
{
    protected $table='website_course_registration';
    protected $primaryKey='id';
    protected $fillable=['name','father_name','phone','registration_no','image','course_id'];

    public function validation(){
	  	return [
		    'name' => 'required',
		    'father_name' => 'required',
		    'phone' => 'required',
		    'registration_no' => 'required',
		    'course_id' => 'required',
		    'image' => 'required'
		];
	}
}
