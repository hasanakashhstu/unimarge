<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableApprisalTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprisal_template', function (Blueprint $table) {
            $table->integer('template_id')->primary();
            $table->string('title');
            $table->string('active_status');
            $table->timestamps();
        });
    
        Schema::create('apprisal_template_performance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent');
            $table->string('kra');
            $table->string('weightage');
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
        Schema::drop('apprisal_template');
        Schema::drop('apprisal_template_performance');
    }
}
