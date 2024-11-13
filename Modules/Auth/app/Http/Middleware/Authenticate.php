<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // $user = Auth::user();

        // if (!$user || !$user->roles()->where('role_name', $role)->exists()) {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }

        return $next($request);
    }
}
