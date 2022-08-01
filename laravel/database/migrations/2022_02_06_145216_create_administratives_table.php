<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('administrative_office_id');
            $table->foreign('administrative_office_id')
                ->references('id')->on('administrative_offices')
                ->onDelete('cascade');
            $table->unsignedTinyInteger('type')->default('3')->comment('1=head, 2=sub head, 3=member');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
                ->references('teacher_id')->on('teachers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('administratives');
    }
}
