<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassRoutine extends Migration
{
    /**
     * Run the migrations. http://127.0.0.1:8000/

     *
     * @return void
     */
    public function up()
    {
         Schema::create('class_routine', function (Blueprint $table) {
            $table->integer('class_routine_id')->primary();
            $table->string('class_name');
            $table->string('section');
            $table->string('class_day');
            $table->timestamps();
        });
        
        Schema::create('class_routine_start_child', function (Blueprint $table) {
            $table->integer('parent')->primary();
            $table->string('class_starting_hour');
            $table->string('class_starting_minutes');
            $table->string('class_starting_format');
            $table->timestamps();
        });
        
        Schema::create('class_routine_end_child', function (Blueprint $table) {
            $table->integer('parent')->primary();
            $table->string('class_ending_hour');
            $table->string('class_ending_minutes');
            $table->string('class_ending_format');
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
       Schema::drop('class_routine');
        Schema::drop('class_routine_start_child');
        Schema::drop('class_routine_end_child');
    }
}
