<?php

use Illuminate\Database\Seeder;

class assign_dormitory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('assign_dormitory')->insert([
        		['assign_dormitory_id'=>'1','title'=>'himu','student_name'=>'prokas','student_roll'=>'288161','department'=>'cst','semester'=>'4th','dormitory_no'=>'2','dormitory_name'=>'bonghobondu ','room_number'=>'221','description'=>'its color is white']

        		]);
    }
}
