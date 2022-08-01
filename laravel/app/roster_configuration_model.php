<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roster_configuration_model extends Model
{
    protected $table="roster_configuration";
    protected $primaryKey="id";
    protected $fillable=['default_component','id'];

    public function rules()
    {
    	return [
                'default_component'=>'required'
    	      ];
    }
}
