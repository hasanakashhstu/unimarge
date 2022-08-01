<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NoticeBoard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
         Schema::create('notice_board',function(Blueprint $table)
        {
            $table->integer('notice_id')->primary();
            $table->string('notice_title');
            $table->string('notice_subject');
            $table->string('author');
            $table->string('to');
            $table->text('Notice');
            $table->timestamps();
        });

         Schema::create('stuent_notice_child',function(Blueprint $table)
        {
            $table->integer('parent')->primary();
            $table->string('sw_student_name');
            $table->string('sw_student_email');
            $table->string('sw_student_roll');
            $table->string('sw_student_class');
            $table->string('sw_student_section');
            $table->timestamps();
        });

          Schema::create('teacher_notice_child',function(Blueprint $table)
        {
            $table->integer('parent')->primary();
            $table->string('tw_teacher_name');
            $table->string('tw_teacher_email');  
            $table->string('tw_subject');
            $table->timestamps();
        });

        Schema::create('class_notice_child',function(Blueprint $table)
        {
            $table->integer('parent')->primary();
            $table->string('cw_class');
            $table->string('cw_department');
            $table->string('cw_section');
            $table->timestamps();
        });

          Schema::create('parent_notice_child',function(Blueprint $table)
        {
            $table->integer('parent')->primary();
            $table->string('pw_parents_name');
            $table->string('pw_parents_email');
            $table->string('pw_student_name');
            $table->string('pw_student_roll');
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
         Schema::drop('notice_board');
         Schema::drop('stuent_notice_child');
         Schema::drop('teacher_notice_child');
         Schema::drop('class_notice_child');
         Schema::drop('parent_notice_child');
   
    }
}
