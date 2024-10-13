<?php

namespace App\Http\Controllers;

use App\Models\MovieModel;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $json_body = $request->json()->all();
        
        MovieModel::create([
            "Title" => $json_body["title"],
            "Genre" => $json_body["genre"],
            "Duration" => $json_body["duration"],
            "Language" => $json_body["language"],
        ]);
        
        return response("Successfully Created.", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response("Movie not found.", 404);
        }

        return response()->json($movie, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $json_body = $request->json()->all();
        
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response("Movie not found.", 404);
        }

        $movie->update([
            'Title' => $json_body['title'],
            'Genre' => $json_body['genre'],
            'Duration' => $json_body['duration'],
            'Language' => $json_body['language'],
        ]);

        return response("Movie successfully updated.", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = MovieModel::find($id);

        if (!$movie) {
            return response("Movie not found.", 404);
        }

        $movie->delete();

        return response("Movie successfully deleted.", 200);
    }
}
