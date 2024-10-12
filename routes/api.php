<?php

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
//MOVIE MODEL ITO
Route::put("/movie/{id}/{title}/{genre}/{duration}/{language}", [MovieController::class,"update"]);
Route::delete("/movie/{title}/{genre}/{duration}/{language}",[MovieController::class,"destroy"]);
Route::get("/movie/{id}",[MovieController::class,"show"]);
Route::post("/movie/{title}/{genre}/{duration}/{language}",[MovieController::class,"store"]);

//USER MODEL ITO
Route::put("/user/{id}/{password}/{new_password}", [UserController::class,"update"]);
Route::delete("/user/{id}/{password}",[UserController::class,"destroy"]);
Route::get("/user/{username}/{password}",[UserController::class,"show"]);
Route::post("/user/{username}/{password}",[UserController::class,"store"]);

//CINEMA HALL MODEL ITO
Route::put("/hall/{id}/{hallname}/{capacity}", [CinemaHallController::class,"update"]);
Route::delete("/hall/{hallname}/{capacity}",[CinemaHallController::class,"destroy"]);
Route::get("/hall/{id}",[CinemaHallController::class,"show"]);
Route::post("/hall/{hallname}/{capacity}",[CinemaHallController::class,"store"]);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
