<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark_general_details_model extends Model
{
      protected $table='mark_general_details';
    protected $primaryKey='general_details_id';
     protected $fillable = ['exam_name','class_name','section','Department','subject','default_session','entry_here','general_details_id'];
   

 
}
