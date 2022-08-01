<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quota_model extends Model
{
    protected $table='quota';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
