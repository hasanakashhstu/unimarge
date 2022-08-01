<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantStudentHemInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_student_hem_info', function (Blueprint $table) {
            $table->increments('applicant_student_hem_info_id');
            $table->string('hem_member_no');
            $table->string('hem_group');
            $table->string('hem_village');
            $table->string('hem_section');
            $table->string('hem_zilla');
            $table->string('applicant_id');
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
        Schema::dropIfExists('applicant_student_hem_info');
    }
}
