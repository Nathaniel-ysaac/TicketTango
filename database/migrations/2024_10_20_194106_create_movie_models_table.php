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
            $table->id();
            $table->string('title'); // Title of the movie
            $table->string('genre'); // Genre of the movie
            $table->integer('duration'); // Duration in minutes
            $table->string('language'); // Language of the movie
            $table->timestamps();
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