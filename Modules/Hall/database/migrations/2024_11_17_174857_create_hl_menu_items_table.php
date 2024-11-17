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
        Schema::create('hl_menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('hl_menus')->onDelete('cascade');
            $table->enum('type', ['food', 'drink', 'appetizer', 'dessert', 'soup']);
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hl_menu_items');
    }
};