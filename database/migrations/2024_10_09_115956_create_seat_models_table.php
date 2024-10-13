<?php

use App\Models\CinemaHallModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatModelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seat_models', function (Blueprint $table) {
            $table->id("SeatID"); // Creates a primary key with custom name SeatID
            $table->foreignIdFor(CinemaHallModel::class, "CinemaHallID") // Foreign key reference
                  ->constrained('cinema_hall_models', 'id') // Ensure the correct table and column are referenced
                  ->onDelete('cascade'); // Defines cascade on delete
            $table->char("RowNumber"); // Row number column
            $table->integer("SeatNumber"); // Seat number column
            $table->boolean("is_available"); // Availability column
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('seat_models'); // Drops the table if it exists
    }
}
