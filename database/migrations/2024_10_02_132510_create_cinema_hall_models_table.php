<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaHallModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * This method creates the cinema_hall_models table with the following fields:
     * - id: Primary key for the hall
     * - HallName: Name of the cinema hall
     * - Capacity: Seating capacity of the hall
     * - timestamps: Created at and updated at timestamps
     */
    public function up()
    {
        Schema::create('cinema_hall_models', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing unsigned big integer as the primary key
            $table->string('HallName', 255); // Hall name column with a maximum length of 255 characters
            $table->integer('Capacity'); // Capacity column for the number of seats
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the cinema_hall_models table if it exists.
     */
    public function down()
    {
        Schema::dropIfExists('cinema_hall_models'); // Drops the table if it exists
    }
}
