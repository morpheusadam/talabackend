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
        Schema::create('hl_hall_event_types', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('hl_halls')->onDelete('cascade');
            $table->foreignId('event_type_id')->constrained('hl_event_types')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['hall_id', 'event_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hl_hall_event_types');
    }
};