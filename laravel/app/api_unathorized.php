<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class api_unathorized extends Model
{
    protected $table="unathorized_api";
    protected $primaryKey="id";
    protected $fillable=['unathorized_ip','information','id'];
}
