<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('teacher_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('teacher_name');
            $table->string('email')->nullable();
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('birth_date');
            $table->string('marital_status');
            $table->string('gender');
            $table->string('religion');
            $table->string('mobile_no');
            $table->string('job_type');
            $table->string('work_department');
            $table->string('medium')->nullable();
            $table->string('status')->nullable();
            $table->string('type');
            $table->string('designation');
            $table->string('employment_id');
            $table->unsignedBigInteger('department_id');
            $table->string('social_network_1');
            $table->string('social_network_2');
            $table->string('social_network_3');
            $table->string('social_network_4');
            $table->unsignedInteger('sort_index')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('faculty_id')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
