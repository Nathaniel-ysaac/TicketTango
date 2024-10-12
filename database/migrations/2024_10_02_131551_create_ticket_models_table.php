<?php

use App\Models\ReservationModel;
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
        Schema::create('ticket_models', function (Blueprint $table) {
            $table->id("TicketID");
            $table->foreignIdFor(ReservationModel::class,"ReservationID");
            //$table->foreign("ReservationID")->references("ReservationID")->on("reservation_models");
            $table->char("TicketType",255);
            $table->decimal("Price" ,10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_models');
    }
};
