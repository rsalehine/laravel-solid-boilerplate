<?php

use App\Exceptions\AppException;
use App\Utils\ApiResponser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (ValidationException $e, $request) {
            return ApiResponser::error(message: $e->getMessage());
        });

        $exceptions->render(function (AccessDeniedHttpException $e, $request) {
            $message = config('messages.unauth');
            return ApiResponser::error(message: $message['message'], code: $message['code']);
        });

        $exceptions->render(function (AppException $e, $request) {
            return ApiResponser::error(message: $e->getMessage(), code: $e->getCode(), http_code: $e->getCode());
        });
        
    })->create();
