<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->boolean('sex')->default('1');
          $table->bigInteger('salary')->default(0);
          $table->boolean('salary_get')->default(0);
          $table->date('work_date');
          $table->string('region', 50)->nullable()->default('مسلم');
          $table->string('phone', 50)->nullable();
          $table->string('address',200)->nullable();
          $table->unsignedInteger('type_id')->nullable();
          $table->foreign('type_id')->references('id')->on('type');
          $table->string('subject')->nullable();
          /*$table->unsignedInteger('subject_id')->nullable();
          $table->foreign('subject_id')->references('id')->on('subjects');*/
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
        Schema::dropIfExists('teacher');
    }
}
