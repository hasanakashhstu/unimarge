<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assign_canteen_model extends Model
{
    protected  $table="assign_canteen";
    protected  $primaryKey="assign_canteen_id";
    protected  $fillable=['title','student_roll','student_name','department','class','description','assign_canteen_id'];

    public function rules()
    {
      return [
                 'student_roll'=>'required',
                 'student_name'=>'required',
                 'department'=>'required',
                 'class'=>'required'
             ];


    }
}
