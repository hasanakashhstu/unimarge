<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blood_group_model extends Model
{
    protected $table='blood_group';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
