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
        Schema::create('cattle', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('cattle_type')->nullable();
            $table->string('cattle_gender')->nullable();
            $table->string('cattle_number')->nullable();
            $table->string('cattle_age')->nullable();
            $table->string('cattle_healthCondition')->nullable();
            $table->string('cattle_notes')->nullable();
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
        Schema::dropIfExists('cattle');
    }
};
