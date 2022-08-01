<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class templet_article_model extends Model
{
     protected $table='templet_article';
    protected $primaryKey='templet_id';
    protected $fillable=['article_name','author','publisher','language','edition','call_no','isbn','templet_id'];

      public  function roles_rule(){
  		return [
	    'article_name' => 'required',
	    'author' => 'required',
	    'publisher' => 'required',
		'language' => 'required',
		'edition' => 'required',
		'call_no' => 'required',
	    ];
	}
}
