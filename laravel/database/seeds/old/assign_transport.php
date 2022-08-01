<?php

use Illuminate\Database\Seeder;

class assign_transport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('assign_transport')->insert([
        		['route_name'=>'Mini Bus','name_transport'=>'College Bus','transport_color'=>'red','number_of_transport'=>'12345','student_roll'=>'285177','route_fare'=>'200tk']

        		]);
    }
}
