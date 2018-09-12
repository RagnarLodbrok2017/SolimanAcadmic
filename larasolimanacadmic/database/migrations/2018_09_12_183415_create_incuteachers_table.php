<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncuteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incuteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('sex');
            $table->bigInteger('salary');
            $table->string('region', 50)->nullable()->default('مسلم');
            $table->string('phone', 50)->nullable();
            $table->string('address',200)->nullable();
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
        Schema::dropIfExists('incuteachers');
    }
}
