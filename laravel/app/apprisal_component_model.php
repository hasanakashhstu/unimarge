<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apprisal_component_model extends Model
{
    protected   $table='apprisal_template';
    protected   $primaryKey='template_id';
    protected   $fillable=['template_id','title','active_status'];
    
    public function validation()
    {
        return  ['title'=>'required',
                 'active_status'=>'required',
                 'kra.*'=>'required',
                 'weightage.*'=>'required',
                ];    
    }
}


