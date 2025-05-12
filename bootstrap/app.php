<?php

use App\Http\Middleware\AddSeoDefaults;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminatech\UrlTrailingSlash\Middleware\RedirectTrailingSlash;
use Illuminatech\UrlTrailingSlash\RoutingServiceProvider;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->web(RedirectTrailingSlash::class);
        $middleware->web(AddSeoDefaults::class);

        $middleware->throttleApi();

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

$app->register(new RoutingServiceProvider($app));

return $app;
