<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roster_model extends Model
{
    protected $table="roster";
    protected $primaryKey="roster_id";
    protected $fillable=['date','student_roll','component_id','amount'];
}
