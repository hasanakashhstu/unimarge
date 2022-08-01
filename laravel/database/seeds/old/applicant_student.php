<?php

use Illuminate\Database\Seeder;

class applicant_student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicant_student')->insert([
        		['applicant_id'=>'1','student_name'=>'Afrin Ahemmed','parent_name'=>'Rehan Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Male','postal_code'=>'112','phone'=>'01845617122' ,'email'=>'afrin@gmail.com'],

        		 ['applicant_id'=>'2','student_name'=>'Najnin Ahemmed','parent_name'=>'Akbor Hossain','relation'=>'Relation','session'=>'2012-2013','class'=>'2','admission_test'=>'class_two_test','department'=>'commarce','birth_date'=>'2016-05-26','gender'=>'Female','postal_code'=>'113','phone'=>'01845617145' ,'email'=>'najnin@gmail.com'],

        		['applicant_id'=>'3','student_name'=>'shakill islam','parent_name'=>'Rakis Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2013-05-26','gender'=>'Male','postal_code'=>'111','phone'=>'01845617345' ,'email'=>'shakill@gmail.com'],

        		 ['applicant_id'=>'4','student_name'=>'Sujana Jannat','parent_name'=>'Kader Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'3','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2002-05-26','gender'=>'Female','postal_code'=>'110','phone'=>'01845613455' ,'email'=>'sujana@gmail.com'],

        		['applicant_id'=>'5','student_name'=>'Rakis Ahemmed','parent_name'=>'Ripon Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'3','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2000-05-26','gender'=>'Male','postal_code'=>'113','phone'=>'01845614536' ,'email'=>'rakis@gmail.com'],

        		 ['applicant_id'=>'6','student_name'=>'Jannat Fataha','parent_name'=>'Rakis Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Female','postal_code'=>'112','phone'=>'01845612332' ,'email'=>'jannat@gmail.com'],

        		 ['applicant_id'=>'7','student_name'=>'Afrin Islam','parent_name'=>'Robi Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Male','postal_code'=>'112','phone'=>'01845617122' ,'email'=>'afrin@gmail.com'],

        		 ['applicant_id'=>'8','student_name'=>'Shahajadi Jannat','parent_name'=>'Nurul Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Female','postal_code'=>'112','phone'=>'01845617000' ,'email'=>'shahajadi@gmail.com'],

        		 ['applicant_id'=>'9','student_name'=>'Mahabuba Siddika','parent_name'=>'Nurul Hoq','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Female','postal_code'=>'110','phone'=>'01845610007' ,'email'=>'mahbuba@gmail.com'],

        		 ['applicant_id'=>'10','student_name'=>'Shakil Ahemmed','parent_name'=>'Ripan Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Female','postal_code'=>'112','phone'=>'0184560000' ,'email'=>'shakil@gmail.com'],

        		 ['applicant_id'=>'11','student_name'=>'Moli Islam','parent_name'=>'Rakib Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Female','postal_code'=>'111','phone'=>'01845610000' ,'email'=>'moli@gmail.com'],

        		 ['applicant_id'=>'12','student_name'=>'Rohan Ahemmed','parent_name'=>'Rajib Hossain','relation'=>'Relation','session'=>'2011-2012','class'=>'1','admission_test'=>'class_one_test','department'=>'science','birth_date'=>'2017-05-26','gender'=>'Male','postal_code'=>'112','phone'=>'01845617122' ,'email'=>'rohan@gmail.com'],
        	]);
    }
}
