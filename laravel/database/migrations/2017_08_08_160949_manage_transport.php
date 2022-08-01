<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_transport',function(Blueprint $table)
        {
            $table->increments('transport_id');
            $table->string('route_name');
            $table->string('name_of_transport');
            $table->string('number_of_transport');
            $table->string('licence_no');
            $table->string('start_date');
            $table->string('transport_color');
            $table->string('number_of_seat');
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
        Schema::drop('manage_transport');
    }
}
