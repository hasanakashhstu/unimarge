<?php

use Illuminate\Database\Seeder;

class manage_transport extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        	DB::table('manage_transport')->insert([
        		['transport_id'=>'1','route_name'=>'Feni','name_of_transport'=>'Haneef','number_of_transport'=>'32','licence_no'=>'kha-32-03','start_date'=>'27 april 2015','transport_color'=>'Green','number_of_seat'=>'25' ]
        ]);

    }
}
