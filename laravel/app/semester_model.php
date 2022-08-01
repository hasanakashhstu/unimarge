<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester_model extends Model
{
    protected $table='semester';
    protected $primaryKey='id';
   
    protected $fillable=['id','semester_name'];
   
    
}
