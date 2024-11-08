<?php

use Illuminate\Support\Facades\Route;
use Modules\Mag\Http\Controllers\MagController;

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

$api->version('v1', function ($api) {
    $api->get('hello', function () {
        return response()->json(['message' => 'Hello, World!']);
    });
});
