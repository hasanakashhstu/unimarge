<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock_article_model extends Model
{
     protected $table='stock_article';
    protected $primaryKey='stock_id';
    protected $fillable=['article_name','language','author','isbn','edition','stock_date','publisher','price_details','net_price','purchase_price','discount','quantity','stock_id'];

      public  function roles_rule()
      {
  		return [
	    'article_name' => 'required',
	    'language' => 'required',
	    'edition'=>'required',
	    'author' => 'required',
	    'stock_date' => 'required',
	    'publisher' => 'required',
	    'price_details' => 'required',
	    'net_price' => 'required',
	    'purchase_price' => 'required',
	    'discount' => 'required',
	    'quantity' => 'required',
	   
	    ];
      }

}
 
            