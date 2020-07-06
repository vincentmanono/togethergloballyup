<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->dateTime('expiry_date')->nullable();
            $table->float('amount');
            $table->integer('payment_id')->nullable();
            $table->integer('user_id');
            // $table->integer('plan_id');
            // $table->foreign('mpesa_id')->references('id')->on('mpesas');

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
        Schema::dropIfExists('subscriptions');
    }
}
