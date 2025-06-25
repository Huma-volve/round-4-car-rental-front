<?php

use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/showreviews', [ReviewController::class, 'index'])
    ->name('front.reviews.index');

Route::post('/storepayment', [PaymentController::class, 'store'])
    ->name('front.payments.store');
