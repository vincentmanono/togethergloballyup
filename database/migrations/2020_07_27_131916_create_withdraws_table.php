<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned() ;

            $table->string('result')->nullable();

            $table->string('ConversationID', 100)->nullable();
            $table->string('OriginatorConversationID', 100)->nullable();
            $table->string('ResponseCode', 100)->nullable();
            $table->string('ResponseDescription', 100)->nullable();
            $table->string('ResultType', 100)->nullable();
            $table->string('ResultCode', 100)->nullable();
            $table->string('ResultDesc', 100)->nullable();
            $table->string('TransactionID', 100)->nullable();
            $table->string('amount', 100)->nullable();
            $table->string('ReceiverPartyPublicName', 100)->nullable();
            $table->dateTime('TransactionCompletedDateTime', 100)->nullable();
            $table->string('balance', 100)->nullable();


            $table->softDeletes();

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
        Schema::dropIfExists('withdraws');
    }
}
