<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlarySlip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('salary_slip',function(Blueprint $table)
        // {
        //     $table->integer('slip_id')->primary();
        //     $table->string('type');
        //     $table->string('person_id');
        //     $table->string('person_name');
        //     $table->string('payroll_frequency');
        //     $table->string('posting_date');
        //     $table->string('total_earning');
        //     $table->string('total_deduction');
        //     $table->string('gross_salary');
        //     $table->string('payment_account');
        //     $table->string('expence_acount');
        //     $table->string('round_of');
        //     $table->string('salary_structure');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('salary_slip');
    }
}
