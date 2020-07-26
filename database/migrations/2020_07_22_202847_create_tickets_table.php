<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('chama_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('pay')->nullable()->default(false);//will receive payment
            $table->boolean('given')->nullable()->default(false);//received money
            $table->boolean('as_vote')->nullable()->default(false); //determin if user voted on given duration
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
        Schema::dropIfExists('tickets');
    }
}
