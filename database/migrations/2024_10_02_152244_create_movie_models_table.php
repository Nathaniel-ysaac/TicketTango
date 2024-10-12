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
            $table->char("Title",255);
            $table->char("Genre",255);
            $table->integer("Duration");
            $table->char("Language",255);
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
