<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatModel extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'seat_models';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'showtime_model_id', // Foreign key to ShowtimeModel
        'row',               // Row of the seat
        'seat_number',       // Seat number
        'is_available',      // Availability of the seat
    ];

    /**
     * Get the showtime associated with the seat.
     */
    public function showtime()
    {
        return $this->belongsTo(ShowtimeModel::class, 'showtime_model_id');
    }
}