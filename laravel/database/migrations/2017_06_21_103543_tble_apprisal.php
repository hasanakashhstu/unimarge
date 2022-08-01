<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbleApprisal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprisals', function (Blueprint $table) {
            $table->integer('apprisal_id')->primary();
            $table->string('medium');
            $table->string('apprisal_type');
            $table->string('apprisal_name');
            $table->string('apprisal_template');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('total_score');
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
        Schema::dropIfExists('apprisals');
    }
}
