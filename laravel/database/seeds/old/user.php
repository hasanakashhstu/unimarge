<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        		array('id' =>'1','name'=>'Hasan','email'=>'admin@admin.com','password'=>'$2y$10$8lEtrJyy60lxD9iHs/c.V.3LDEPXTWJpD0XJv3XwHqkI221ksro1G','status'=>'Active' )
        	));
    }
}
