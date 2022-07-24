<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string('code', 4);
            $table->string('name');
            $table->string('zone');
            $table->string('cp', 5);
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->foreign('type_id')->references('id')->on('settlement_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
}
