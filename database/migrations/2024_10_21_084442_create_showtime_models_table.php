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
        Schema::create('showtime_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cinema_model_id')->constrained('cinema_models')->onDelete('cascade'); // Foreign key to CinemaModel
            $table->foreignId('movie_model_id')->constrained('movie_models')->onDelete('cascade'); // Foreign key to MovieModel
            $table->dateTime('showtime'); // Attribute for DateTime
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtime_models');
    }
};