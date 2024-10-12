<?php

use App\Models\CinemaHallModel;
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
            $table->id("SeatID");
            $table->foreignIdFor(CinemaHallModel::class,"CinemaHallID");
            $table->char("RowNumber");
            $table->integer("SeatNumber");
            $table->boolean("is_available");
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
