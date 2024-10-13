<?php

namespace App\Http\Controllers;

use App\Models\SeatModel;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of seats.
     */
    public function index()
    {
        $seats = SeatModel::all(); // Retrieve all seats
        return response()->json($seats, 200);
    }

    /**
     * Store a newly created seat in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CinemaHallID' => 'required|exists:cinema_hall_models,id',
            'RowNumber' => 'required|string|max:10',
            'SeatNumber' => 'required|integer',
            'is_available' => 'boolean',
        ]);

        $seat = SeatModel::create([
            'CinemaHallID' => $request->CinemaHallID,
            'RowNumber' => $request->RowNumber,
            'SeatNumber' => $request->SeatNumber,
            'is_available' => $request->is_available ?? true, // Default to true if not provided
        ]);

        return response()->json($seat, 201); // Return the created seat
    }

    /**
     * Display the specified seat.
     */
    public function show($id)
    {
        $seat = SeatModel::find($id);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found.'], 404);
        }

        return response()->json($seat, 200);
    }

    /**
     * Update the specified seat in storage.
     */
    public function update(Request $request, $id)
    {
        $seat = SeatModel::find($id);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found.'], 404);
        }

        $request->validate([
            'CinemaHallID' => 'sometimes|required|exists:cinema_hall_models,id',
            'RowNumber' => 'sometimes|required|string|max:10',
            'SeatNumber' => 'sometimes|required|integer',
            'is_available' => 'sometimes|boolean',
        ]);

        $seat->update($request->only(['CinemaHallID', 'RowNumber', 'SeatNumber', 'is_available']));

        return response()->json($seat, 200);
    }

    /**
     * Remove the specified seat from storage.
     */
    public function destroy($id)
    {
        $seat = SeatModel::find($id);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found.'], 404);
        }

        $seat->delete();

        return response()->json(['message' => 'Seat successfully deleted.'], 200);
    }
}
