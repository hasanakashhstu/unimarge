<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_access_model extends Model
{
   protected $fillable=['user_id','role_id'];
   // protected $primaryKey='id';
   protected $table='role_user';
}
