<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\students;
use App\general_settings_model;
class make_autoname extends Model
{
    public function autoname()
    {
    	$max_count=(int)students::max('id')+1;
    	$max_count_length=strlen($max_count);
    	 $zero_repet=4-$max_count_length;
    	$zero_r=str_repeat("0",$zero_repet);
    	$student_id=$max_count;

    	$current_year=date("y");
    	$default_batch=general_settings_model::select('default_batch')->first();
    	return $current_year.$student_id;
    }
}




