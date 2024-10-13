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
        Schema::create('movie_models', function (Blueprint $table) {
            $table->id("MovieID");
            $table->string("Title", 255); // Using string for flexibility
            $table->string("Genre", 255)->index(); // Adding an index
            $table->integer("Duration")->unsigned(); // Unsigned to avoid negative values
            $table->string("Language", 255);
            $table->timestamps(); // Adding timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_models');
    }
};