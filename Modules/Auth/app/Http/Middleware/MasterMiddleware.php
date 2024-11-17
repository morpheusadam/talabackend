<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MasterMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $adminApiToken = env('ADMIN_API_TOKEN');

        if ($request->header('API-TOKEN') !== $adminApiToken) {
            return Response::json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
