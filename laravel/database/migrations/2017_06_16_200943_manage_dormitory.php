<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageDormitory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('manage_dormitory',function(Blueprint $table)
        {
            $table->integer('manage_dormitory_id')->primary();
            $table->string('dormitory_title');
            $table->string('dormitory_author');
            $table->string('dormitory_no');
            $table->string('dormitory_name');
            $table->string('dormitory_floor');
            $table->string('total_room_number');
            $table->string('dormitory_location');
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
       Schema::drop('manage_dormitory');
    }
}
