<?php

use Illuminate\Database\Seeder;

class article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article')->insert([
        		['article'=>'himu','article_name'=>'humaiyan ahmmed','language'=>'bangla','author'=>'prokas kumer','isbn'=>'112','publisher'=>'prokas','description'=>'its a  interessting book','stock_date'=>'2-2-18','price'=>'461','available_status'=>'461','article_id'=>'1']

        		]);
    }
}
