<?php

use App\Models\UserModel;
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
        Schema::create('reservation_models', function (Blueprint $table) {
            $table->id("ReservationID"); // Creates an unsigned bigint primary key
            $table->foreignIdFor(UserModel::class, "UserID"); // Ensure UserID is also valid
            $table->date("ReservationDate");
            $table->timestamps(); // Optional: adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_models'); // Drops the table if it exists
    }
};
