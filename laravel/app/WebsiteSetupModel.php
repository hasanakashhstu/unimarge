<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetupModel extends Model
{
    protected $table='website_setup';
    protected $primaryKey='website_setup_id';
    protected $fillable=['about_us','history','mission_vision','vision','strategy','principle_message','providan_link','academic_calender_link','founder_message','chairman_message','video_link','overview','image'];

    public  function validation(){
	  	return [
		    'about_us' => 'required',
		    'history' => 'required',
		    'mission_vision' => 'required',
		    'principle_message' => 'required',
		    'providan_link' => 'required',
		    'academic_calender_link' => 'required',
		    'founder_message' => 'required',
		    'chairman_message' => 'required',
		    'video_link' => 'required',
		    'overview' => 'required',
		    'image' => 'required',
		    'vision' => 'required',
		    'strategy' => 'required',
		];
	}
}
