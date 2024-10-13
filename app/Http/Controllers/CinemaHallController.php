<?php

namespace App\Http\Controllers;

use App\Models\CinemaHallModel;
use Illuminate\Http\Request;

class CinemaHallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all cinema halls
        return response()->json(CinemaHallModel::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $json_body = $request->json()->all();
        $cinemaHall = CinemaHallModel::create([
            'HallName' => $json_body['HallName'],
            'Capacity' => $json_body['Capacity']
        ]);
        return response()->json($cinemaHall, 201); // Return the created resource
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cinemaHall = CinemaHallModel::find($id);

        if (!$cinemaHall) {
            return response("Cinema Hall does not exist.", 404);
        }

        return response()->json($cinemaHall, 200); // Return the specific cinema hall
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $json_body = $request->json()->all();
        $cinemaHall = CinemaHallModel::find($id);

        if (!$cinemaHall) {
            return response("Cinema Hall does not exist.", 404);
        }

        // Update cinema hall details
        $cinemaHall->update([
            'HallName' => $json_body['HallName'],
            'Capacity' => $json_body['Capacity']
        ]);

        return response()->json($cinemaHall, 200); // Return updated cinema hall
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cinemaHall = CinemaHallModel::find($id);

        if (!$cinemaHall) {
            return response("Cinema Hall does not exist.", 404);
        }

        $cinemaHall->delete(); // Delete the cinema hall

        return response("Successfully Deleted.", 200);
    }
}
