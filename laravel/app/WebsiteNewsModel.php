<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteNewsModel extends Model
{
    protected $table = 'website_news';
    protected $primaryKey = 'website_news_id';
    protected $fillable = ['title', 'description', 'news_date', 'department', 'file'];

    protected $casts = [
        'news_date' => 'datetime',
    ];

    public function validation($fileNullable = false)
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'news_date' => 'required',
            'department' => 'required',
            'file' => $fileNullable ? 'nullable' : 'required' . '|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ];
    }

    public function getDepartment()
    {
        return $this->belongsTo(manage_department_model::class, 'department');
    }
}
