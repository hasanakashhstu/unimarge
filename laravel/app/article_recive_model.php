<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_recive_model extends Model
{
     protected $table='article_recive';
    protected $primaryKey='article_recive_id';
   
    protected $fillable=['article_id','article_name','member_name','member_roll','issue_date','return_date','e_mail','phone','total_day','article_recive_id','teacher_id','teacher_name','teacher_email','teacher_phone','type'];

      public  function student_roles_rule()
      {
  		return [

  		'article_id'=>'required',
	    'article_name' => 'required',
		'member_name' => 'required',
		'member_roll' => 'required',
		'issue_date' =>'required',
	    'return_date' => 'required',
	    'e_mail' => 'required',
	    'total_day' => 'required',
	    'type'=>'required'
		
	    ];
      }

      public  function teacher_roles_rule()
      {
  		return [

  		'article_id'=>'required',
	    'article_name' => 'required',
		'teacher_name' => 'required',
		'issue_date' =>'required',
	    'return_date' => 'required',
	    'teacher_email' => 'required',
	    'teacher_phone' => 'required',
	    'total_day' => 'required',
	    'type'=>'required'
		
	    ];
      }
}
