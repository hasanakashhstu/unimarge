<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dependent_relation_model extends Model
{
    protected $table='dependent_relation';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
