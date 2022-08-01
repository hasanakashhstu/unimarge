<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleRecive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_recive',function(Blueprint $table){
            $table->integer('article_recive_id')->primary();
            $table->string('article_id');
            $table->string('article_name');
             $table->string('member_name');
              $table->string('issue_date');
            $table->string('return_date');
            $table->string('e_mail');
             $table->string('phone');
            $table->string('total_day');
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
         Schema::drop('article_receive');
    }
}


