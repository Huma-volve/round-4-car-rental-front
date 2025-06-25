<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Payment extends Model
{
  protected $fillable = [
        'amount',
        'payment_method',
        'payment_status',
        'currency',
        'card_number',
        'card_type',
        'cvc',
        'Expration_date',  // أو 'expiration_date' حسب اسم العمود
        'card_holder_name',
        'booking_id',
        'user_id',
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
