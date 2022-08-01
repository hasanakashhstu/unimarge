<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apprisal_templete_child extends Model
{
    protected $table='apprisal_templete_child';
    protected $primaryKey='parent';
    protected $fillable=['parent','kra','weightage'];
}
