<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChocoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LogoutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/chocos', ChocoController::class)->middleware('jwt');
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);