<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveClass extends Model
{
    protected $table = 'live_class';
    protected $fillable = ['topic','class_name','teacher_id','duration','department','start_time','end_time','subject','medium','session'];
}
