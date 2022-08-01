<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class canteen_component_model extends Model
{
    protected $table="canteen_component";
    protected $primaryKey="canteen_component_id";
    protected $fillable=['component_title','description','canteen_component_id'];

    public function rules()
    {

    	return [
                 'component_title'=>'required',
                 'description'=>'required'
    	       ];
    }
}
