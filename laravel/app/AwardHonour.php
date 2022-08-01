<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardHonour extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function validationRules()
    {
        return [
            'teacher_id' => 'required|integer',
            'content'    => 'required|string',
        ];
    }

    public function teacher()
    {
        return $this->belongsTo(teacher_model::class, 'teacher_id');
    }
}
