<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbleApprisalGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('salary_slip', function (Blueprint $table) {
            $table->integer('selip_id');
            $table->string('type');
            $table->string('names');
            $table->string('payroll_frequency');
            $table->string('payment_account');
            $table->string('expense_account');           
            $table->timestamps();
        });
       Schema::create('salary_slip_EarningComponent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent');
            $table->string('name');
            $table->string('form_date');
            $table->string('base');
            $table->string('Variable');           
            $table->timestamps();
        }); 
       Schema::create('salary_slip_DeducationComponent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent');
            $table->string('name');
            $table->string('form_date');
            $table->string('base');
            $table->string('Variable');           
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
        Schema::drop('salary_slip');
        Schema::drop('salary_slip_EarningComponent');
        Schema::drop('salary_slip_DeducationComponent');
    }
}
