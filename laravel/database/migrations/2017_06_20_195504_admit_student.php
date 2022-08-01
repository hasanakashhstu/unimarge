<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdmitStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',function(Blueprint $table)
        {
            
            $table->string('student_name');
            $table->string('parent_name');
            $table->string('relation');
            $table->string('class');
            $table->string('roll')->primary();
            $table->string('reg_number');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('phone');
            $table->string('mobile');
            $table->string('status');
            $table->string('type');
            $table->string('email');
            $table->string('password');
            $table->string('department');
            $table->string('section');
            $table->timestamps();
        });

        Schema::create('students_child',function(Blueprint $table){
            $table->increments('id');
            $table->string('roll');
            $table->string('post_office');
            $table->string('home_district');
            $table->string('division');
            $table->string('village_name');
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
        Schema::drop('students');
        Schema::drop('students_child');
    }
}
