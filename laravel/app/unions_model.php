<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unions_model extends Model
{
    protected $table='unions';
    protected $primaryKey='id';
   
    protected $fillable=['id','upazilla_id','name','bn_name','url'];
   
    
}
