<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts_model extends Model
{
    protected $table='districts';
    protected $primaryKey='id';
   
    protected $fillable=['id','division_id','name','bn_name','lat','lon','url'];
   
    
}
