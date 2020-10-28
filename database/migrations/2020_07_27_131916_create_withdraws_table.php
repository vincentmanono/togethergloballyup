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

            $table->string('ConversationID')->nullable();
            $table->string('OriginatorConversationID')->nullable();
            $table->string('ResponseCode')->nullable();
            $table->string('ResponseDescription')->nullable();
            $table->string('ResultType')->nullable();
            $table->string('ResultCode')->nullable();
            $table->string('ResultDesc')->nullable();
            $table->string('TransactionID')->nullable();
            $table->string('amount')->nullable();
            $table->string('ReceiverPartyPublicName')->nullable();
            $table->dateTime('TransactionCompletedDateTime')->nullable();
            $table->string('balance')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('confirmed')->nullable()->default(false);

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
