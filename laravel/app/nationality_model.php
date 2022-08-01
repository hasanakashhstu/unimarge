<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nationality_model extends Model
{
    protected $table='nationality';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
