<?php

use App\Http\Controllers\ReservationController;
use App\Models\ReservationModel;
use App\Http\Controllers\SeatController;
use App\Models\SeatModel;
use App\Http\Controllers\TicketController;
use App\Models\TicketModel;
use App\Http\Controllers\MovieController;
use App\Models\MovieModel;
use App\Http\Controllers\UserController;
use App\Models\UserModel;
use App\Http\Controllers\CinemaHallController;
use App\Models\CinemaHallModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return "Hello World";
});
//RESERVATION
//Route::get("/reservation/{user_id}");

//SEAT MODEL ITO
// Route for listing all seats
Route::get('/seats', [SeatController::class, 'index']);
Route::post('/seats', [SeatController::class, 'store']);
Route::get('/seats/{id}', [SeatController::class, 'show']);
Route::put('/seats/{id}', [SeatController::class, 'update']);
Route::delete('/seats/{id}', [SeatController::class, 'destroy']);


//RESERVATION MODEL ITO
Route::post("/reservations", [ReservationController::class, "store"]);
Route::get("/reservations/{id}", [ReservationController::class, "show"]);
Route::put("/reservations/{id}", [ReservationController::class, "update"]);
Route::delete("/reservations/{id}", [ReservationController::class, "destroy"]);

//SHOWTIME MODEL ITO
Route::post("/showtimes", [ShowtimeController::class, "store"]);
Route::get("/showtimes/{id}", [ShowtimeController::class, "show"]);
Route::put("/showtimes/{id}", [ShowtimeController::class, "update"]);
Route::delete("/showtimes/{id}", [ShowtimeController::class, "destroy"]);


//TICKET MODEL ITO
Route::post("/ticket", [TicketController::class, "store"]);
Route::get("/ticket/{id}", [TicketController::class, "show"]);
Route::put("/ticket/{id}", [TicketController::class, "update"]);
Route::delete("/ticket/{id}", [TicketController::class, "destroy"]);

//MOVIE MODEL ITO
Route::post("/movies", [MovieController::class, "store"]);
Route::get("/movies/{id}", [MovieController::class, "show"]);
Route::put("/movies/{id}", [MovieController::class, "update"]);
Route::delete("/movies/{id}", [MovieController::class, "destroy"]);

//USER MODEL ITO
Route::put("/user/{id}/{password}/{new_password}", [UserController::class,"update"]);
Route::delete("/user/{id}/{password}",[UserController::class,"destroy"]);
Route::get("/user",[UserController::class,"show"]);
Route::post("/user",[UserController::class,"store"]);

//CINEMA HALL MODEL ITO
Route::get("/cinema_halls", [CinemaHallController::class, "index"]);
Route::post("/cinema_halls", [CinemaHallController::class, "store"]);
Route::get("/cinema_halls/{id}", [CinemaHallController::class, "show"]);
Route::put("/cinema_halls/{id}", [CinemaHallController::class, "update"]);
Route::delete("/cinema_halls/{id}", [CinemaHallController::class, "destroy"]);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
