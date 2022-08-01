<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_notice_child_model extends Model
{
    protected $table='class_notice_child';
    protected $primaryKey='notice_id';

    protected $fillable=['notice_id','cw_class','cw_department','cw_section'];
}
