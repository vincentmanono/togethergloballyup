<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamas', function (Blueprint $table) {
            $table->id();
            $table->string("user_id") ;
            $table->string("name") ;
            $table->double('amount') ;
            $table->integer('duration')->unsigned()->nullable()->default(30);
            $table->boolean('openVote')->nullable() ->default(false) ;
            $table->dateTime('nextVote')->nullable();
            $table->longText("description")->nullable() ;
            $table->boolean('activate') ->default(false) ;

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('chamacode', 100)->nullable();
            $table->string('authorizationcode', 100)->nullable();

            $table->boolean('confirmedjoining')->nullable()->default(false);


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
        Schema::dropIfExists('chamas');
    }
}
