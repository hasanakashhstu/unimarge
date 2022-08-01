<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program_type_model extends Model
{
    protected $fillable=['program_type','description'];
    protected $table='program_type';
    protected $primaryKey='id';

    public function validation_rule()
    {
    	return ['program_type'=>'required'];
    }
}
