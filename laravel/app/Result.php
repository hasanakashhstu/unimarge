<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'file',
    ];

    public function validationRules($fileNullable = false)
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => $fileNullable ? 'nullable' : 'required' . '|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ];
    }
}
