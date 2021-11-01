<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_enterprises', function (Blueprint $table) {
            $table->id();
            $table->enum('status',[1,2,3,4,5])->default(1);
            $table->timestamps();

           $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('enterprise_id');
            $table->unsignedBigInteger('project_id');
            

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('enterprise_id')->references('id')->on('enterprises')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_enterprises');
    }
}
