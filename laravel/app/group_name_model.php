<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_name_model extends Model
{
    protected $table='group_name';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
