<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accountant_qualification_child extends Model
{
    protected $table='accountant_qualification_child';
    protected $primaryKey='parent';
    protected $fillable=['parent','degree_name','board_name','passing_year','department_name'];
}
