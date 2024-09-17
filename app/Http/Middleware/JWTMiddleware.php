<?php

namespace App\Http\Middleware;

use App\Exceptions\AppError;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (\Throwable $error) {

            if ($error instanceof TokenInvalidException) {
                throw new AppError('Invalid token', 400);
            }
            if ($error instanceof TokenExpiredException) {
                throw new AppError('Expired token', 401);
            }

            throw new AppError($error->getMessage(), 500);
        }
    }
}
