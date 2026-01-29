<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ListController;

Route::middleware(function ($request, $next) {
    return $next($request)
        ->header('Access-Control-Allow-Origin', 'http://localhost:4200')
        ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
})->group(function () {

    Route::post('/mutation', [MutationController::class, 'detect']);
    Route::get('/stats', [StatsController::class, 'index']);
    Route::get('/list', [ListController::class, 'index']);

});