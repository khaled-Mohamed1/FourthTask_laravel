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
        Schema::create('temporary_workforces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('farmer_id')->unsigned();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->integer('males_number')->nullable();
            $table->integer('males_number_family')->nullable();
            $table->integer('females_number')->nullable();
            $table->integer('females_number_family')->nullable();
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
        Schema::dropIfExists('temporary_workforces');
    }
};
