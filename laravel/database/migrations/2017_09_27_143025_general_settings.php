<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('general_settings',function(Blueprint $table)
       {
           $table->integer('general_settings_id')->primary();
           $table->string('system_name');
           $table->string('system_title');
           $table->string('Phone');
           $table->string('address');
           $table->string('country');
           $table->string('postal_code');
           $table->string('school_eiin');
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
        Schema::drop('general_settings');
    }
}
