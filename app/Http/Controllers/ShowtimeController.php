<?php

namespace App\Http\Controllers;

use App\Models\ShowtimeModel;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the showtimes.
     */
    public function index()
    {
        $showtimes = ShowtimeModel::all();
        return response()->json($showtimes, 200);
    }

    /**
     * Store a newly created showtime in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cinema_model_id' => 'required|exists:cinema_models,id',
            'movie_model_id' => 'required|exists:movie_models,id',
            'showtime' => 'required|date',
        ]);

        $showtime = ShowtimeModel::create($request->all());
        return response()->json([
            'message' => 'Showtime created successfully!',
            'showtime' => $showtime
        ], 201);
    }

    /**
     * Display the specified showtime.
     */
    public function show($id)
    {
        $showtime = ShowtimeModel::find($id);

        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found!'], 404);
        }

        return response()->json($showtime, 200);
    }

    /**
     * Update the specified showtime in storage.
     */
    public function update(Request $request, $id)
    {
        $showtime = ShowtimeModel::find($id);

        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found!'], 404);
        }

        $request->validate([
            'cinema_model_id' => 'sometimes|required|exists:cinema_models,id',
            'movie_model_id' => 'sometimes|required|exists:movie_models,id',
            'showtime' => 'sometimes|required|date',
        ]);

        $showtime->update($request->all());
        return response()->json([
            'message' => 'Showtime updated successfully!',
            'showtime' => $showtime
        ], 200);
    }

    /**
     * Remove the specified showtime from storage.
     */
    public function destroy($id)
    {
        $showtime = ShowtimeModel::find($id);

        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found!'], 404);
        }

        $showtime->delete();
        return response()->json(['message' => 'Showtime deleted successfully!'], 200);
    }
}