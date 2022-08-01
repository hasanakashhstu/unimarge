<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maritial_model extends Model
{
    protected $table='maritial';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
