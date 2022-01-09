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
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('group')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('notification')->nullable();
            $table->unsignedBigInteger('enterprise_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
           
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
