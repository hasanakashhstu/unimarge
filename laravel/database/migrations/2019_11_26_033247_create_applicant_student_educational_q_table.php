<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantStudentEducationalQTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_student_educational_q', function (Blueprint $table) {
            $table->increments('eqalification_id');
            $table->string('applicant_id');
            $table->string('exam_name');
            $table->string('borad');
            $table->string('reg_no');
            $table->string('roll_no');
            $table->string('group');
            $table->string('passing_year');
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
        Schema::dropIfExists('applicant_student_educational_q');
    }
}
