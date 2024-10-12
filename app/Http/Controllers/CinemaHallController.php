<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CinemaHallController extends Controller
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
        DB::insert("INSERT INTO cinema_hall_models(HallName,Capacity) VALUES (?,? )" , [$request->hallname,$request->capacity]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        DB::table("cinema_hall_models")->where("CinemaHallID", $id)->get()->toJson();
        return DB::table("cinema_hall_models")->where("CinemaHallID", $id)->get()->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table("cinema_hall_models")->where ("CinemaHallID", $id)->update(["HallName" => $request->hallname,"Capacity"=> $request->capacity]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table("cinema_hall_models")->where("CinemaHallID", $id)->exists()===false)return response("Hall does not exist.",404);
        DB::table("cinema_hall_models")->where("CinemaHallID", $id)->delete();
        return response("Successfully Deleted.",200);
    }
}
