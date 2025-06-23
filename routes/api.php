<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/showreviews', [App\Http\Controllers\Api\ReviewController::class, 'index'])
    ->name('front.reviews.index');
