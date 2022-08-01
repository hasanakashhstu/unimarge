<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_transport',function(Blueprint $table)
        {
            $table->integer('transport_id');
            $table->string('route_name');
            $table->string('name_transport');
            $table->string('transport_color');
            $table->string('number_of_transport');
            $table->string('student_roll');
            $table->string('route_fare');
            
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
        Schema::drop('assign_transport');
    }
}
