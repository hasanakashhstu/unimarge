<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class board_name_model extends Model
{
    protected $table='board_name';
    protected $primaryKey='id';
   
    protected $fillable=['id','name'];
   
    
}
