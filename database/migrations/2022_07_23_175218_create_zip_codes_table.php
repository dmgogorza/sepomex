<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5);
            $table->unsignedBigInteger('federal_entity_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('municipality_id');
            $table->foreign('federal_entity_id')->references('id')->on('federal_entities');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
