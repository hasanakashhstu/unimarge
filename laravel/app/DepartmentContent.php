<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentContent extends Model
{
    protected $guarded = [];

    public function validationRules()
    {
        return [
            'department_id' => 'required|integer',
            'type'          => 'required|string',
            'content'       => 'required|string',
        ];
    }

    public function department()
    {
        return $this->belongsTo(manage_department_model::class, 'department_id');
    }
}
