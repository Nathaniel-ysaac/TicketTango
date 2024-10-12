<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
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
        DB::insert("INSERT INTO reservation_models(UserID,ShowtimeID,ReservationDate) VALUES (?,?,?)" , [$request->UserID,$request->ShowtimeID,$request->ReservationDate]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        return DB::table("reservation_models")->where("UserID", $user_id)->get()->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
