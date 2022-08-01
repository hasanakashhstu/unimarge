<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ov_setup_model extends Model
{
    protected $table='ov_setup';
    protected $primaryKey='id';
   
    protected $fillable=['id','type','type_name'];
   
    
}
