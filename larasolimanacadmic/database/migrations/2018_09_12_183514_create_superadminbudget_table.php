<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperadminbudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superadminbudget', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('salary');
            $table->string('day');
            $table->string('description')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type');
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
        Schema::dropIfExists('superadminbudget');
    }
}
