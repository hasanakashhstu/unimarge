<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteEventModel extends Model
{
	protected $table = 'website_event';
	protected $primaryKey = 'website_event_id';
	protected $fillable = ['title', 'description', 'type', 'department', 'image'];

	public  function validation($fileNull = false)
	{
		return [
			'title' => 'required|string',
			'description' => 'required|string',
			'type' => 'required|integer',
			'department' => 'required|integer',
			'image' => $fileNull ? 'nullable' : 'required' . '|image|mimes:jpg,jpeg,png|max:2048',
		];
	}
}
