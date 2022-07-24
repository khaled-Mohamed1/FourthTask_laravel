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
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('crop_name')->nullable();
            $table->date('crop_history')->nullable();
            $table->string('crop_area')->nullable();
            $table->string('crop_status')->nullable();
            $table->string('crop_irrigation')->nullable();
            $table->string('crop_recession')->nullable();
            $table->string('crop_recession_reason')->nullable();
            $table->date('crop_endDate')->nullable();
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
        Schema::dropIfExists('crops');
    }
};
