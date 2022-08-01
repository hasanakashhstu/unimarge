<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Membership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('membership',function(Blueprint $table)
        {
            $table->integer('member_id')->primary();
            $table->string('member_name');
            $table->string('roll_number');
            $table->string('reg_number');
            $table->string('status');
            $table->string('email');
            $table->string('phone');
            $table->string('from_date');
            $table->string('to_date');
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
        Schema::drop('membership');
    }
}
