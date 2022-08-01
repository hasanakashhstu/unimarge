<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profession_model extends Model
{
    protected $table='profession';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
