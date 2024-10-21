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
        Schema::create('ticket_models', function (Blueprint $table) {
            $table->id(); // Primary key for the ticket_models table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('seat_model_id')->constrained('seat_models')->onDelete('cascade'); // Foreign key to seat_models table
            $table->decimal('price', 8, 2); // Price attribute for the ticket
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_models');
    }
};