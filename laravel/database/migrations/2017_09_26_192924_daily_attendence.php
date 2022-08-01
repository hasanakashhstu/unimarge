<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DailyAttendence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('daily_attendance',function(Blueprint $table){
            $table->increments('sl_no');
            $table->string('student_id');
            $table->string('device_id');
            $table->string('date');
            $table->string('time');
            $table->string('status'); 
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
       Schema::drop('daily_attendance');
      
    }
}




