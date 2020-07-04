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
            $table->string("user_id") ;
            $table->string("group_id") ;
            $table->string("phone") ;
            $table->string("MerchantRequestID");
            $table->string("CheckoutRequestID");
            $table->string("ResponseCode");
            $table->string("ResultDesc");
            $table->string("ResponseDescription");
            $table->string("ResultCode");
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
