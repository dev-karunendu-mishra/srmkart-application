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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('order_id')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to users table
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->decimal('delivery_charge', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Payment status
            $table->json('items'); // Store order items as JSON
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->enum('delivery_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('payment_screenshot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
