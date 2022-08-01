<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class degree_name_model extends Model
{
    protected $table='applicant_degree_name';
    protected $primaryKey='id';
    protected $fillable=['id','name'];
}
