<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $guarded = [];

    public function validationRules()
    {
        return [
            'department_id' => 'required|integer',
            'content'       => 'required|string',
        ];
    }

    public function department()
    {
        return $this->belongsTo(manage_department_model::class, 'department_id');
    }
}
