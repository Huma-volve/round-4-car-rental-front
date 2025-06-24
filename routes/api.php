<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\DashboardController;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/cars', [CarController::class, 'index']); //all cars
Route::get('/cars/category/{category}', [CarController::class, 'filterByCategory']); 
Route::get('cars/{id}', [CarController::class, 'show']); // details
Route::get('/recent', [CarController::class, 'recent']); //  recent
Route::get('/recommended', [CarController::class, 'recommended']); //recommended cars

Route::get('/rental-details', [DashboardController::class, 'rentalDetails']);
Route::get('/top-rented-cars', [DashboardController::class, 'topRentedCars']);
Route::get('/recent_Transactions', [DashboardController::class, 'recentTransactions']);
