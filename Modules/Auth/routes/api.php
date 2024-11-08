<?php

use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

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

// Define versioned API routes
$api->version('v1', function ($api) {
    // Public routes
    $api->post('register', [AuthController::class, 'register']);
    $api->post('login', [AuthController::class, 'login']);

    // Protected routes
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('user', function (Request $request) {
            return $request->user();
        });

        $api->post('logout', [AuthController::class, 'logout']);
        $api->get('check-status', [AuthController::class, 'checkLoginStatus']);
    });
});
