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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('card_id')->nullable();
            $table->dateTime('entry_date');
            $table->string('id_NO')->nullable()->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('firstname')->nullable();
            $table->string('secondname')->nullable();
            $table->string('thirdname')->nullable();
            $table->string('fourthname')->nullable();
            $table->string('phone_NO')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('nearest_place')->nullable();
            $table->string('status')->nullable();
            $table->string('gender')->nullable();
            $table->string('qualification')->nullable();
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
        Schema::dropIfExists('farmers');
    }
};
