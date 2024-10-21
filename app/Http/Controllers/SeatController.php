<?php

namespace App\Http\Controllers;

use App\Models\SeatModel;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the seats.
     */
    public function index()
    {
        $seats = SeatModel::all();
        return response()->json($seats, 200);
    }

    /**
     * Store a newly created seat in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'showtime_model_id' => 'required|exists:showtime_models,id',
            'row' => 'required|string|max:255',
            'seat_number' => 'required|integer|min:1',
            'is_available' => 'required|boolean',
        ]);

        $seat = SeatModel::create($request->all());
        return response()->json([
            'message' => 'Seat created successfully!',
            'seat' => $seat
        ], 201);
    }

    /**
     * Display the specified seat.
     */
    public function show($id)
    {
        $seat = SeatModel::find($id);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found!'], 404);
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
            return response()->json(['message' => 'Seat not found!'], 404);
        }

        $request->validate([
            'showtime_model_id' => 'sometimes|required|exists:showtime_models,id',
            'row' => 'sometimes|required|string|max:255',
            'seat_number' => 'sometimes|required|integer|min:1',
            'is_available' => 'sometimes|required|boolean',
        ]);

        $seat->update($request->all());
        return response()->json([
            'message' => 'Seat updated successfully!',
            'seat' => $seat
        ], 200);
    }

    /**
     * Remove the specified seat from storage.
     */
    public function destroy($id)
    {
        $seat = SeatModel::find($id);

        if (!$seat) {
            return response()->json(['message' => 'Seat not found!'], 404);
        }

        $seat->delete();
        return response()->json(['message' => 'Seat deleted successfully!'], 200);
    }
}