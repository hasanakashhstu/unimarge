<?php

use Illuminate\Database\Seeder;

class parents_info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents_info')->insert([
        		['name'=>'Afrin Ahemmed','email'=>'Rehan@gmail.com','password'=>'123456','gender'=>'Male','profession'=>'Doctor','monthly_salary'=>'2000','anual_salary'=>'30000']

        		]);
           DB::table('parents_info_child')->insert([
        	['parent'=>'1','post_office'=>'feni','home_district'=>'feni','division'=>'feni','village_name'=>'feni']

        		]);
    }
}
