<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieCoverController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth:api')->group(function () {
    Route::get('@me', [ProfileController::class, 'me'])->name('profile.me');
    Route::delete('@me/logout', [ProfileController::class, 'logout'])->name('profile.logout');

    Route::match(['put', 'patch'], 'movies/{movie}/cover', MovieCoverController::class)->name('movies.cover');
    Route::apiResource('movies', MovieController::class)->only('store', 'update', 'destroy');
    Route::apiResource('agenda', AgendaController::class)->only('store', 'update', 'destroy');
});

Route::apiResource('movies', MovieController::class)->only('index', 'show');
Route::apiResource('agenda', AgendaController::class)->only('index', 'show');
