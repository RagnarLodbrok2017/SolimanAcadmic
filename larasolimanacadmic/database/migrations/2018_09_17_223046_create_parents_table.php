<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
          $table->increments('id');
          $table->string('father_name',50)->nullable();
          $table->string('mother_name',50)->nullable();
          $table->string('job')->nullable();
          $table->string('FPhone', 50)->nullable();
          $table->string('LPhone', 50)->nullable();
          $table->string('email', 200)->nullable();
          $table->string('nationality',50)->default('مصرى')->nullable();
          $table->string('status')->default('عادى')->nullable();
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
        Schema::dropIfExists('parents');
    }
}
