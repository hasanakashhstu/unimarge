<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Component extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('component',function(Blueprint $table){
            $table->integer('component_id');
            $table->string('component_name');
            $table->string('abbr');
            $table->string('mark');
            $table->string('calculate_percent'); 
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
       Schema::drop('component');
      
    }
}
