<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TicketController;

Route::middleware('api')->group(function () {
    // User Routes
    // Create a new user (Sign up)
    Route::post('/users', [UserController::class, 'store']); 
    // Login a user using username or email
    Route::post('/login', [UserController::class, 'login']);    
    // Logout a user
    Route::post('/logout', [UserController::class, 'logout']); 
    // Show a user by ID
    Route::get('/users/{id}', [UserController::class, 'show']); 
    // Update user information by ID
    Route::put('/users/{id}', [UserController::class, 'update']); 
    // Delete a user by ID
    Route::delete('/users/{id}', [UserController::class, 'destroy']); 
    // Reset user password
    Route::post('/reset-password', [UserController::class, 'resetPassword']); 

    // Cinema Routes
    // Get all cinemas
    Route::get('/cinemas', [CinemaController::class, 'index']); // List all cinemas
    // Create a new cinema
    Route::post('/cinemas', [CinemaController::class, 'store']); // Store a new cinema
    // Show a cinema by ID
    Route::get('/cinemas/{id}', [CinemaController::class, 'show']); // Show a specific cinema
    // Update cinema information by ID
    Route::put('/cinemas/{id}', [CinemaController::class, 'update']); // Update a specific cinema
    // Delete a cinema by ID
    Route::delete('/cinemas/{id}', [CinemaController::class, 'destroy']); // Delete a specific cinema

    // Movie Routes
    // Display a listing of the movies
    Route::get('/movies', [MovieController::class, 'index']); 
    // Store a newly created movie
    Route::post('/movies', [MovieController::class, 'store']); 
    // Show a specific movie by ID
    Route::get('/movies/{id}', [MovieController::class, 'show']); 
    // Update a specific movie by ID
    Route::put('/movies/{id}', [MovieController::class, 'update']); 
    // Delete a specific movie by ID
    Route::delete('/movies/{id}', [MovieController::class, 'destroy']);

    // Showtime Routes
    // Display a listing of the showtimes
    Route::get('/showtimes', [ShowtimeController::class, 'index']); 
    // Store a newly created showtime
    Route::post('/showtimes', [ShowtimeController::class, 'store']); 
    // Show a specific showtime by ID
    Route::get('/showtimes/{id}', [ShowtimeController::class, 'show']); 
    // Update a specific showtime by ID
    Route::put('/showtimes/{id}', [ShowtimeController::class, 'update']); 
    // Delete a specific showtime by ID
    Route::delete('/showtimes/{id}', [ShowtimeController::class, 'destroy']);

    // Seat Routes
    // Display a listing of the seats
    Route::get('/seats', [SeatController::class, 'index']); 
    // Store a newly created seat
    Route::post('/seats', [SeatController::class, 'store']); 
    // Show a specific seat by ID
    Route::get('/seats/{id}', [SeatController::class, 'show']); 
    // Update a specific seat by ID
    Route::put('/seats/{id}', [SeatController::class, 'update']); 
    // Delete a specific seat by ID
    Route::delete('/seats/{id}', [SeatController::class, 'destroy']);

    // Ticket Routes
    // Display a listing of the tickets
    Route::get('/tickets', [TicketController::class, 'index']); 
    // Store a newly created ticket
    Route::post('/tickets', [TicketController::class, 'store']); 
    // Show a specific ticket by ID
    Route::get('/tickets/{id}', [TicketController::class, 'show']); 
    // Update a specific ticket by ID
    Route::put('/tickets/{id}', [TicketController::class, 'update']); 
    // Delete a specific ticket by ID
    Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);
});

// Welcome message for the API
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API!']);
});