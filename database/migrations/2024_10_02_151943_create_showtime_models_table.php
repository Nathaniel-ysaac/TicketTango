<?php

use App\Models\CinemaHallModel;
use App\Models\MovieModel;
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
            $table->id("ShowtimeID");
            // $table->foreign("MovieID")->references("MovieID")->on("movie_models");
            $table->foreignIdFor(MovieModel::class,"MovieID");
            //$table->foreign("MovieID")->references("MovieID")->on("movie_models");
            $table->datetime("DateTime");
            //$table->foreign("CinemaHallID")->references("CinemaHallID")->on("cinema_hall_models");
            //$table->foreign("CinemaHallID")->references("CinemaHallID")->on("cinema_hall_models");
            $table->foreignIdFor(CinemaHallModel::class,"CinemaHallID");
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
