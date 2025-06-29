<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\CarLogic;

class DashboardController extends Controller
{
      public function rentalDetails()
    {
        $rentals = Booking::with(['user', 'car'])
            ->orderByDesc('created_at')
            ->take(5)
            ->get();
        return response()->json($rentals);
    }


   // 5 Top Rented Cars
    public function topRentedCars()
    {
        $topCars = Booking::select('car_id', DB::raw('COUNT(*) as rental_count'))
            ->groupBy('car_id')
            ->orderByDesc('rental_count')
            ->with('car')
            ->take(5)
            ->get();
        return response()->json($topCars);
    }
    
    // 3. Recent Transactions
    public function recentTransactions()
    {
        $cars = Booking::with('car')
        ->orderByDesc('created_at')
        ->take(5)
        ->get()
        ->pluck('car') // ناخد فقط بيانات السيارة من كل Booking
        ->unique('id') // نتأكد إن كل عربية مكررتش لو حصلت في أكتر من حجز
        ->values(); // نرتب الاندكس

    return response()->json($cars);
    }


}
