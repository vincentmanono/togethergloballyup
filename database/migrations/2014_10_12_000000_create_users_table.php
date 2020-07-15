<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->string('role') ->default('user') ; //user , admin, super
            $table->string('phone')->unique();
            $table->string('avatar', 100)->nullable()->default('avatar.png');
            $table->dateTime('subscription_expiry')->nullable();
            $table->timestamp('email_verified_at')->nullable()->default(false) ;
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
