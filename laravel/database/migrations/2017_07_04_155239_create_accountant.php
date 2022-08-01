<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant', function (Blueprint $table) {
            $table->integer('accontant_id')->primary();
            $table->string('accountant_name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('birth_date');
            $table->string('marital_status');
            $table->string('gender');
            $table->string('religion');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('job_type');
            $table->string('work_department');
            $table->string('password');
            $table->timestamps();
        });
        
        Schema::create('accountant_address_child', function (Blueprint $table) {
            $table->integer('parent')->primary();
            $table->string('post_office');
            $table->string('home_district');
            $table->string('division');
            $table->string('village_name');
            $table->string('home_name');
            $table->timestamps();
        });
        
        Schema::create('accountant_qualification_child', function (Blueprint $table) {
            $table->integer('parent')->primary();
            $table->string('degree_name');
            $table->string('board_name');
            $table->string('passing_year');
            $table->string('department_name');
            $table->timestamps();
        });        

        
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accountant');
        Schema::drop('accountant_address_child');
        Schema::drop('accountant_qualification_child');
        //
    }
}
