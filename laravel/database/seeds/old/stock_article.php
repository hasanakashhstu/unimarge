<?php

use Illuminate\Database\Seeder;

class stock_article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stock_article')->insert([
        		['artical_name'=>'himu','language'=>'bangla','author'=>'humaiyan ahmmed','isbn'=>'221','stock_date'=>'2-2-10','publisher'=>'tania','price_details'=>'461','net_price'=>'221','purchase_price'=>'210','discount'=>'5%','quantity'=>'20',`stock_article_id`=>'1']

        		]);
    }
}
