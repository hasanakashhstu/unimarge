<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upazilas_model extends Model
{
    protected $table='upazilas';
    protected $primaryKey='id';
   
    protected $fillable=['id','district_id','name','bn_name','url'];
   
    
}
