<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_routine_model extends Model
{
    protected $table='class_routine';
    protected $primaryKey='class_routine_id';
    protected $fillable=['class_name',
                          'department',
                        'medium',
                        'section',
                         'class_day',
                         'class_routine_id',
                         'subject','teacher',
                    
                         ];


   public function validation()
    {
        return [
           'class_name'=>'required',
           'department'=>'required',
           'medium'=>'required',
            'section'=>'required',
            'class_day'=>'required',
            
            
        ];
    } 
}
