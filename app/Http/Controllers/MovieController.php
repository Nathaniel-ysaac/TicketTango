<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::insert("INSERT INTO movie_models(Title,Genre,Duration,Language) VALUES (?,?,?,?)" , [$request->title,$request->genre,$request->duration,$request->language]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        DB::table("movie_models")->where("MovieID", $id)->get()->toJson();
        return DB::table("movie_models")->where("MovieID", $id)->get()->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table("movie_models")->where ("MovieID", $id)->update(["Title" => $request->title,"Genre"=> $request->genre,"Duration"=> $request->duration,"Language"=> $request->language]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table("movie_models")->where("MovieID", $id)->exists()===false)return response("Movie does not exist.",404);
        DB::table("movie_models")->where("MovieID", $id)->delete();
        return response("Successfully Deleted.",200);
    }
}
