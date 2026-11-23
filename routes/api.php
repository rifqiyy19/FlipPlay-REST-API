<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\CollectionController;

Route::apiResource('media', MediaController::class);

Route::get('users/{user}/collection', [CollectionController::class, 'index']);

Route::post('users/{user}/collection', [CollectionController::class, 'store']);

Route::delete('users/{user}/collection/{media}', [CollectionController::class, 'destroy']);
