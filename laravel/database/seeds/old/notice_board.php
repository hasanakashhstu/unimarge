<?php

use Illuminate\Database\Seeder;

class notice_board extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('notice_board')->insert([
        		['notice_title'=>'this is notice','notice_subject'=>'this is notice','author'=>'head teacher','student_name'=>'riya','student_email'=>'riya@gmail.com','student_roll'=>'2000','student_class'=>'Rehan@gmail.com','student_section'=>'','teacher_name'=>'hamidur','subject'=>'bangla','teacher_email'=>'hamidur@gmail.com','class'=>'123456','department'=>'cst','section'=>'A','class_wise_teacher_email'=>'teacher@gmail.com','class_wise_student_email'=>'student@gmail.com','parents_name'=>'rehana','parents_email'=>'rehana@gmail.com','parents_wise_student_name'=>'Afrin Ahemmed','parents_wise_student_roll'=>'19202','write_notice'=>'ur boy was not a good boy','notice_board_id'=>'1']

        		]);
    }
}
  