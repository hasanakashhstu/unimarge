<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academic_syllebus_model extends Model
{
    protected $table='academic_syllebus';
    protected $primaryKey='id';
    protected $fillable=['class_name',
                         'department',
                        'title',
                         'description',
                         'subject',
                         'medium',
                         'id'];
    
    
    public function validation()
    {
        return [
           'subject'=>'required',
           'medium'=>'required',
            'title'=>'required',
            'class_name'=>'required',
            'department'=>'required',
            'files'=>'required|mimes:pdf'
            
            
        ];
    }
}
