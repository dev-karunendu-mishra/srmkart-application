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
        Schema::create('seller_listings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->text('product_name');
            $table->text('description')->nullable();
            $table->text('additional_details')->nullable();
            $table->enum('category',['Electronics', 'Furniture', 'Books']);
            $table->enum('condition',['New', 'Used']);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('max_price', 10, 2)->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_listings');
    }
};
