<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_receipt', function (Blueprint $table) {
             $table->increments('payment_receipt_id');
             $table->string('invoice_id');
             $table->string('receipt_date');
             $table->string('receipt_by');
             $table->string('receipt_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_receipt', function (Blueprint $table) {
            //
        });
    }
}
