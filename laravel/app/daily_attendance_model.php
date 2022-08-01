<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daily_attendance_model extends Model
{
   protected $table='daily_attendance';
    protected $primaryKey='sl_no';

    protected $fillable=['student_id','device_id','date','class','department','time','status','class','subject'];
}
