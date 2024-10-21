<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title',    // Title of the movie
        'genre',    // Genre of the movie
        'duration', // Duration in minutes
        'language'  // Language of the movie
    ];
}