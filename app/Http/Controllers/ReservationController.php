<?php

namespace App\Http\Controllers;

use App\Models\ReservationModel;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Store a newly created reservation in storage.
     */
    public function store(Request $request)
    {
        $json_body = $request->json()->all();
        
        // Create a new reservation
        ReservationModel::create([
            'UserID' => $json_body['UserID'],
            'ReservationDate' => $json_body['ReservationDate'],
        ]);
        
        return response("Reservation successfully created.", 201);
    }

    /**
     * Display the specified reservation.
     */
    public function show(string $id)
    {
        // Find the reservation by ID
        $reservation = ReservationModel::find($id);

        // Check if the reservation exists
        if (!$reservation) {
            return response("Reservation not found.", 404);
        }

        // Return the reservation data
        return response()->json($reservation, 200);
    }

    /**
     * Update the specified reservation in storage.
     */
    public function update(Request $request, string $id)
    {
        $json_body = $request->json()->all();
        
        // Find the reservation by ID
        $reservation = ReservationModel::find($id);

        // Check if the reservation exists
        if (!$reservation) {
            return response("Reservation not found.", 404);
        }

        // Update the reservation details
        $reservation->update([
            'UserID' => $json_body['UserID'],
            'ReservationDate' => $json_body['ReservationDate'],
        ]);

        return response("Reservation successfully updated.", 200);
    }

    /**
     * Remove the specified reservation from storage.
     */
    public function destroy(string $id)
    {
        // Find the reservation by ID
        $reservation = ReservationModel::find($id);

        // Check if the reservation exists
        if (!$reservation) {
            return response("Reservation not found.", 404);
        }

        // Delete the reservation
        $reservation->delete();

        return response("Reservation successfully deleted.", 200);
    }
}
