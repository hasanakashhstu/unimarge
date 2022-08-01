<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_routine_end_child_model extends Model
{
   protected $table='class_routine_end_child';
    protected $primaryKey='parent';
    protected $fillable=['parent','class_ending_time'];
}
