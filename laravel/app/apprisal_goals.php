<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apprisal_goals extends Model
{
    protected $table='apprisal_goals';
    protected $primaryKey='id';
    protected $fillable=['parent',
                         'goals',
                         'weightage',
                         'score'];
}
