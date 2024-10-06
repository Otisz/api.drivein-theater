<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieCoverController;

Route::middleware('auth:api')->group(function () {
    Route::match(['put', 'patch'], 'movies/{movie}/cover', MovieCoverController::class)->name('movies.cover');
    Route::apiResource('movies', MovieController::class)->only('store', 'update', 'destroy');
    Route::apiResource('agenda', AgendaController::class)->only('store', 'update', 'destroy');
});

Route::apiResource('movies', MovieController::class)->only('index', 'show');
Route::apiResource('agenda', AgendaController::class)->only('index', 'show');
