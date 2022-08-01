<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_faculty_model extends Model
{
    protected $fillable=['faculty_name','faculty_code','chairperson','description'];
    protected $table='manage_faculty';
    protected $primaryKey='faculty_id';



    public function validation_rule()
    {
        return [
            'faculty_name'=>'required',
            'faculty_code'=>'required',
            'chairperson'=>'required'

        ];
    }

    public function getChairperson()
    {
        return $this->belongsTo(teacher_model::class, 'chairperson');
    }
}