<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CinemaModel;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = CinemaModel::all();
        return response()->json($cinemas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cinema_hall' => 'required|string|max:255',
        ]);

        $cinema = CinemaModel::create($request->only('cinema_hall'));

        return response()->json([
            'message' => 'Cinema created successfully.',
            'cinema' => $cinema
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema = CinemaModel::find($id);
        if (!$cinema) {
            return response()->json(['message' => 'Cinema not found.'], 404);
        }
        return response()->json($cinema);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cinema_hall' => 'required|string|max:255',
        ]);

        $cinema = CinemaModel::find($id);
        if (!$cinema) {
            return response()->json(['message' => 'Cinema not found.'], 404);
        }

        $cinema->update($request->only('cinema_hall'));

        return response()->json([
            'message' => 'Cinema updated successfully.',
            'cinema' => $cinema
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cinema = CinemaModel::find($id);
        if (!$cinema) {
            return response()->json(['message' => 'Cinema not found.'], 404);
        }

        $cinema->delete();

        return response()->json(['message' => 'Cinema deleted successfully.']);
    }
}