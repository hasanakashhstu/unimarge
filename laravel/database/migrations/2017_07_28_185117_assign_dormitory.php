<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignDormitory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_dormitory',function(Blueprint $table)
        {
            $table->integer('assign_dormitory_id')->primary();
            $table->string('title');
            $table->string('student_name');
            $table->string('student_roll');
            $table->string('department');
            $table->string('semester');
            $table->string('dormitory_no');
            $table->string('dormitory_name');
            $table->string('room_number');
            $table->string('description');
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
         Schema::drop('assign_dormitory');
    }
}
