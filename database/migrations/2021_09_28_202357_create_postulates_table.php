<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('proyects');
            $table->string('adviser');
            $table->integer('phone');
            $table->string('email');
            $table->text('longname');
            $table->string('address');
            $table->text('partners');
            $table->string('typeofcompany');
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
        Schema::dropIfExists('postulates');
    }
}
