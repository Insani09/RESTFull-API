<?php

use App\Http\Controllers\ChocoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/choco', [ChocoController::class, 'index']);
