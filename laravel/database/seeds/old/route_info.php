<?php

use Illuminate\Database\Seeder;

class route_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('route_info')->insert([
        		['name'=>'Afrin Ahemmed','fare'=>'Rehan@gmail.com','distance'=>'123456','hour'=>'Male','from'=>'Doctor','to'=>'2000']

        		]);
    }
}
