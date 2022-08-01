<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_info',function(Blueprint $table)
        {
            $table->integer('article_id')->increments();
            $table->integer('stock_id');
            $table->string('article_name');
            $table->string('language');
            $table->string('author');
            $table->string('isbn');
            $table->string('publisher');
            $table->string('description');
            $table->string('stock_date');
            $table->string('purchase_price');
            $table->string('available_status');
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
         Schema::drop('article_info');
    }
}
