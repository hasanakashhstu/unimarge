<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question_paper_model extends Model
{
    protected $table='question_paper';
    protected $primaryKey='id';
    protected $fillable=['class_name',
                        'section_name',
                         'exam_name',
                         'department',
                         'teacher_name',
                         'id','file_extension','title'];
    
    
    public function validation()
    {
        return [
           'teacher_name'=>'required',
            'files'=>'required|max:10000|mimes:doc,docx,pdf,odt,csv,xlsx ',
            'exam_name'=>'required',
            
            
        ];
    }

    public function edit_validation()
    {
        return [
           'teacher_name'=>'required',
            // 'files'=>'required|max:10000|mimes:doc,docx,pdf,odt,csv,xlsx ',
            'exam_name'=>'required',
            
            
        ];
    }
}
