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
        Schema::create('seat_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showtime_model_id')->constrained('showtime_models')->onDelete('cascade'); // Foreign key to ShowtimeModel
            $table->string('row'); // Attribute for Row
            $table->integer('seat_number'); // Attribute for Seat Number
            $table->boolean('is_available')->default(true); // Attribute for availability, default to true
            $table->timestamps();
            //test
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_models');
    }
};