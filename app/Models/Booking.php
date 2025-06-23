<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_id',
        'user_id',
        'pickup_date',
        'pickup_time',
        'dropoff_date',
        'dropoff_time',
        'total_price_payment',
        'status',
        'pickup_location',
        'dropoff_location',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
