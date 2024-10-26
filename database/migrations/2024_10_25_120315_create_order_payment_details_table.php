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
        Schema::create('order_payment_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders table
            $table->enum('payment_method', ['cod', 'upi', 'credit_card', 'paypal', 'bank_transfer']); // Payment methodp
            $table->decimal('amount', 10, 2); // Payment amount
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Payment status
            $table->string('transaction_id')->nullable(); // Transaction ID for tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payment_details');
    }
};
