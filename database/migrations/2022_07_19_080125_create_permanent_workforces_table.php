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
        Schema::create('permanent_workforces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('farmer_id')->unsigned();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->string('id_NO')->nullable()->unique();
            $table->string('firstname')->nullable();
            $table->string('secondname')->nullable();
            $table->string('thirdname')->nullable();
            $table->string('fourthname')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_NO')->nullable();
            $table->string('address')->nullable();
            $table->string('from_family')->nullable();
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
        Schema::dropIfExists('permanent_workforces');
    }
};
