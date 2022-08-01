<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_model extends Model
{
    protected $table='article_info';
    protected $primaryKey='article_id';
   
    protected $fillable=['article_name','language','author','isbn','publisher','description','stock_date','purchase_price','available_status','article_id','stock_id','accession_code'];

      public  function roles_rule(){
  		return [
	 
	    'article_name' => 'required',
	    'language' => 'required',
	    'publisher' => 'required',
		'author' => 'required',
	    'isbn' => 'required',
	    'publisher' => 'required',
	    'description' => 'required',
	    'stock_date' => 'required',
	    'purchase_price' => 'required',
		'available_status' => 'required',
	  
	  
	    ];
}
}
           