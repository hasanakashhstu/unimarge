<?php

use Illuminate\Database\Seeder;

class manage_dormitory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manage_dormitory')->insert([
        		['dormitory_title'=>'hallno','dormitory_author'=>'mahbub','dormitory_no'=>'123456','dormitory_name'=>'Boys','dormitory_floor'=>'5','total_room_number'=>'2000','dormitory_location'=>'left building','description'=>'description']

        		]);
    }
}
