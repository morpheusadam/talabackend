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
        Schema::create('hl_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('hl_customers')->onDelete('cascade');
            $table->foreignId('hall_id')->constrained('hl_halls')->onDelete('cascade');
            $table->dateTime('date');
            $table->enum('status', ['reserved', 'available']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hl_reservations');
    }
};