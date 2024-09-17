<?php

use App\Exceptions\AppError;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $error, Request $request) {
            if($error instanceof ValidationException){
                return response()->json([
                    'error' => $error->validator->errors()
                ], 422);
            }

            if($error instanceof AppError){
                return response()->json([
                    'error' => $error->getMessage()
                ], $error->getCode());
            }

            /* return response()->json([
                'error' => 'Server internal error'
            ], $error->getCode()); */
        });
        /* $exceptions->render(function (AppError $e, Request $request) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getCode());
        }); */
    })->create();
