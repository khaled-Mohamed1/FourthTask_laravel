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
        Schema::create('vegetables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('vegetable_name')->nullable();
            $table->date('vegetable_history')->nullable();
            $table->string('vegetable_area')->nullable();
            $table->string('vegetable_status')->nullable();
            $table->string('vegetable_protection')->nullable();
            $table->string('vegetable_protectionType')->nullable();
            $table->string('vegetable_irrigation')->nullable();
            $table->string('vegetable_recession')->nullable();
            $table->string('vegetable_recession_reason')->nullable();
            $table->date('vegetable_endDate')->nullable();
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
        Schema::dropIfExists('vegetables');
    }
};
