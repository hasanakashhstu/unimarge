<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_mark_component_details_model extends Model
{
    protected $table='mark_component_details';
      protected $primaryKey='mark_component_id';
      protected $fillable = ['general_details_id','roll','component_id','component_name','component_mark','mark_component_id'];


}
