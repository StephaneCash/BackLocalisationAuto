<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('specialistes', App\Http\Controllers\SpecialistesController::class)->except(['create', 'edit']);

Route::resource('specialites', App\Http\Controllers\SpecialitesController::class)->except(['create', 'edit']);
