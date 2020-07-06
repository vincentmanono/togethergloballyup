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
            $table->string("user_id") ->nullable();
            $table->string("chama_id") ->nullable();
            $table->string("phone") ->nullable();
            $table->string("MerchantRequestID")->nullable();
            $table->string("CheckoutRequestID")->nullable();
            $table->string("ResponseCode")->nullable();
            $table->string("ResultDesc")->nullable();
            $table->string("ResponseDescription")->nullable();
            $table->string("ResultCode")->nullable();
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
