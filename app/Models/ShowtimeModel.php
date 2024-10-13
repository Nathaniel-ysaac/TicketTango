<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowtimeModel extends Model
{
    use HasFactory;

    protected $table = 'showtime_models'; // Specify the table name if different from the model name
    protected $primaryKey = 'ShowtimeID'; // Specify the primary key if not the default 'id'
    
    protected $fillable = [
        'MovieID', // Foreign key for Movie
        'CinemaHallID', // Foreign key for Cinema Hall
        'DateTime', // Date and time of the show
    ];

    // Define relationships
    public function movie()
    {
        return $this->belongsTo(MovieModel::class, 'MovieID', 'MovieID');
    }

    public function cinemaHall()
    {
        return $this->belongsTo(CinemaHallModel::class, 'CinemaHallID', 'CinemaHallID');
    }
}
