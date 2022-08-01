<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalaryStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_structure',function(Blueprint $table)
        {
            $table->integer('payroll_structure_id')->primary();
            $table->string('title');
            $table->string('status');
            $table->string('frequency');
            $table->string('payment_acount');
            $table->string('expense_acount');
           
            $table->timestamps();
        });

        Schema::create('salary_structure_teacher_staff_details',function(Blueprint $table)
        {   
            $table->increments('id');
            $table->string('parent');
            $table->string('teacher_or_staff_name');
            $table->string('from_date');
            $table->string('base');
            $table->string('variable');
            
           
            $table->timestamps();
        });


        Schema::create('salary_structure_earning_component',function(Blueprint $table)
        {
            $table->string('parent');
            $table->string('earn_component_name');
            $table->string('earn_formula');
            $table->string('earn_amount');
            $table->timestamps();
        });


        Schema::create('salary_structure_deduction_component',function(Blueprint $table)
        {
            $table->string('parent');
            $table->string('deduction_component_name');
            $table->string('deduction_formula');
            $table->string('deduction_amount');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salary_structure');
        Schema::drop('salary_structure_teacher_staff_details');
        Schema::drop('salary_structure_earning_component');
        Schema::drop('salary_structure_deduction_component');

    }
}
