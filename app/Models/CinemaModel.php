<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaModel extends Model
{
    use HasFactory;

    protected $fillable = ['cinema_hall']; // Add CinemaHall to fillable attributes
}