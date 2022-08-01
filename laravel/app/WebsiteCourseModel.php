<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteCourseModel extends Model
{
    protected $table='website_course';
    protected $primaryKey='website_course_id';
    protected $fillable=['course_category_id','title','description','venue','schedule','amount','banner','trainner_name','trainner_image','available_seat','who_can_join','total_hours','start_date','end_date'];

    public  function validation(){
	  	return [
		    'course_category_id' => 'required',
		    'title' => 'required',
		    'description' => 'required',
		    'venue' => 'required',
		    'schedule' => 'required',
		    'amount' => 'required',
		    'banner' => 'required',
		    'trainner_name' => 'required',
		    'trainner_image' => 'required',
		    'available_seat' => 'required',
		    'who_can_join' => 'required',
		    'total_hours' => 'required',
		    'start_date' => 'required',
		    'end_date' => 'required',
		];
	}
}
