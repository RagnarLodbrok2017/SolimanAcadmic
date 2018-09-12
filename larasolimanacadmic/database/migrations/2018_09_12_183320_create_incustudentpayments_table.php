<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncustudentpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incustudentpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('price');

            $table->unsignedInteger('incustudent_id');
            $table->foreign('incustudent_id')->references('id')->on('incustudents');
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
        Schema::dropIfExists('incustudentpayments');
    }
}
