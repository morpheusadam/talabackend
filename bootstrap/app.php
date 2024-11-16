<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        App\Providers\AppServiceProvider::class,
        App\Providers\AdminPanelProvider::class,
    ])
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([
            // Add any middleware you need here
            // App\Http\Middleware\AddSeoDefaults::class,
        ]);

        $middleware->redirectTo(fn () => Filament\Pages\Dashboard::getUrl());
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Add any custom exception handling logic here
        // Example: $exceptions->reportable(fn (Throwable $e) => $exceptions->handler->shouldReport($e));
    })->create();