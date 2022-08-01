<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class former_head_model extends Model
{
    protected $table = 'former_head';
    protected $primaryKey = 'former_head_id';
    protected $fillable = ['former_head_text', 'department_id'];

    public  function validation()
    {
        return [
            'former_head_text' => 'required',
            'department_id' => 'required',
        ];
    }

    public function department()
    {
        return $this->belongsTo(manage_department_model::class, 'department_id');
    }
}
