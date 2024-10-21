<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Create a new user (Sign up).
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|not_regex:/\s/',
            'password' => 'required|string|min:8|confirmed|not_regex:/\s/', // No spaces allowed
        ]);
    }catch(ValidationException  $e){
        return  response()->json(['error' => $e->errors()], 422);
    }catch(\Exception  $err){
        return  response()->json(['error' => 'There was a problem in validation'], 422);
    }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User   created successfully.',
            'user' => $user
        ], 201);
    }

    /**
     * Log in a user using either username or email.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the input is an email or username
        $field = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (!Auth::attempt([$field => $request->username_or_email, 'password' => $request->password])) {
            throw ValidationException::withMessages([
                'username_or_email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = Auth::user();
        return response()->json([
            'message' => 'Login successful.',
            'user' => $user
        ], 200);
    }

    /**
     * Log out the user.
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out.'], 200);
    }

    /**
     * Show user details by ID.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user], 200);
    }

    /**
     * Update user information by ID.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed|not_regex:/\s/', // No spaces allowed
        ]);

        $data = $request->only('name', 'email');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message' => 'User   updated successfully.',
            'user' => $user
        ], 200);
    }

    /**
     * Delete the user by ID.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User   deleted successfully.'], 200);
    }

    /**
     * Reset the user's password.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed|not_regex:/\s/', // No spaces allowed
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User   not found.'], 404);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password reset successfully.'], 200);
    }
}