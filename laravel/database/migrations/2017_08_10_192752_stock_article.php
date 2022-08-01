<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_article',function(Blueprint $table)
        {
            $table->integer('stock_id')->primary();
            $table->string('article_name');
            $table->string('language');
            $table->string('author');
            $table->string('isbn');
            $table->string('stock_date');
            $table->string('publisher');
            $table->string('price_details');
            $table->string('net_price');
            $table->string('purchase_price');
            $table->string('discount');
            $table->string('quantity');
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
        
        Schema::drop('stock_article');
    }
}
