<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index()
    {
        $movies = MovieModel::all();
        return response()->json($movies, 200);
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'language' => 'required|string|max:255',
        ]);

        $movie = MovieModel::create($request->all());
        return response()->json([
            'message' => 'Movie created successfully!',
            'movie' => $movie
        ], 201);
    }

    /**
     * Display the specified movie.
     */
    public function show($id)
    {
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found!'], 404);
        }

        return response()->json($movie, 200);
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found!'], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'duration' => 'sometimes|required|integer|min:1',
            'language' => 'sometimes|required|string|max:255',
        ]);

        $movie->update($request->all());
        return response()->json([
            'message' => 'Movie updated successfully!',
            'movie' => $movie
        ], 200);
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy($id)
    {
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found!'], 404);
        }

        $movie->delete();
        return response()->json(['message' => 'Movie deleted successfully!'], 200);
    }
}