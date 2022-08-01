<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_grade_model extends Model
{
    protected $table='exam_grade_list';
    protected $primaryKey='id';
    protected $fillable=['grade_name',
                        'grade_point',
                        'mark_from',
                        'mark_upto',
                        'grade_for'
                         ];


   public function validation($id=0)
    {
        return [
          'grade_name'=>'required',
           'grade_point'=>'required',
           'mark_from'=>'required',
           'mark_upto'=>'required',
           'grade_for'=>'required',        
        ];
    } 
}
