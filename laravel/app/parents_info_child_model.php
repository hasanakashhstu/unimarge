<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parents_info_child_model extends Model
{
   protected $fillable = ['parent', 'post_office', 'home_district','division','village_name'];
    protected $table='parents_info_child';
    protected $primaryKey='parent';
}
