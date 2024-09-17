<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'getAll'])->middleware([JWTMiddleware::class]);

Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/forget-password', [AuthController::class, 'login']);
    // Route::post('/send-password', [AuthController::class, 'login']);
});