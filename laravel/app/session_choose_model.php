<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class session_choose_model extends Model
{
    protected $table='session_choose';
    protected $primaryKey='id';
    protected $fillable=['id','name'];
}
