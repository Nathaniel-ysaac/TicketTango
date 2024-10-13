<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHallModel extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'cinema_hall_models'; 

    // Specify the primary key
    protected $primaryKey = 'id'; 

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'HallName',
        'Capacity',
    ];
}
