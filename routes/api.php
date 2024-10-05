<?php

use App\Http\Controllers\MovieController;

Route::middleware('auth:api')
    ->group(function () {
        Route::apiResource('movies', MovieController::class)->only('store', 'update');
    });

Route::apiResource('movies', MovieController::class)->only('show');
