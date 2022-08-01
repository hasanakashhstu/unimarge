<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class divisions_model extends Model
{
    protected $table='divisions';
    protected $primaryKey='id';
   
    protected $fillable=['id','name','bn_name','url'];
   
    
}
