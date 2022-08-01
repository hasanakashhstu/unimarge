<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class general_settings_model extends Model
{
	protected $table = 'general_settings';
	protected $primaryKey = 'general_settings_id';

	protected $fillable = ['system_name', 'system_title', 'Phone', 'email', 'address', 'country', 'postal_code', 'school_eiin', 'general_settings_id', 'default_session', 'default_batch', 'admission_exam_venue', 'admission_exam_time', 'admission_exam_end_time', 'map_location', 'social_network_1', 'social_network_2', 'social_network_3', 'social_network_4',];
	public  function roles_rule()
	{
		return [
			'system_name' => 'required',
			'system_title' => 'required',
			'Phone' => 'required',
			'address' => 'required',
			'country' => 'required',
			'postal_code' => 'required',
			'school_eiin' => 'required',
			'school_logo' => 'image|mimes:png',
			'social_network_1' => 'required',
			'social_network_2' => 'required',
			'social_network_3' => 'required',
			'social_network_4' => 'required',
		];
	}
}
