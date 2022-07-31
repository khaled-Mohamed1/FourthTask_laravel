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
        Schema::create('pests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
            $table->string('agricultural_class')->nullable();
            $table->string('pest_name')->nullable();
            $table->string('pest_image')->nullable();
            $table->string('pest_image_description')->nullable();
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
        Schema::dropIfExists('pests');
    }
};
