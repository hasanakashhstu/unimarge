<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_course', function (Blueprint $table) {
            $table->increments('website_course_id');
            $table->integer('course_category_id');
            $table->string('name');
            $table->text('description');
            $table->text('venue');
            $table->text('schedule');
            $table->integer('amount');
            $table->string('banner');
            $table->string('trainner_name');
            $table->string('trainner_image');
            $table->integer('available_seat');
            $table->string('who_can_join');
            $table->string('total_hours');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('website_course');
    }
}
