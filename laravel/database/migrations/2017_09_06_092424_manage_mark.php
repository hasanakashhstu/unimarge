<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageMark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_mark',function(Blueprint $table){
            $table->increments('exam_id');
            $table->string('exam_name');
            $table->string('class_name');
            $table->string('section');
            $table->string('Department');
            $table->string('subject');
            $table->string('entry_here');
            $table->string('default_session');
           
            $table->timestamps();
        });

        Schema::create('manage_mark_child',function(Blueprint $table){
            $table->string('parents');
            $table->string('exam_id');
            $table->string('roll');
            $table->string('cgpa');
            $table->string('grade_name');
            $table->string('mark');
            $table->string('comment');
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
        Schema::drop('manage_mark');
        Schema::drop('manage_mark_child');
    }
}
