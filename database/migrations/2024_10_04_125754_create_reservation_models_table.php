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
            $table->id("ReservationID");
            // $table->foreign("UserID")->references("UserID")->on("user_models");
            $table->foreignIdFor(UserModel::class,"UserID");
            //$table->foreignIdFor("user_models","UserID");
            $table->date("ReservationDate",);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_models');
    }
};
