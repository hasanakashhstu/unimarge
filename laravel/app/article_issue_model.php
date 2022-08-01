<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_issue_model extends Model
{
    
    protected $table='article_issue';
    protected $primaryKey='article_issue_id';
   
    protected $fillable=['article_id','article_name','member_roll','member_reg','member_name','issue_date','return_date','e_mail','phone','status','total_day','article_issue_id','teacher_id','teacher_name','teacher_email','teacher_phone','type'];

      public  function student_roles_rule()
      {
  		return [

  		'article_id'=>'required',
	    'article_name' => 'required',
	    'member_roll' => 'required',
		'member_name' => 'required',
		'issue_date' =>'required',
	    'return_date' => 'required',
	    'e_mail' => 'required',
	    'status' => 'required',
	    'total_day' => 'required',
		'type'=>'required'
	    ];
      }

      public  function teacher_roles_rule()
      {
  		return [

  		'article_id'=>'required',
	    'article_name' => 'required',
	    'teacher_id' => 'required',
	    'teacher_name' => 'required',
		'teacher_email' => 'required',
		'issue_date' =>'required',
	    'return_date' => 'required',
	    'status' => 'required',
	    'total_day' => 'required',
	    'type'=>'required'
		
	    ];
      }
}
