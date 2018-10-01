<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuff_type', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stuff_id');
            $table->foreign('stuff_id')->references('id')->on('stuff')->onDelete('cascade');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('set null');
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
        Schema::dropIfExists('stuff_type');
    }
}
