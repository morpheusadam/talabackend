<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User; // Ensure this path is correct for your User model

class CheckRoleController
{
    /**
     * Check the role of the user by email.
     */
    public function checkRole(Request $request)
    {
        $email = $request->input('email');

        if (!$email) {
            return Response::json(['error' => 'Email is required'], 400);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return Response::json(['error' => 'User not found'], 404);
        }

        return Response::json(['role' => $user->role], 200);
    }
}
