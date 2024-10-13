<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default
    protected $table = 'movie_models'; 

    // Specify the primary key if it's different from the default 'id'
    protected $primaryKey = 'MovieID';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'Title',
        'Genre',
        'Duration',
        'Language',
    ];

    // Optional: You can disable timestamps if you don't need them
    public $timestamps = false; // Set to true if you want to use created_at and updated_at
}
