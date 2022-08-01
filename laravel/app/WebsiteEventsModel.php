<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteEventsModel extends Model
{
    protected $table = 'website_events';
    protected $primaryKey = 'website_events_id';
    protected $fillable = ['title', 'description', 'start_date', 'department', 'image'];
    protected $casts = [
        'start_date' => 'datetime',
    ];

    public function validation($fileNullIs = false)
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'department' => 'required|integer',
            'image' => $fileNullIs ? 'nullable' : 'required' . '|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function getDepartment()
    {
        return $this->belongsTo(manage_department_model::class, 'department');
    }
}
