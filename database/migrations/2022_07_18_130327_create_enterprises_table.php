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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('land_id')->unsigned();
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
            $table->string('enterprise_type')->nullable();; // نوع المؤسسة
            $table->string('enterprise_number')->nullable();; // رقم المؤسسة
            $table->string('enterprise_name')->nullable();; // اسم الؤسسة
            $table->string('enterprise_owner_ID_number')->nullable();; // رقم هوية ممثل المؤسسة
            $table->string('enterprise_owner_name')->nullable();; // اسم ممثل المؤسسة
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
        Schema::dropIfExists('enterprises');
    }
};
