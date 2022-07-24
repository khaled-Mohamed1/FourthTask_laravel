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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('farmer_id')->unsigned();
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->string('q1')->nullable(); //هل تستخدم اصول محسنة
            $table->string('q2')->nullable(); // هل تستخدم اسمدة عضوية
            $table->string('q3')->nullable(); // هل تستخدم اسمدة كيماوية
            $table->string('q4')->nullable(); // هل تستخدم مبيدات زراعية
            $table->string('q5')->nullable(); // هل تستخدم المكافحة المتكالمة
            $table->string('q6')->nullable(); // هل تقوم بتطعيم حيواناتك ضد الأمراض الوبائية
            $table->string('q7')->nullable(); // هل تتلقى خدمات حكومية
            $table->string('q8')->nullable(); // حدد مصدر الإرشاد الزراعي الرئيسي
            $table->string('q9')->nullable(); // هل يوجد فقاسة
            $table->string('q10')->nullable(); // الطاقة الانتاجية
            $table->string('q11')->nullable(); // هل تربي الأسماء
            $table->string('q12')->nullable(); // هل يشكل دخل الحيازة 50% من اجمالي دخل الأسرة
            $table->string('q13')->nullable(); // هل استفدت من مشاريع الأراضي او شق الطرق الزراعيةاو اي مشاريع زراعية اخرى
            $table->string('q14')->nullable(); // هل تصنع منتجات الحيازة
            $table->string('q15')->nullable(); // هل يوجد لديك بئر مياه
            $table->string('q16')->nullable(); // حالةالبئر
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
        Schema::dropIfExists('apps');
    }
};
