<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketModelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_models', function (Blueprint $table) {
            $table->id('TicketID'); // Primary key

            //AYAW GUMANA NG MIGRATION NANG DAHIL SA RESERVATIONID NA FOREIGN KEY KAYA NAKA COMMENT MUNA HAHHAHAHAHHA

            // $table->unsignedBigInteger('ReservationID'); // Define as unsigned bigint

            // // Foreign key constraint
            // $table->foreign('ReservationID')
            //       ->references('ReservationID') // Reference to ReservationID in reservation_models
            //       ->on('reservation_models')
            //       ->onDelete('cascade'); // Cascade delete if the reservation is deleted

            $table->char('TicketType', 255); // Type of the ticket
            $table->decimal('Price', 10, 2); // Price of the ticket
            $table->timestamps(); // Adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_models', function (Blueprint $table) {
            // $table->dropForeign(['ReservationID']); // Drop the foreign key
        });
        Schema::dropIfExists('ticket_models'); // Drop the ticket_models table
    }
}
