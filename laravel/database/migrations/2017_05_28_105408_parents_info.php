<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParentsInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents_info', function (Blueprint $table) {
            $table->bigIncrements('parent_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('profession');
            $table->string('monthly_salary');
            $table->string('anual_salary');
            $table->timestamps();
        });
        Schema::create('parents_info_child', function (Blueprint $table) {
            $table->bigIncrements('parent');
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
        Schema::drop('parents_info');
        Schema::drop('parents_info_child');
    }
}
