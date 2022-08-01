<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher_notice_child_model extends Model
{
    use SoftDeletes;
    
    protected $table='teacher_notice_child';
    protected $primaryKey='notice_id';

    protected $fillable=['notice_id','tw_teacher_name','tw_teacher_email','tw_subject'];
}
