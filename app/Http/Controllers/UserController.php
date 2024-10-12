<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        DB::insert("INSERT INTO user_models(Username,Password) VALUES (?,? )" , [$request->username,$request->password]);
        return response("Successfully Created.");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user=DB::table("user_models")->where("username", $request->username);
        if ( $user->exists() !== true)return response("User does not exist.",404);
        if ($user->value("password") === $request->password) return response("User logged in successfully.",200);
        return response("Password is incorrect.",401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=DB::table("user_models")->where("UserID", $id);
        if ( $user->exists() !== true)return response("User does not exist.",404);
        if ($user->value("password") === $request->password){ 
            DB::table("user_models")->where ("UserID", $id)->update(["Password"=> $request->new_password]);
            return response("Password is correct.",200);}
        return response("Password is incorrect.",401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if (DB::table("user_models")->where("UserID", $id)->exists()===false)return response("User does not exist.",404);
        $user=DB::table("user_models")->where("UserID", $id);
        if ($user->value("password") !== $request->password){
        return response("Unsuccessful Operation.",401);}
        $user->delete();
        return response("Successfully Deleted.",200);
    }
}
