<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApitoken
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $apiToken = $request->header('Authorization');

        if ($apiToken !== env('API_TOKEN')) {
            return response()->json(['error' => 'API token is invalid'], 403);
        }

        return $next($request);
    }
}
