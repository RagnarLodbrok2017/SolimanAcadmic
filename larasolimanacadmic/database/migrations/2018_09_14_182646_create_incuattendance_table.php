<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncuattendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incuattendance', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');

            $table->unsignedInteger('incustudent_id');
            $table->foreign('incustudent_id')->references('id')->on('incustudent');

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
        Schema::dropIfExists('incuattendance');
    }
}
