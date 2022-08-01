<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class year_model extends Model
{
    protected $table='year';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
