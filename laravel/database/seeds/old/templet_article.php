<?php

use Illuminate\Database\Seeder;

class templet_article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('templet_article')->insert([
        		['article_name'=>'himu','author'=>'humaiyan ahmmed','stock_date'=>'2-2-12','publisher'=>'prokas kumer','language'=>'bangla','isbn'=>'461']

        		]);
    }
}
