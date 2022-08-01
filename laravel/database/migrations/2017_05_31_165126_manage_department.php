<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_department',function(Blueprint $table){
                $table->increments('id');
                $table->string('department_name');
                $table->string('class_name');
                $table->string('description');
                $table->bigInteger('department_head_teacher_id')->nullable();
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
        
        Schema::drop('manage_department');
    }
}
