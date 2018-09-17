<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name');
          $table->string('middle_name');
          $table->string('last_name');
          $table->boolean('sex');
          $table->string('region', 50)->nullable();
          $table->string('phone', 50)->nullable();
          $table->string('photo', 200)->nullable();
          $table->date('dob');
          $table->string('address',200)->nullable();

          $table->unsignedInteger('incustudentparents_id');
          $table->foreign('incustudentparents_id')->references('id')->on('incustudentparents');

          $table->unsignedInteger('classroom_id');
          $table->foreign('classroom_id')->references('id')->on('classroom');

          $table->unsignedInteger('level_id');
          $table->foreign('level_id')->references('id')->on('level');

          $table->unsignedInteger('incushifts_id');
          $table->foreign('incushifts_id')->references('id')->on('incushifts');

          $table->unsignedInteger('type_id');
          $table->foreign('type_id')->references('id')->on('type');

          $table->unsignedInteger('status_id');
          $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('students');
    }
}
