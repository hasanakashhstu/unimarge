<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class religion_model extends Model
{
    protected $table='religion';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
