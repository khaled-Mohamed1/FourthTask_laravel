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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('farmer_id')->unsigned();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->float('piece_number')->nullable(); // رقم القطعة
            $table->float('coupon_number')->nullable(); // رقم القسيمة
            $table->float('area_number_for_tenure_purposes')->nullable(); // مساحة المباني لإغراض الحيازة
            $table->float('area_number_for_non_acquisition_purposes')->nullable(); // مساحة المباني لغير أغراض الحيازة
            $table->float('permanent_fallow_area_number')->nullable(); // مساحة البور الدائم
            $table->float('temporary_fallow_area_number')->nullable(); // مساحة البور الموقت
            $table->float('cultivated_land_area_number')->nullable(); // مساحة الأرض المزروعة
            $table->float('forest_trees_area_number')->nullable(); // مساحة الأشجار الحرجية
            $table->float('total_land_area_number')->nullable(); // مساحة الأرض الاجمالية
            $table->float('far_from_armistice_line_number')->nullable(); // البعد عن خطة الهدنة
            $table->string('contract_type')->nullable(); // نوع التعاقد
            $table->string('holding_type')->nullable(); // نوع الحياز
            $table->string('owner_type')->nullable(); // نوع المالك
            $table->string('city')->nullable(); // المدينة
            $table->string('region')->nullable(); // المنطقة
            $table->string('nearest_place')->nullable(); // اقرب معلم
            $table->string('notes')->nullable(); // ملاحظات
            $table->decimal('latitude', 8, 6)->nullable(); // خطوط الطول والعرض
            $table->decimal('longitude', 9, 6)->nullable(); // خطوط الطول والعرض
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
        Schema::dropIfExists('lands');
    }
};
