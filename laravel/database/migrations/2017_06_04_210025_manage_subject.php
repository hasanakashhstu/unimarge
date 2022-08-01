<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_subject',function(Blueprint $table){
            $table->increments('id');
            $table->string('subject_name');
            $table->string('subject_code');
            $table->string('subject_mark');
            $table->string('subject_credit');
            $table->string('class');
            $table->string('teacher');
            $table->string('user');
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
        Schema::drop('manage_subject');
    }
}
