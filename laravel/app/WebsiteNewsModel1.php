<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteNewsModel1 extends Model
{
    protected $table='website_news';
    protected $primaryKey='website_news_id';
    protected $fillable=['title','description','news_date','department','image'];

    public  function validation(){
        return [
            'title' => 'required',
            'description' => 'required',
            'news_date' => 'required',
            'department' => 'required',
            'image' => 'required',
        ];
    }
}
