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
        Schema::create('property_enquiries', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('mobile');
            $table->text('email');
            $table->string('hostel')->nullable();
            $table->string('estancia')->nullable();
            $table->string('abode')->nullable();
            $table->string('flat_no')->nullable();
            $table->text('message')->nullable();
            $table->string('slot_deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_enquiries');
    }
};
