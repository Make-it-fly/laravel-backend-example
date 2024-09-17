<?php

use App\Http\Controllers\UserController;
use App\Livewire\Counter;
use App\Livewire\Teste;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/counter', Counter::class);

Route::get('/teste', Teste::class);

Route::get('/greeting', function () {
    return 'Hello World';
});