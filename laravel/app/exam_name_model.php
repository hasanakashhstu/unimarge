<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_name_model extends Model
{
    protected $table='exam_name';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
