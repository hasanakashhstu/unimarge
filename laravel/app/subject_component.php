<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class subject_component extends Model
{
    protected $primaryKey='subject_component_id';
    protected $fillable=['subject_id','component_id','subject_component_id'];
    protected $table='subject_component';
}