<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
