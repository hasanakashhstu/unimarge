<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_routine_start_child_model extends Model
{
     protected $table='class_routine_start_child';
    protected $primaryKey='parent';
    protected $fillable=['parent','class_starting_time'];
}
