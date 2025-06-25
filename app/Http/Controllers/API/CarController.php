<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
       // Get all cars
    public function index()
    {
      
         return response()->json(Car::all());
        // $cars= Car::all();
        // dd($cars);
    }

    // Get cars filtered by category (TypeCar)
    public function filterByCategory($category)
    {
        $cars = Car::where('TypeCar', $category)->get();
        return response()->json($cars);
    }


       // Get car details by ID
    public function show($id)
    {
        $car = Car::withCount('favourites')->findOrFail($id);
        return response()->json($car);
    }

    // Get recent cars (latest added)
    public function recent()
    {
        $cars = Car::latest()->take(3)->get(); 
        return response()->json($cars);
    }

    //  Get recommended cars
   public function recommended()
{ 
        $cars = Car::whereHas('reviews', function ($query) {
            $query->where('rating', '>=', 4);
        })->with(['reviews' => function ($query) {
            $query->select( 'car_id', 'rating')->where('rating', '>=', 4);
        }])->get();

        return response()->json($cars);
    }}









    