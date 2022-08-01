<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteFaculties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_faculties', function (Blueprint $table) {
            $table->increments('website_faculties_id');
            $table->string('website_faculties_name');
            $table->integer('department_head');
            $table->text('msg_from_head');
            $table->text('lab_info');
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
        Schema::dropIfExists('website_faculties');
    }
}
