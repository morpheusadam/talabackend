<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('store_id')->constrained('stores');
            $table->dateTime('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'])->default('Pending');
            $table->enum('payment_status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->string('shipping_address')->nullable();
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
