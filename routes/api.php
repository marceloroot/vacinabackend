<?php

use App\Http\Controllers\web\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('cliente', [ClienteController::class, 'store']);

Route::get('cliente/{id}', [ClienteController::class, 'show']);



Route::middleware('auth:api')->group(function () {
    Route::get('clienteid/{id}', [ClienteController::class, 'showid']);
    Route::get('cliente', [ClienteController::class, 'index']);
    Route::put('cliente/{id}', [ClienteController::class, 'update']);
});
