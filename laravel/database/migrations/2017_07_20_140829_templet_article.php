<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempletArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('templet_article',function(Blueprint $table)
        {
            $table->integer('templet_id')->primary();
            $table->string('article_name');
            $table->string('author');
            $table->string('publisher');
            $table->string('language');
            $table->string('isbn');
            $table->timestamps();
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::drop('templet_article');
        
    }
}
