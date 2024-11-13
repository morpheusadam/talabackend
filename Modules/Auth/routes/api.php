<?php

use Dingo\Api\Http\Request;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\CheckRoleController;
use Modules\Auth\Http\Middleware\Token;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */

$api = app('Dingo\Api\Routing\Router');

// ... existing code ...

$api->version('v1', function ($api) {
    // Public routes
    $api->post('register', [AuthController::class, 'register']);
    $api->post('login', [AuthController::class, 'login']);

    // Protected routes
    $api->group([], function ($api) {
        $api->get('user', function (Request $request) {
            return $request->user();
        });

        $api->post('logout', [AuthController::class, 'logout']);
        $api->get('check-status', [AuthController::class, 'checkLoginStatus']);

        // New route for checking user role by email
   //    $api->post('check-role', [AuthController::class, 'checkRoleByEmail']);
   $api->post('check-role', [AuthController::class, 'checkRoleByEmail'])->middleware(Token::class);
});
});
