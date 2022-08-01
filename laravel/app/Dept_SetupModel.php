<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept_SetupModel extends Model
{
    protected $table='department_setup';
    protected $primaryKey='department_setup_id';
    protected $fillable=['chairperson','study','department'];

    public  function validation(){
        return [
            'chairperson' => 'required',
            'study' => 'required',
            'department' => 'required',
        ];
    }

    public function getDepartment()
    {
        return $this->belongsTo(manage_department_model::class, 'department');
    }
}
