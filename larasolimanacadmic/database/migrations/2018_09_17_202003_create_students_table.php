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

          $table->unsignedInteger('parents_id')->nullable();
          $table->foreign('parents_id')->references('id')->on('parents')->onDelete('set null');

          $table->unsignedInteger('classroom_id');
          $table->foreign('classroom_id')->references('id')->on('classroom');

          $table->integer('level_id')->nullable();
          $table->foreign('level_id')->references('id')->on('level');

          $table->integer('stage_id')->nullable();
          $table->foreign('stage_id')->references('id')->on('stage');

          $table->integer('shift_id')->nullable();
          $table->foreign('shift_id')->references('id')->on('shift');

          $table->unsignedInteger('type_id')->nullable();
          $table->foreign('type_id')->references('id')->on('type');

          $table->integer('status_id')->nullable();
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
