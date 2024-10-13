<?php

namespace App\Http\Controllers;

use App\Models\ShowtimeModel;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = ShowtimeModel::with(['movie', 'cinemaHall'])->get();
        return response()->json($showtimes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MovieID' => 'required|exists:movie_models,MovieID',
            'CinemaHallID' => 'required|exists:cinema_hall_models,CinemaHallID',
            'DateTime' => 'required|date',
        ]);

        $showtime = ShowtimeModel::create($request->all());
        return response()->json($showtime, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $showtime = ShowtimeModel::with(['movie', 'cinemaHall'])->find($id);
        
        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found'], 404);
        }

        return response()->json($showtime);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MovieID' => 'sometimes|required|exists:movie_models,MovieID',
            'CinemaHallID' => 'sometimes|required|exists:cinema_hall_models,CinemaHallID',
            'DateTime' => 'sometimes|required|date',
        ]);

        $showtime = ShowtimeModel::find($id);

        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found'], 404);
        }

        $showtime->update($request->all());
        return response()->json($showtime);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $showtime = ShowtimeModel::find($id);

        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found'], 404);
        }

        $showtime->delete();
        return response()->json(['message' => 'Showtime deleted successfully'], 200);
    }
}
