<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model if different from the pluralized name
    protected $table = 'seat_models';

    // The attributes that are mass assignable
    protected $fillable = [
        'CinemaHallID',
        'RowNumber',
        'SeatNumber',
        'is_available',
    ];

    // Define the relationship with the CinemaHallModel
    public function cinemaHall()
    {
        return $this->belongsTo(CinemaHallModel::class, 'CinemaHallID');
    }
}
