<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowtimeModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name follows Laravel's conventions)
    protected $table = 'showtime_models';

    // Define the fillable attributes
    protected $fillable = [
        'cinema_model_id',
        'movie_model_id',
        'showtime',
    ];

    /**
     * Get the cinema associated with the showtime.
     */
    public function cinema()
    {
        return $this->belongsTo(CinemaModel::class, 'cinema_model_id');
    }

    /**
     * Get the movie associated with the showtime.
     */
    public function movie()
    {
        return $this->belongsTo(MovieModel::class, 'movie_model_id');
    }
}