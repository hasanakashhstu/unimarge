<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_setup', function (Blueprint $table) {
            $table->increments('website_setup_id');
            $table->text('about_us');
            $table->text('history');
            $table->text('mission_vision');
            $table->text('principle_message');
            $table->string('providan_link');
            $table->string('academic_calender_link');
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
        Schema::dropIfExists('website_setup');
    }
}
