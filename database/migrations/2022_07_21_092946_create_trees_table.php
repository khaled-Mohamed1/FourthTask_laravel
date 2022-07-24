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
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('tree_name')->nullable();
            $table->date('tree_history')->nullable();
            $table->string('tree_area')->nullable();
            $table->string('tree_number')->nullable();
            $table->string('tree_protection')->nullable();
            $table->string('tree_irrigation')->nullable();
            $table->string('tree_recession')->nullable();
            $table->string('tree_recession_reason')->nullable();
            $table->date('tree_endDate')->nullable();
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
        Schema::dropIfExists('trees');
    }
};
