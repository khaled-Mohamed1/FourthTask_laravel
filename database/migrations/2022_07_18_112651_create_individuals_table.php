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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('owner_ID_number')->nullable(); // رقم هوية المالك
            $table->string('owner_firstname')->nullable(); // اسم الأول للمالك
            $table->string('owner_secondname')->nullable(); // اسم الثاني للمالك
            $table->string('owner_thirdname')->nullable(); // اسم الثالث للمالك
            $table->string('owner_fourthname')->nullable(); // اسم الرابع للمالك
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
        Schema::dropIfExists('individuals');
    }
};
