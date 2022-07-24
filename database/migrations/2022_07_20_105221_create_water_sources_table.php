<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_sources', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('sources_type')->nullable();
            $table->string('well_number')->nullable();
            $table->string('well_depth')->nullable();
            $table->string('well_impetus')->nullable();
            $table->string('well_electro')->nullable();
            $table->string('tank_storage_capacity')->nullable();
            $table->string('tank_Height')->nullable();
            $table->string('groundWater_depth')->nullable();
            $table->string('groundWater_storage_capacity')->nullable();
            $table->string('groundWater_pond_type')->nullable();
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
        Schema::dropIfExists('water_sources');
    }
};
