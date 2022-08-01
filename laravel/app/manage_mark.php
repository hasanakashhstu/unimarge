<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark extends Model
{
    protected $primaryKey='exam_id';
    protected $table='manage_mark';
    protected $fillable=['exam_id','exam_name','class_name','section','Department','subject','entry_here','default_session'];


   
}
