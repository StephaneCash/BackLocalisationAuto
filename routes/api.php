<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::resource('specialistes', App\Http\Controllers\SpecialistesController::class)->except(['create', 'edit']);

Route::resource('specialites', App\Http\Controllers\SpecialitesController::class)->except(['create', 'edit']);

Route::resource('garages', App\Http\Controllers\GaragesController::class)->except(['create', 'edit']);
