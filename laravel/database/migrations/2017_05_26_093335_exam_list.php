<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_list',function(Blueprint $table){

            $table->increments('id');
            $table->string('exam_name');
            $table->string('controller');
            $table->string('exam_start_date');
            $table->string('exam_end_date');
            $table->string('publish');
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
        Schema::drop('exam_list');
    }
}
