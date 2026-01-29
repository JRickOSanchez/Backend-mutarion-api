<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ListController;

Route::post('/mutation', [MutationController::class, 'detect']);
Route::get('/stats', [StatsController::class, 'index']);
Route::get('/list', [ListController::class, 'index']);