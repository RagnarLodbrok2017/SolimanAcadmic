<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->unique();
            $table->string('job')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('salary')->default(0);
            $table->boolean('salary_get')->default(0);
            $table->date('work_date')->nullable();
            $table->integer('numOfHours')->nullable();
            $table->string('shift')->default('صباحى')->nullable();
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
        Schema::dropIfExists('stuff');
    }
}
