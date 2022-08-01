<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense',function(Blueprint $table)
        {
            $table->integer('expense_id')->primary();
            $table->string('expense_title');
            $table->string('expense_category');
            $table->string('amount_paid_to');
            $table->string('expense_account');
            $table->string('amount_method');
            $table->string('date');
            $table->string('status');
            $table->string('remark');
            $table->timestamps();
        });
        Schema::create('expense_child',function(Blueprint $table)
        {
            $table->integer('expense_id')->primary();
            $table->string('purpose');
            $table->string('amount');
            $table->string('allocate_amount');
            $table->string('party_name');
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
        Schema::drop('expense');
        Schema::drop('expense_child');
    }
}
