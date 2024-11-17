<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // نام فروشگاه باید یکتا باشد
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // حذف فروشگاه در صورت حذف کاربر
            $table->string('address')->nullable(); // آدرس فروشگاه
            $table->string('contact_number')->nullable(); // شماره تماس فروشگاه
            $table->string('email')->nullable()->unique(); // ایمیل فروشگاه باید یکتا باشد
            $table->string('website')->nullable(); // وب‌سایت فروشگاه
            $table->text('description')->nullable(); // توضیحات درباره فروشگاه
            $table->boolean('is_active')->default(true); // وضعیت فعال بودن فروشگاه
            $table->timestamp('verified_at')->nullable(); // زمان تایید فروشگاه
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};