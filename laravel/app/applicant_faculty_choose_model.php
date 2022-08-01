<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicant_faculty_choose_model extends Model
{
    protected $table='applicant_faculty_choose';
    protected $primaryKey='id';
   
    protected $fillable=['id','applicant_id', 'medium','department','class','section','shift'];
}
