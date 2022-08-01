<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apprisals extends Model
{
    protected $table='apprisals';
    protected $primaryKey='apprisal_id';
    protected $fillable=[
                          'apprisal_id',
                          'medium',
                         'apprisal_type',
                         'apprisal_name',
                         'apprisal_template',
                         'start_date',
                         'end_date',
                         'total_score',
                        'remarks','apprisals','convert'];
    public function validation()
    {
        return ['apprisal_type'=>'required',
               'apprisal_name'=>'required',
               'medium'=>'required',
               'apprisal_template'=>'required',
               'start_date'=>'required',
               'end_date'=>'required',
               'Score'=>'required',
               'convert'=>'required',
               ];    
    }
    
}
