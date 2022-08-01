<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students_child extends Model
{
    protected $primaryKey='id';
    protected $fillable=['roll','post_office','home_district','division','village_name'];
    protected $table='students_child';
}
