<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AplicantStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_student',function(Blueprint $table)
        {
            $table->integer('applicant_id')->primary();
            $table->string('student_name');
            $table->string('parent_name');
            $table->string('relation');
            $table->string('session');
            $table->string('class');
            $table->string('admission_test');
            $table->string('department');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('email');
            $table->string('status')->default('Applicant');
            $table->timestamps();
        });
        Schema::create('applicant_student_child',function(Blueprint $table)
        {
            $table->integer('parent')->primary();
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
        Schema::drop('applicant_student');
        Schema::drop('applicant_student_child');
    }
}
