<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth; // Added for JWT
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $r)
    {
        $validatedData = $r->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $customerRole = Role::where('role_name', 'customer')->first();
        if ($customerRole) {
            $user->roles()->attach($customerRole->id);
        }

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $r)
    {
        $validatedData = $r->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $user = Auth::user();
            try {
                // Create a JWT token
                $token = JWTAuth::attempt($validatedData);

                // Format the response
                return response()->json([
                    'success' => true,
                    'token' => $token,
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ],
                ], 200);
            } catch (JWTException $e) {
                return response()->json(['message' => 'Could not create token'], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }






    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }




    public function checkLoginStatus(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['message' => 'User is logged in', 'user' => Auth::user()], 200);
        }

        return response()->json(['message' => 'User is not logged in'], 401);
    }
    public function checkRoleByEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $roles = $user->roles()->pluck('role_name');

        return response()->json(['email' => $user->email, 'roles' => $roles], 200);
    }

}
