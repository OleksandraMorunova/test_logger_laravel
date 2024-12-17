<?php

use App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logger/log', [LoggerController::class, 'log']);
Route::get('/logger/logTo/{type}', [LoggerController::class, 'logTo']);
Route::get('/logger/logToAll', [LoggerController::class, 'logToAll']);

