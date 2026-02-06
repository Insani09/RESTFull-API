<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChocoController;

use App\Http\Controllers\Api\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', RegisterController::class);
// Route::post('/login', LoginController::class); // LoginController belum memiliki method __invoke

Route::apiResource('chocos', ChocoController::class);
// Route::post('chocos/filter', [ChocoController::class, 'filter']);
Route::post('/register', RegisterController::class);
Route::post('login', LoginController::class);