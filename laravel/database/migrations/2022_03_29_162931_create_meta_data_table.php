<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_data', function (Blueprint $table) {
            $table->id();
            $table->string('meta_type');
            $table->string('meta_key')->index();
            $table->string('title')->nullable();
            $table->longText('meta_value')->nullable();
            $table->unsignedInteger('sort_order')->nullable();
            $table->unsignedTinyInteger('status')->default('1')->comment('1=active,2=deactivate');
            $table->softDeletes();
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
        Schema::dropIfExists('meta_data');
    }
}
