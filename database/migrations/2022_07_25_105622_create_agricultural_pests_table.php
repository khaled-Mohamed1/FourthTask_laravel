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
        Schema::create('agricultural_pests', function (Blueprint $table) {
            $table->id();
            $table->string('agricultural_pest_name');
            $table->bigInteger('agricultural_id')->unsigned();
            $table->foreign('agricultural_id')->references('id')->on('agriculturals')->onDelete('cascade');
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
        Schema::dropIfExists('agricultural_pests');
    }
};
