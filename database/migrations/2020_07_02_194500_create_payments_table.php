<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id") ->nullable();
             $table->integer("paymentable_id") ->nullable();
             $table->string("paymentable_type") ->nullable();
            $table->string("result")->nullable() ;
            $table->string("merchantRequestID")->nullable();
            $table->string("checkoutRequestID")->nullable();
            $table->string("responseCode")->nullable();
            $table->string("resultDesc")->nullable();
            $table->string("responseDescription")->nullable();
            $table->string("resultCode")->nullable();
            $table->string('customerMessage')->nullable();
            $table->string('mpesaReceiptNumber')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->float('amount')->nullable();
            $table->float('balance')->nullable();
            $table->boolean('active')->default(true);
            $table->dateTime('transactionDate')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
