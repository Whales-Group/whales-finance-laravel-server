<?php

use App\Http\Middleware\HandleCors;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . "/../routes/web.php",
        api: __DIR__ . "/../routes/api.php",
        commands: __DIR__ . "/../routes/console.php",
        health: "/up"
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            "abilities" =>
                \Laravel\Sanctum\Http\Middleware\CheckAbilities::class,
            "ability" =>
                \Laravel\Sanctum\Http\Middleware\CheckForAnyAbility::class,
            "VerifyApiKey" => \App\Http\Middleware\ApiKeyMiddleware::class,
            "SetStructure" => \App\Http\Middleware\StructuralMiddleware::class,
        ]);
        $middleware->append(HandleCors::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {})
    ->create();
